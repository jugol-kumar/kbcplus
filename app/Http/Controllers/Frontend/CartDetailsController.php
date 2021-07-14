<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
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
            Order::create([
                'user_id'       => Auth::id(),
                'shipping_id'   => $request->addressId,
                'total'         => $totaPrice,
                'received_date' => $request->dats,
                'received_time' => $request->time,
                'date'          => Carbon::now(),
            ]);

//            return  redirect()->route('front.goto.checkout');

            return response()->json([
                'code' => 200,
            ]);

        }else{
            return response()->json([
               'code' => 402,
                'msg' => 'Your Session Is Empty. Please Buy Product First...'
            ]);
        }

    }
//        Order::created($data);
//        return response()->json([
//           'code' => 200,
//        ]);
//    }


    public function goToCheckout(){
        return view('frontend.checkout.checkout');
    }



}
