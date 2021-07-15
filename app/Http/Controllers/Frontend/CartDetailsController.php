<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CartDetailsController extends Controller
{
    public function cartDetailsIndex(){
        return view('frontend.cart-details.cart-details');
    }

    public function saveCartDetails(Request $request){
//        	received_time	order_status	date	deletion_status
        if (session('cart')){

            $totaPrice = 0;
            foreach (session('cart') as $item){
                $totaPrice += $item['price'] * $item['quantity'];
            }
            $order = Order::create([
                'user_id'       => Auth::id(),
                'shipping_id'   => $request->addressId,
                'total'         => $totaPrice,
                'received_date' => $request->dats,
                'received_time' => $request->time,
                'date'          => Carbon::now(),
            ]);

            foreach (session('cart') as $product){
                OrderDetails::create([
                    'order_id' => $order->id,
                    'product_id' => $product['id'],
                    'product_name' => $product['title'],
                    'product_color' => $product['color'],
                    'product_size'   => $product['size'],
                    'product_image'   => $product['image'],
                    'product_price'    => $product['price'],
                    'product_quantity'  => $product['quantity'],
                ]);
            }
            session()->get('cart');
            session()->forget('cart');

            return response()->json([
                'code' => 200,
                'order_id' => $order->id,
                'msg' => 'Your Order Submitted Done...'
            ]);

        }else{
            return response()->json([
               'code' => 402,
                'msg' => 'Your Cart Is Empty. Please Buy Product First...'
            ]);
        }

    }


    public function goToCheckout($id){

        $order = Order::findORFail($id);

        if ($order->payment_id != null){
            return redirect()->route("user.dashboard");
        }else{
            $shippingAddress = Address::findOrFail($order->shipping_id);
            return view('frontend.checkout.checkout', compact('order', 'shippingAddress'))->with('msg', 'Your Order Is Saved. Make Payment Now...');

        }

    }

    public function paymentByOrder(Request $request){
        $oId = $request->orderId;

        $order = Order::findOrFail($oId);

//        type	total_amount	pay_amount	due_amount	payment_status	date	?

        $payment = Payment::create([
            'type' => $request->pType,
            'date' => Carbon::now()
        ]);
        $order->update([
            'payment_id' => $payment->id,
            'payment_status' => 'pending',
        ]);

        return response()->json([
            'code' => 200,
            'msg' => 'Your Payment Submitted  And Order Submitted Done...'
        ]);

    }


    public function successfullyDone(){
        return view('frontend.order-complated.order-complated');
    }



}
