<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ProductDetails extends Controller
{
    public function index($slug){
        $product = Product::where('title_slug', $slug)->get()->first();
        return view('frontend.product.product_details', compact('product'));
    }
}
