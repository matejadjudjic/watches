<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\ActivityLog;

class AdminController extends Controller
{
    private function checkAdmin()
    {
        if (Auth::user()->role_id !== 1) {
            abort(403);
        }
    }

    public function products()
    {
        $this->checkAdmin();
        $products = Product::with(['brand', 'category'])->get();
        return view('admin.products.index', compact('products'));
    }

    public function users()
    {
        $this->checkAdmin();
        $users = User::with('role')->get();
        return view('admin.users.index', compact('users'));
    }

    public function orders()
    {
        $this->checkAdmin();
        $orders = Order::with(['user', 'items.product'])->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function dashboard(Request $request)
    {
        $this->checkAdmin();

        $query = ActivityLog::with('user')->orderBy('created_at', 'desc');


        if ($request->date) {
            $query->whereDate('created_at', $request->date);
        }

        $logs = $query->get();
        return view('admin.dashboard', compact('logs'));
    }
}
