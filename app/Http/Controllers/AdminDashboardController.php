<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Fabric;
use App\Models\Detergent;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index() 
    {
        return view('admin.dashboard');
    }
    public function order()
    {
        // $orders = Order::where('user_id', auth()->user()->id)->latest()->get();
        $orders = Order::latest()->get();
        foreach($orders as $order) {
            $order->user = User::find($order->user_id);
            $order->fabric = Fabric::find($order->fabric_id);
            $order->detergent = Detergent::find($order->detergent_id);
        }
        return view('admin.order', ['orders' => $orders]);
    }
    
    public function detergent() 
    {
        return view('admin.detergent');
    }
    public function order_status()
    {
        return view('admin.order_status');
    }

    public function history() {
        return view('admin.transaction-history', ['orders' => Order::where('status', 'completed')->get()]);
    }

}
