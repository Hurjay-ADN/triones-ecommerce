<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Order $order){

        // $user = auth()->user();
        // $orders = $user->orders;

        $orders = Order::with('items')->where('user_id', auth()->id())->paginate(10);
        // dd($orders);
        return view('users.orders.index', compact('orders'));
    }
}
