<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $product = Product::find($request->product_id);
        Cart::instance('cart')->add([
            'id'        => $request->product_id,
            'name'      => $product->product_title,
            'price'     => $request->product_price,
            'qty'       => $request->quantity,
            'options'   => [
                'image' => $product->avatar
            ],
        ]);



        return redirect(route('front.go.to.cart'))->with('toast_success', 'Product Add To Cart');
    }

    public function addQuantity($data){
        $product = Cart::instance('cart')->get($data);
        $quantity = $product->qty+1;
        Cart::instance('cart')->update($data, $quantity);
        return back()->with('msg', 'Quantity Added Successful');
    }

    public function deleteQuantity($data){
        $product = Cart::instance('cart')->get($data);
        $quantity = $product->qty-1;
        if ($quantity<= 0) {
            return back()->with('msg', 'minimum quntity is 1');
        }else {
            Cart::instance('cart')->update($data, $quantity);
            return back()->with('msg', 'Quantity Deleted Successful');
        }
    }

    public function deleteCartItem($data){
        Cart::instance('cart')->remove($data);
        return back()->with('toast_success', 'Cart Item Deleted');
    }
    private $coupon;

    public function applyCouponCode(Request $request){

        $coupon = Coupon::where('code', $request->coupon_code)->count();
        if ($coupon == 0) {
            return back()->with('toast_error', 'Your Coupon Code Dose Not Exist');
        }else {
            $coupon = Coupon::where('code', $request->coupon_code)->first();
            $expiryDate = $coupon->expiry_date;
            $today = date('Y-m-d');
            if ($expiryDate < $today) {
                return back()->with('toast_error', 'Your Coupon Code Expired');
            }else{
                Session::put('coupon', [
                    'code'  => $coupon->code,
                    'type'  => $coupon->amount_type,
                    'value' => $coupon->amount,
                ]);
            }
        }
        return  redirect(route('front.go.to.cart'))->with('toast_success', 'Coupon Code Is Applied');
    }

    public function destroyCouponCode(){
        Session::forget('coupon');
        return back()->with('toast_success', 'Coupon Code is Removed...');
    }



    private function calculation(){
        if (session()->has('coupon')) {
            if (session()->get('coupon')['type'] == 'fixed') {
                $discount = Session::get('coupon')['value'];
            }else{
                $discount =(Cart::instance('cart')->subtotal() * session()->get('coupon')['value'])/100;
            }
            $totalAfterDiscount = Cart::instance('cart')->subtotal() - $discount;
            $taxAfterDiscount = ($totalAfterDiscount * config('cart.tax'))/100;
            $grandTotalAfterDiscount = $totalAfterDiscount + $taxAfterDiscount;
        }
    }

    public function goToCart(){
        return view('frontend.cart.cart');
    }






}
