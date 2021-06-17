<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
        // return view('admin.category.indexDemo', compact('categories'));
    }

    public function getCategory(){
        $categories = Category::all();

        
        return response()->json([
            "data"=> $categories

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

      
       // dd($request);
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'icon_class' => 'required',
            'description' => 'max:150',
        ]);
        // if ($validate->fails()){
        //     return back()->with('toast_warning', $validate->messages()->all()[0])->withInput();
        // }

       $category =  Category::create([
           'name' => $request->name,
           'icon_class' => $request->icon_class,
           'description' => $request->description,
           'status' => $request->status
             
        ]);
        if($category){


         return response()->json([
             'code'=>200, 
             'status' => true,
             'data' => $category

         ]);
        }else{
            return response()->json([
                'code'=>500,  
                'status' => false,
                'data' => 'Data Insert Failed'
            ]);
        }

        return back()->with('toast_success', 'Category Added Successfully...');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return back(compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {   
       return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        
         $category = Category::findOrFail($request->cat_id);
         
         $category->name = $request->name?$request->name:$category->name;
         $category->icon_class = $request->icon_class?$request->icon_class: $category->icon_class;
         $category->description = $request->description?$request->description:$category->description;
         
         if ($request->status == 'inactive') {
             $category->status = 'inactive';
         }else{
            $category->status = 'active';
         }
         $category->save();
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $cat = Category::FindOrFail($id);
        dd($cat);
    }


}
