<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class CheckoutController extends Controller
{
    public function goToCheckout(){
        if (Session::get('customerLogin')) {
            return "go to your dashboard profile";
        }
        return view('frontend.checkout.index');
    }

    public function customerSave(Request $request){
        $this->validate($request,[
            'first_name' => "required",
            'last_name' => "required",
            'email' => "required|unique:customers",
            'role' => "required",
            'phone' => "required|min:11|max:14",
            'password' => 'required|confirmed',
        ]);

        $customer = Customer::create([
            'role_id' => 3,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        Session::put('customer', [
            'id'    => $customer->id,
            'email' => $customer->email,
        ]);
        Session::put('customerLogin', $request->email);
        return redirect(route('front.customer.panel'));
    }

    public function customerLogin(Request $request){

        $result = Customer::where('email', $request->email)->first();
        if ($result) {
            if (Hash::check($request->password, $result->password)) {

                Session::put('customer', [
                    'id'    => $result->id,
                    'email' => $result->email,
                ]);

                Session::put('customerLogin', $request->email);
                return redirect(route('front.customer.panel'));
            }else{
                return back()->with('toast_error', 'Your password Is not Valid');
            }
        }else {
            return back()->with('toast_error', 'Your Email Address Is not Valid');
        }
    }

    public function customerIndex(){
        $divisions = Division::all();
        Session::put('message', 'Login Successfully Done');
        return view('frontend.shippingandbilling.index', compact('divisions'));
//        return view('customer.index')->with('toast_success', 'Registration Successful');
    }

    public function customerLogout(){
        Session::forget('customer');
        Session::forget('customerLogin');
        Session::forget('shipping');
        Session::forget('payment_id');
        return redirect(route('index'))->with('toast_success', 'Successfully Logout');
    }
}
