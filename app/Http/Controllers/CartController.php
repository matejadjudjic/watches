<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ActivityLog;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product.images')->where('user_id', Auth::id())->get();
        $total = $cartItems->sum(function($item) {
            $price = $item->product->discount ?? $item->product->price;
            return $price * $item->quantity;
        });
        return view('pages.cart', compact('cartItems', 'total'));
    }

    public function add(Request $request)
    {
        $existing = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($existing) {
            $existing->increment('quantity');
        } else {
            Cart::create([
                'user_id'    => Auth::id(),
                'product_id' => $request->product_id,
                'quantity'   => 1,
            ]);
        }

        ActivityLog::log('cart_add', 'Product added to cart: ' . $request->product_id);

        return response()->json(['success' => true, 'message' => 'Added to cart!']);
    }

    public function remove($id)
    {
        Cart::where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect('/cart');
    }

    public function checkout()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return redirect('/cart')->with('error', 'The cart is empty!');
        }

        $total = $cartItems->sum(function($item) {
            $price = $item->product->discount ?? $item->product->price;
            return $price * $item->quantity;
        });

        $order = Order::create([
            'user_id'     => Auth::id(),
            'total_price' => $total,
            'status'      => 'pending',
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'price'      => $item->product->discount ?? $item->product->price,
            ]);
        }

        Cart::where('user_id', Auth::id())->delete();

        ActivityLog::log('order_created', 'Order created with total: $' . $total);

        return response()->json(['success' => true, 'message' => 'Order successfully created!']);
    }
}
