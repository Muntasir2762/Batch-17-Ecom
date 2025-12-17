<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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


    //Invoice Function...
    public function orderInvoice ($order_id)
    {
        $order = Order::where('id', $order_id)->with('orderDetails')->first();
        return view('admin.order.order-invoice', compact('order'));
    }

    public function orderBulkInvoice (Request $request)
    {
        $orderIds = $request->order_id;
        $orders = Order::whereIn('id', $orderIds)->with('orderDetails')->get();
        return view('admin.order.order-bulk-invoice', compact('orders'));
    }

    public function courierEntry ($order_id)
    {
        $order = Order::find($order_id);
        
            //Body Parameters..
            $invoiceNumber = $order->invoice_number;
            $customerName = $order->name;
            $customerPhone = $order->phone;
            $customerAddress = $order->address;
            $codAmount = $order->price;

        if($order->courier_name == null){
            toastr()->error("Courier is not selected");
            return redirect()->back();
        }
        else{
           if($order->courier_name == "steadfast"){
            $apiEndpoint = "https://portal.packzy.com/api/v1/create_order";
            
            $header = [
                'Api-Key' => "wmamlsypijlj3klvjsgpxtetzzirwdw0",
                'Secret-Key' => "5jau5atdggpyrphbrlcxuspx",
                'Content-Type' => "application/json"
            ];

            $payLoad = [
                'invoice' => $invoiceNumber,
                'recipient_name' => $customerName,
                'recipient_phone' => $customerPhone,
                'recipient_address' => $customerAddress,
                'cod_amount' => $codAmount
            ];

            $response = Http::withHeaders($header)->post($apiEndpoint, $payLoad);
            $jsonData = $response->json();

            // dd($jsonData);

            if(isset($jsonData['consignment'])){
                $order->consignment_id = $jsonData['consignment']['consignment_id'];
                $order->tracking_code = $jsonData['consignment']['tracking_code'];
                $order->save();
            }

            toastr()->success("Courier Entry is Successfull in Steadfast");
            return redirect()->back();
           }

           elseif($order->courier_name == "pathao"){
            toastr()->error("Pathao API is not integrated. Select Steadfast");
            return redirect()->back();
           }

           else{
            toastr()->success("Courier Selected as Others");
            return redirect()->back();
           }
        }
    }
}
