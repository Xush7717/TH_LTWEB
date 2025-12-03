<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRevenue = Order::whereIn('status', ['delivered', 'shipped'])->sum('total_money');
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        $totalUsers = User::where('role', 'customer')->count();

        return view('admin.dashboard', compact('totalRevenue', 'totalOrders', 'totalProducts', 'totalUsers'));
    }
}
