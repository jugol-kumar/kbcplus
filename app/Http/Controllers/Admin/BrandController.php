<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCats = SubCategory::all();
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands', 'subCats'));
    }

    public function allBrand(){
        $brands = Brand::all();
        return response()->json([
           'data' => $brands,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $data = $request->all();
        $check = Brand::create($data);
        if ($check){
            return response()->json([
                'code' => 200,
                'msg' => 'Brand Save Successfully Done...'
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */

    public function editBrand(Request $request){
        $brand = Brand::where('id', $request->id)->first();
        return response()->json([
           'brand' =>$brand
        ]);
    }

    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */

    public function updateBrand(Request $request){
        $brand = Brand::where('id', $request->id)->first();
        $data = $request->all();
        $status = $brand->update($data);
        if ($status){
            return response()->json([
               'code' => 200,
               'msg' => 'Your Brand Update Successfully Done...'
            ]);
        }else{
            return response()->json([
                'code' => 500,
                'msg' => 'Have an error...'
            ]);
        }

    }

    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $status = $brand->delete();
        if ($status){
            return response()->json([
                'code' => 200,
                'msg' => 'Brand Deleted Successfully Done..'
            ]);
        }else{
            return response()->json([
                'code' => 200,
                'msg' => 'Have an error occed..'
            ]);
        }
    }
}
