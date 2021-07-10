<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Color;
use App\Models\District;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function singleProductDetails($slug){
        $product = Product::where('slug', $slug)->where('deletion_status', 1)->where('publication_status', 1)->first();
        return view('frontend.single-product.index', compact('product'));
    }

    // all size and color wise attribuet.
    public function getSizeByColor(Request $request){
        $id = $request->color_id;
        $color = Color::with('attributes')->with('images')->where('id', $id)->first();
        return response()->json([
           'code' => 200,
           'color' => $color,
        ]);


    }

    // single attribute for size quentity and price.
    public function getPriceBySize(Request $request){
        $id = $request->size_id;
        $atrabiuts = Attribute::where('id', $id)->first();
        return response()->json([
            'code' => 200,
            'attr' => $atrabiuts,
        ]);
    }


    //get all district

    public function allDistrict(Request $request){
        $query = $request->get('data');
        $data = District::where('name','LIKE','%'.$query.'%')->get();

        $output = '<ul class="list-unstyled">';

        foreach($data as $row){
            $output .= '<li>'.$row->name.'</li>';
    }
        $output .= '</ul>';
        echo $output;
    }
}
