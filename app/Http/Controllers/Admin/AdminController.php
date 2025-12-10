<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function adminDashboard ()
    {
        $allOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $cancelledOrders = Order::where('status', 'cancelled')->count();
        $confirmedOrders = Order::where('status', 'confirmed')->count();
        $deliveredOrders = Order::where('status', 'delivered')->count();
        $returnedOrders = Order::where('status', 'returned')->count();
        return view('admin.dashboard', compact('allOrders', 'pendingOrders', 'cancelledOrders', 'confirmedOrders', 'deliveredOrders', 'returnedOrders'));
    }

    public function adminLogout ()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
