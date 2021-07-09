<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function singleProductDetails($slug){
        $product = Product::where('slug', $slug)->where('deletion_status', 1)->where('publication_status', 1)->first();
        return view('frontend.single-product.index', compact('product'));
    }

    public function getSizeByColor(Request $request){
        $id = $request->color_id;
        $color = Color::with('attributes')->with('images')->where('id', $id)->first();
        return response()->json([
           'code' => 200,
           'color' => $color,
        ]);


    }

    public function getPriceBySize(Request $request){
        $id = $request->size_id;
        $atrabiuts = Attribute::where('id', $id)->first();
        return response()->json([
            'code' => 200,
            'attr' => $atrabiuts,
        ]);
    }
}
