<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    private function checkAdmin()
    {
        if (Auth::user()->role_id !== 1) {
            abort(403);
        }
    }

    public function index()
    {
        $this->checkAdmin();
        $orders = Order::with(['user', 'items.product'])->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function edit($id)
    {
        $this->checkAdmin();
        $order = Order::with(['user', 'items.product'])->findOrFail($id);
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $this->checkAdmin();
        $request->validate([
            'status' => 'required|string|in:pending,processing,completed,cancelled',
        ]);

        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);
        return redirect('/admin/orders')->with('success', 'Order successfully updated!');
    }

    public function destroy($id)
    {
        $this->checkAdmin();
        Order::findOrFail($id)->delete();
        return redirect('/admin/orders')->with('success', 'Order successfully deleted!');
    }
}
