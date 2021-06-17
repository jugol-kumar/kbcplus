<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function index($id){
        $product = Product::findOrFail($id);
        return view('admin.product.veriation', compact('product'));
    }
}
