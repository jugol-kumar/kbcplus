<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function subCategoryByCategoryId($id){
        $subCategory = SubCategory::where('category_id', $id)->get()->all();
        return $subCategory;
    }

    //this functino for find brand find by sub category id
    public function brandsBySubCategoryId($id){
        $brands = Brand::where('subcategory_id', $id)->get()->all();
        return $brands;
    }


}
