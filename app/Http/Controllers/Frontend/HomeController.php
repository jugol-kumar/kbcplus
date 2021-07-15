<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
//        $categories = Category::where('status', 'active')->take(8)->get();
        $brands = Brand::where('status', 'on')->get();
        $categories = Category::where('status', 'active')->get();
        $products = Product::where('publication_status', 1)->where('deletion_status',1)->get();


        return view('frontend.home', compact('products', 'categories', 'brands'));
    }
}
