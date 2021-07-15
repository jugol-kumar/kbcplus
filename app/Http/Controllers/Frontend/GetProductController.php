<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class GetProductController extends Controller
{
    public function productByCatId($id){
        $category = Category::findOrFail($id);

        return view('frontend.products-by-catid.index', compact('category'));
    }

    public function productByBrandId($id){
        $brand = Brand::findOrFail($id);

        return view('frontend.products-by-brand-id.index', compact('brand'));
    }
}
