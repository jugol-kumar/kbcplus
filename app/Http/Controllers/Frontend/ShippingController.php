<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ShippingController extends Controller
{
    public function saveShipping(Request $request){
        $validate = Validator::make($request->all(), [
            'email'        => "required|unique:shippings",
            'first_name'   => "required",
            'last_name'    => "required",
            'phone'        => ['required', 'unique:shippings', 'regex:/(^(\+8801|8801|01|008801))[1|15-9]{1}(\d){8}$/'],
            'division'     => "required",
            'district'     => "required",
            'full_address' => "required"
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
//        $id = DB::table('shippings')->insertGetId($shipping);
//        return $id;
//        exit();
//
        Session::put('customer_shipping', [
            'id'            => $shipping->id,
            'first_name'    => $shipping->first_name,
            'last_name'     => $shipping->last_name,
        ]);
        return redirect(route('front.customer.gpto.payment'))->with('toast_success', 'Your Shipping Info And Order Submitted');
    }
}
