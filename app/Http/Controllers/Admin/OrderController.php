<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showOrders ()
    {
        $orders = Order::orderBy('id', 'desc')->with('orderDetails')->paginate(50);
        return view('admin.order.show-orders', compact('orders'));
    }

    public function orderDetails ($id)
    {
        return view('admin.order.order-details');
    }
}
