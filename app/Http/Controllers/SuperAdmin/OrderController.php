<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('super-admin.orders.index', compact('orders'));
    }
    public function view($id)
    {
        $order=Order::findOrFail(decrypt($id));
        return view('super-admin.orders.view', compact('order'));
    }
}
