<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
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


    private function imageupload($request){

        if ($request->hasFile('brand_logo')) {
            //main file name is here
            $quotenameWithExt = $request->file('brand_logo')->getClientOriginalName();

            //main file extension is here
            $filenamewithextension = $request->file('brand_logo')->getClientOriginalExtension();

            //orginial file name is here
            $filename = pathinfo($quotenameWithExt, PATHINFO_FILENAME);

            //file name slug version is here
            $slugName = Str::slug($request->name);
            $orginialFileName = $slugName.'-'.uniqid().'.'.$filenamewithextension;
            Storage::put('public/brands/'. $orginialFileName, fopen($request->file('brand_logo'), 'r+'));
            //Resize image here
            $thumbnailpath = public_path('storage/brands/'.$orginialFileName);
            $img = Image::make($thumbnailpath)->resize(140, 140);
            $img->save($thumbnailpath);
            return $orginialFileName;
        }
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'sub_category_id' => 'required|integer',
            'name' => 'required|max:50',
            'description' => 'max:150',
            'brand_logo' => 'image|mimes:jpg,png',
        ]);
        if ($validate->fails()){
            return back()->with('toast_warning', $validate->messages()->all()[0])->withInput();
        }
        $logoName = $this->imageupload($request);

        Brand::create([
           'subcategory_id' => $request->sub_category_id,
            'name' => $request->name,
            'description' => $request->description,
            'brand_logo' => $logoName,
        ]);

        return back()->with('toast_success', 'Brand Added Successfully...');
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
        Storage::delete('public/brands/'.$brand->brand_logo);
        $brand->delete();
        return back()->with('toast_success', 'Brand Deleted Successfully...');
    }
}
