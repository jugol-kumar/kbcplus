<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = Product::all()->take(5);
        $cproducts = Product::all();
        $subCategories = SubCategory::all();
        $featuredproducts = Product::where('featured_status', 1)->get()->all();
        return view('frontend.index', compact('categories','products', 'featuredproducts', 'subCategories', 'cproducts'));
    }
}
