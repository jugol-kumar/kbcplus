<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use App\Models\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use function Composer\Autoload\includeFile;

class PaymentController extends Controller
{

    private function saveShipping($request){
        $validate = Validator::make($request->all(), [
            'email'        => "required|unique:shippings",
            'first_name'   => "required",
            'last_name'    => "required",
//            'phone'        => "required|max:15|min:11|unique:shippings",
            'phone'        => ['required', 'unique:shippings', 'regex:/(^(\+8801|8801|01|008801))[1|15-9]{1}(\d){8}$/'],
            'division'     => "required",
            'district'     => "required",
            'full_address' => "required",
            'payment'      => "required",
        ]);
        if ($validate->fails()){
            return back()->with('toast_warning', $validate->messages()->all()[0])->withInput();
        }
        $shipping = Shipping::create([
            'email'        => $request->email,
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'phone'        => $request->phone,
            'division'     => $request->division,
            'district'     => $request->district,
            'full_address' => $request->full_address,
        ]);
        return $shipping;
    }


    private function savePayment($request){
        $validate = Validator::make($request->all(), [
            'payment'   => "required",
        ]);
        if ($validate->fails()){
            return redirect(route('front.go.to.checkout'))->with('toast_warning', $validate->messages()->all()[0])->withInput();
        }
        $payment = Payment::create([
            'type' => $request->payment,
            'date' => Carbon::now(),
        ]);
        return $payment;

    }

//    private function saveOrder(){
//        $customer_id = Session::get('customer')['id'];
//        $shipping_id = isset(Session::get('shipping')['id']);
//        $payment_id  = isset(Session::get('payment')['id']);
//
//        $order       = Order::create([
//            'customer_id' => $customer_id,
//            'shipping_id' => $shipping_id,
//            'payment_id'  => $payment_id,
//            'total'       => Cart::instance('cart')->total,
//            'date'        => Carbon::now(),
//        ]);
//        return $order->id;
//    }
//
//    private function saveOrderDetails($order_id){
//        foreach(Cart::instance('cart')->content() as $item){
//            OrderDetails::create([
//               'order_id'          => $order_id,
//                'product_id'       => $item->id,
//                'product_name'     => $item->name,
//                'product_image'    => $item->options->image,
//                'product_price'    => $item->price,
//                'product_quantity' => $item->qty
//            ]);
//        }
//        Cart::instance('cart')->destroy();
//        Session::forget('customer');
//        Session::forget('shipping');
//        Session::forget('payment_id');
//
//    }


    public function placeOrder(Request $request){


        $validate = Validator::make($request->all(), [
            'payment'   => "required",
        ]);
        if ($validate->fails()){
            return redirect(route('front.customer.gpto.payment'))->with('toast_warning', $validate->messages()->all()[0])->withInput();
        }
        $payment = Payment::create([
            'type' => $request->payment,
            'date' => Carbon::now(),
        ]);
        Session::put('payment_id', $payment->id);

        $customer_id = Session::get('customer')['id'];
        $shipping_id = Session::get('customer_shipping')['id'];
        $payment_id  = Session::get('payment_id');

        $order       = Order::create([
            'customer_id' => $customer_id,
            'shipping_id' => $shipping_id,
            'payment_id'  => $payment_id,
            'total'       => Cart::instance('cart')->total,
            'date'        => Carbon::now(),
        ]);

        foreach(Cart::instance('cart')->content() as $item){
            OrderDetails::create([
               'order_id'          => $order->id,
                'product_id'       => $item->id,
                'product_name'     => $item->name,
                'product_image'    => $item->options->image,
                'product_price'    => $item->price,
                'product_quantity' => $item->qty
            ]);
        }
        Cart::instance('cart')->destroy();
        Session::forget('customer_shipping');
        Session::forget('payment_id');
        return view('frontend.order.place')->with('toast_success', 'Order Plased Success');
    }


    public function goToPayment(){
        return view('frontend.payment.index');
    }
}
