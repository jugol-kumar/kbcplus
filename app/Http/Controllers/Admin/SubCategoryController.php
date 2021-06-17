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

        $validate = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'description' => 'max:150',
            'category_id' => 'integer'
        ]);
        if ($validate->fails()){
            return back()->with('toast_warning', $validate->messages()->all()[0])->withInput();
        }

        SubCategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description
        ]);
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
    public function edit(SubCategory $subCategory)
    {
        //
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

        $validate = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'description' => 'max:150',
            'category_id' => 'integer'
        ]);
        if ($validate->fails()){
            return back()->with('toast_warning', $validate->messages()->all()[0])->withInput();
        }

        $subCategory = SubCategory::findOrFail($request->id);
        $subCategory->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description
        ]);
        return back()->with('toast_success', 'Sub Category Updated Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sCategory = SubCategory::findOrFail($id);
        $sCategory->delete();
        return back()->with('toast_success', 'Sub Category Delete Successfully...');
    }
}
