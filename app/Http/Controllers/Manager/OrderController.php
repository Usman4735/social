<?php

namespace App\Http\Controllers\Manager;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('manager.orders.index', compact('orders'));
    }
}
