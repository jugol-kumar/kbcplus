<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    private function singleImage($request){

        if ($request->hasFile('avatar')) {
            //main file name is here
            $quotenameWithExt = $request->file('avatar')->getClientOriginalName();

            //main file extension is here
            $filenamewithextension = $request->file('avatar')->getClientOriginalExtension();

            //orginial file name is here
            $filename = pathinfo($quotenameWithExt, PATHINFO_FILENAME);

            //file name slug version is here
            $slugName = Str::slug($request->name);
            $orginialFileName = $slugName.'-'.uniqid().'.'.$filenamewithextension;
            Storage::put('public/product/avatar/'. $orginialFileName, fopen($request->file('avatar'), 'r+'));
            //Resize image here
            $thumbnailpath = public_path('storage/product/avatar/'.$orginialFileName);
            $img = Image::make($thumbnailpath)->resize(700, 700);
            $img->save($thumbnailpath);
            return $orginialFileName;
        }
    }

    private function multipoleImageUpload($image, $product){
        //main file name is here
        $quotenameWithExt = $image->getClientOriginalName();

        //main file extension is here
        $filenamewithextension = $image->getClientOriginalExtension();

        //orginial file name is here
        $filename = pathinfo($quotenameWithExt, PATHINFO_FILENAME);

        //file name slug version is here
        $orginialFileName = uniqid().'.'.$filenamewithextension;
        Storage::put('public/product/images/'. $orginialFileName, fopen($image, 'r+'));
        //Resize image here
        $thumbnailpath = public_path('storage/product/images/'.$orginialFileName);
        $img = Image::make($thumbnailpath)->resize(700, 700);
        $img->save($thumbnailpath);

        ProductImage::create([
            'product_id' => $product->id,
            'image_name' => $orginialFileName,
        ]);
    }

    private function productDetails($request, $single_image){
        $product = Product::create([
            'product_id' =>$request->product_id,
            'product_title' =>$request->product_title,
            'title_slug' => Str::slug($request->product_title),
            'category_id'=>$request->category_id,
            'sub_category_id'=>$request->subcategory_id,
            'brand_id' =>$request->brands_id,
            'short_description'=>$request->short_description,
            'full_description' =>$request->full_description,
            'avatar' =>$single_image,
            'sell_price' =>$request->sell_price,
            'purchase_price' =>$request->purchase_price,
            'product_tax' =>$request->product_tax,
            'tax_type'=>$request->tax_type,
            'product_discount'=>$request->product_discount,
            'discount_type'=>$request->discount_type,
            'product_unit'=>$request->product_unit,
            'publication_status'=>$request->filled('publication_status'),
            'featured_status'=>$request->filled('featured_status'),
        ]);
        return $product;
    }

    public function store(Request $request)
    {
        $single_image = $this->singleImage($request);
        $product = $this->productDetails($request, $single_image);
        $tags = explode(',', $request->tags);
        foreach ($tags as $tag) {
           ProductTag::create([
               'product_id' => $product->id,
               'tag_name' => $tag,
           ]);
        }
        if ($request->hasFile('images')) {
            foreach ($request->images as $image){
                $this->multipoleImageUpload($image, $product);
            }
        }
        return redirect(route('app.product.index'))->with('toast_success', 'Product Added Successfully...');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        foreach ($product->images as $img) {
            $public_path = public_path('storage/product/images/'.$img->image_name);
            @unlink($public_path);
            $img->delete();
        }

        $avatar_path = public_path('storage/product/avatar/'.$product->avatar);
        @unlink($avatar_path);

        foreach ($product->tags as $tag) {
            $tag->delete();
        }
        $product->delete();
        return back()->with('toast_success', 'Product Deleted Successfully...');

    }


    public function ajaxpublished(Request $request){

        $product = Product::find($request->id);
        $product->publication_status = $request->status;
        $product->save();
        return $product;
    }



}
