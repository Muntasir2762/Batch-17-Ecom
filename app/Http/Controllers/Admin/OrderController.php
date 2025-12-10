<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showOrders ($status)
    {
        if($status == "all"){
            $orders = Order::orderBy('id', 'desc')->with('orderDetails')->paginate(50);
        }
        else{
            $orders = Order::orderBy('id', 'desc')->where('status', $status)->with('orderDetails')->paginate(50);
        }
        return view('admin.order.show-orders', compact('orders'));
    }

    public function orderDetails ($id)
    {
        $order = Order::where('id', $id)->with('orderDetails')->first();
        return view('admin.order.order-details', compact('order'));
    }

    public function orderUpdate (Request $request, $id)
    {
        $order = Order::find($id);

        $order->status = $request->status;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->charge = $request->charge;
        $order->address = $request->address;
        $order->courier_name = $request->courier_name;
        $order->price = $request->price;

        $order->save();
        toastr()->success('Order Updated Successfully!');
        return redirect()->back();
    }

    public function orderDetailsUpdate (Request $request, $id)
    {
        $orderDetails = OrderDetails::find($id);

        $orderDetails->qty = $request->qty;
        $orderDetails->color = $request->color;
        $orderDetails->size = $request->size;
        $orderDetails->price = $request->price;

        $orderDetails->save();
    }
}
