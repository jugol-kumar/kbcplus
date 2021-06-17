<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function categoryWiseProduct($id){
        $brands = Brand::all();
        $allCategory = Category::all();
        $category = Product::where('category_id', $id)->get()->all();
        return view('frontend.category.category_product', compact('category', 'allCategory', 'brands'));
    }

    public function subCategoryWiseProduct($id){
        $brands = Brand::all();
        $allCategory = Category::all();
        $category = Product::where('sub_category_id', $id)->get()->all();
        return view('frontend.category.category_product', compact('category', 'allCategory', 'brands'));
    }

    public function brandWiseProduct($id){
        $brands = Brand::all();
        $allCategory = Category::all();
        $category = Product::where('brand_id', $id)->get()->all();
        return view('frontend.category.category_product', compact('category', 'allCategory', 'brands'));

    }
}
