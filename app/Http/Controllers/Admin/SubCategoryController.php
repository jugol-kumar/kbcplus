<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Sodium\compare;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('admin.subcetagory.index', compact('subCategories', 'categories'));
    }

    public function allSubCategory(){
        $subCategories = SubCategory::with('category')->get();
        return response()->json(['data' => $subCategories]);
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
        $subcat = SubCategory::create($data);
        if($subcat){
            return response()->json([
                'code'=>200,
                'status' => true,
                'data' => $subcat

            ]);
        }else{
            return response()->json([
                'code'=>500,
                'status' => false,
                'data' => 'Data Insert Failed'
            ]);
        }

        return back()->with('toast_success', 'Sub Category Added Successfully...');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $subCategory = SubCategory::findOrFail($id);
       return redirect(route('app.subcategory.index', compact('subCategory')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return $request;
    }

    public function editSubCat(Request $request){
        $sCat = SubCategory::findOrFail($request->id);
        if ($sCat){
            return response()->json([
                'code' => 200,
                'data' => $sCat,
            ]);
        }else{
            return response()->json([
                'code' => 500,
                'msg' => "Data Not Founded.",
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $scat = SubCategory::where('id', $request->id)->update($data);
        if ($scat){
            return response()->json([
                'code' => 200,
                'data' => $scat,
            ]);
        }else{
            return response()->json([
                'code' => 500,
                'msg' => "Data Not Founded.",
            ]);
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $sCategory = SubCategory::findOrFail($request->id);
        $status = $sCategory->delete();

        if ($status){
            return response()->json([
                'code' => 200,
                'data' => $status,
            ]);
        }else{
            return response()->json([
                'code' => 500,
                'msg' => "Data Not Founded.",
            ]);
        }
    }
}
