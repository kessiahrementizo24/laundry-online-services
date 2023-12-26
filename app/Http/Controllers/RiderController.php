<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Rider;
use App\Models\Fabric;
use App\Models\Detergent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiderController extends Controller
{
    public function dashboard(){
        return view('rider.dashboard');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        Rider::create($data);
        return back();
    }

    public function bookings(?string $category = null) {
        if($category) {
            $orders = Order::where('status', $category)->get();
        }
        else {
            $orders = Order::all();
        }

        foreach($orders as $order) {
            $order->user = User::find($order->user_id);
            $order->fabric = Fabric::find($order->fabric_id);
            $order->detergent = Detergent::find($order->detergent_id);
        }
        return view('rider.bookings.pending', ['orders' => $orders]);
    }

    public function pending() {
        return view('rider.bookings.pending', ['orders' => Order::where('status', 'pending')->get()]);

    }
   
    public function pick_up() {
        return view('rider.bookings.process', ['orders' => Order::where('status', 'pick up')->get()]);
        
    }

    public function delivery() {
        return view('rider.bookings.delivery', ['orders' => Order::where('status', 'deliver')->get()]);
        
    }

    public function login() {
        return view ('rider.login');
    }

    public function login_Handler () 
    { 
        return view ('riderapp.login');
    }
}