<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderIndex(){
        $orders = Order::all();
        return view('admin.order.index', compact('orders'));
    }

    public function showOrder($id){
        $order = Order::findOrFail($id);
        return view('admin.order.orderdetails', compact('order'));
    }

    public function createInvoice($id){
        $order = Order::findOrFail($id);
        return view('admin.order.invoice', compact('order'));
    }

    public function approvedPayment($id){
        $order = Order::findOrFail($id);
        $order->payment()->update([
           'status' => 0,
        ]);
        return back()->with('toast_success', 'Payment Approved Successfully');
    }

    public function approvedOrder($id){
        $order = Order::findOrFail($id);
        $order->update([
            'order_status' => 0,
        ]);
        return back()->with('toast_success', 'Order Approved Successfully');

    }
}
