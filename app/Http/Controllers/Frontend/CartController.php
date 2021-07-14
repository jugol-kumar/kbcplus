<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{
//add to cart product package....
//https://www.itsolutionstuff.com/post/laravel-shopping-add-to-cart-with-ajax-exampleexample.html


    public function  addToCart(Request $request){

        $productId = $request->pro_id;
        $colorId = $request->data['color_id'];
        $sizeId = $request->data['size_id'];
        $qty   = $request->data['qty'];
        $attrId = $request->data['attr_id'];


        $product = Product::findOrFail($productId);
        $color = Color::with('images')->where('id',$colorId)->first();

        $attr = Attribute::findOrFail($attrId);

        $attrQty = $attr->qty;
        $id = $product->id;
        $image = $color->images[0]['image'];

        $colorId = $color->id;

        if ($attrQty < $qty){
            return response()->json([
                'code' => 210,
               'msg' => 'This Request Quantity Is Not Available. Please Enter Quentity Lessthen Or Equal => '.$attrQty,
            ]);
        }else{
            $cart = session()->get('cart', []);
//            if(isset($cart[id])) {
            if(isset($cart[$colorId])) {
//                $cart[$id]['quantity']++;
                if ($cart[$colorId]['quantity'] >= $attr->qty){
                    return response()->json([
                        'code' => 210,
                        'msg' => 'This Product Qty Exist OF Database..Please Enter Quentity Lessthen Or Equal => '.$attr->qty,
                    ]);
                }else{
                    $cart[$colorId]['quantity']++;
                }
            }else{
//                $cart[$id] = [
                $cart[$colorId] = [
                    'product_id' => $id,
                    'id' => $colorId,
                    "title" => $product->title,
                    "color" => $color->color,
                    "size"  => $attr->size,
                    "quantity" => $qty,
                    "price" => $attr->price,
                    "image" => $image,
                    "attr_id" => $attrId,
                ];
            }
            session()->put('cart', $cart);
            return response()->json([
                'code' => 200,
                'msg' => 'This Product Successfully Added To Cart...',
            ]);

        }
    }


    public function updateCartQtyMinus(Request $request){

        if($request->id && $request->qty){
            $cart = session()->get('cart');

            $mainCartQty =  $cart[$request->id]["quantity"];

            if ($mainCartQty <= 1){
                return response()->json([
                   'code' => 420,
                   'msg' => 'Quantity Cant less then or equal of 1'
                ]);
            }else{
                $cart[$request->id]["quantity"] --;
                session()->put('cart', $cart);
                return response()->json([
                    'code' => 200,
                    'msg' => 'Cart updated successfully',
                ]);
            }


        }
    }


    public function updateCartQtyPlus(Request $request){

        if($request->id){
            $cart = session()->get('cart');
            $mainCartQty =  $cart[$request->id]["quantity"];
            $attrId =  $cart[$request->id]["attr_id"];

            $attr = Attribute::findOrFail($attrId);


            if ($mainCartQty >= $attr->qty){
                return response()->json([
                   'code' => 420,
                   'msg' => 'This Quantity Exist main Quantity..Please Enter Quentity Lessthen Or Equal => '.$attr->qty
                ]);
            }else{
                $cart[$request->id]["quantity"] ++;
                session()->put('cart', $cart);
                return response()->json([
                    'code' => 200,
                    'msg' => 'Cart updated successfully',
                ]);
            }


        }
    }



    public function updateCarDeleteById(Request $request){
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return response()->json([
                'code' => 200,
                'msg' => 'Product Deleted Successfully Done Form Cart..',
            ]);
        }
    }


    public function clearCartSession(Request $request){
        session()->get('cart');
        session()->forget('cart');
        return response()->json([
            'code' => 200,
            'msg' => 'Your Cart Is Clear.',
        ]);
//         unset($session);
    }



}
