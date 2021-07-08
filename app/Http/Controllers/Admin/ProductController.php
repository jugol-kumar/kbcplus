<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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
        $products = Product::with('colors')->where('deletion_status', 1)->get();
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


    private function productDetails($request){
        $product = Product::create([
            'product_id'        => $request->product_id,
            'category_id'       => $request->categorey,
            'sub_category_id'   => $request->sCategory,
            'brand_id'          => $request->brand,
            'vendor_id'         => null,
            'creator'           => Auth::user()->id,

            'title'             => $request->title,
            'slug'              => Str::slug($request->title),
            'product_unit'      => $request->unit,

            'purchase_price'    => $request->purchasePrice,
            'min_sell_price'    => $request->minSellprice,

            'product_discount'  => $request->product_discount,
            'discount_type'     => $request->discount_type,
            'product_tax'       => $request->product_Tax,
            'tax_type'          => $request->tax_type,
            'condition'         => $request->condition,

            'short_description' => $request->short_description,
            'details'           => $request->details,
            'publication_status'=> filled($request->pStatus),
            'featured_status'   => filled($request->fStatus),
            'deletion_status'   => 1,
        ]);
        return $product;
    }

    public function store(Request $request)
    {
        $product = $this->productDetails($request);
        foreach ($request->get('color') as $k => $color) {
            $colorModel = Color::create([
                'product_id' => $product->id,
                'color' => !isset($color[0]) ? 'null' : $color[0],
                'extraUrl' => !isset($color[1]) ? 'null' : $color[1],
                'urlSlug' => Str::slug(!isset($color[1]) ? 'null' : $color[1])
            ]);

            $attribute = [];
            foreach($color['sku'] as $key => $sku) {
                $attribute[] = [
                    'sku' => $sku,
                    'price' => $color['price'][$key],
                    'size' => $color['size'][$key],
                    'qty' => $color['qty'][$key],
                ];
            }
            $colorModel->attributes()->createMany($attribute);

            $images = [];
            $getImage = $request->file('color');
            if(isset($getImage)){
                foreach ($request->file('color') as $key=>$image){
                    foreach ($image as $key=>$img){
                        $images[] =[
                            'image' =>$img
                        ];
                    }
                }
            }
            $imageName = [];
            if ($images != null){
                foreach ($images[$k]['image'] as $key=>$sImage){
                    $ext = $sImage->getClientOriginalExtension();
                    $fullName =  time().random_int(1, 1000).'.'.$ext;
                    $imageName[] = [
                        'image' => $fullName
                    ];
                    $sImage->storeAs('public/product', $fullName);
                }
            }else{
                $imageName[] = [
                    'image' => null
                ];
            }
            $colorModel->images()->createMany($imageName);
        }

        return back()->with('toast_success', 'Product Save Successfully...');
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
        $categories = Category::all();
        $subCategory = SubCategory::all();
        $brands = Brand::all();

        return view('admin.product.edit')->with([
            'product' => $product,
            'categories' => $categories,
            'subCategories' => $subCategory,
            'brands' => $brands,
        ]);
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
        //all color gated by product id.
        $allColorByProductId = Color::where('product_id', $product->id)->get();

        //product color and image delete when product update.
        foreach ($allColorByProductId as $color){
            foreach ($color->images as $image){
                Storage::delete("public/product/{$image->image}");
            }
            $color->delete();
        }

        //product summery details update section
        $product->update([
            'product_id'        => $request->product_id,
            'category_id'       => $request->categorey,
            'sub_category_id'   => $request->sCategory,
            'brand_id'          => $request->brand,
            'vendor_id'         => null,
            'creator'           => Auth::user()->id,

            'title'             => $request->title,
            'slug'              => Str::slug($request->title),
            'product_unit'      => $request->unit,

            'purchase_price'    => $request->purchasePrice,
            'min_sell_price'    => $request->minSellprice,

            'product_discount'  => $request->product_discount,
            'discount_type'     => $request->discount_type,
            'product_tax'       => $request->product_Tax,
            'tax_type'          => $request->tax_type,
            'condition'         => $request->condition,

            'short_description' => $request->short_description,
            'details'           => $request->details,
            'publication_status'=> filled($request->pStatus),
            'featured_status'   => filled($request->fStatus),
            'deletion_status'   => 1,
        ]);

        // Iterate single color form multiple color array
        foreach ($request->get('color') as $k => $color) {

            //create single color form multiple color array
            $colorModel = Color::create([
                'product_id' => $product->id,
                'color' => !isset($color[0]) ? 'null' : $color[0],
                'extraUrl' => !isset($color[1]) ? 'null' : $color[1],
                'urlSlug' => Str::slug(!isset($color[1]) ? 'null' : $color[1])
            ]);

            //define all product attribute order by color id
            $attribute = [];
            foreach($color['sku'] as $key => $sku) {
                $attribute[] = [
                    'sku' => $sku,
                    'price' => $color['price'][$key],
                    'size' => $color['size'][$key],
                    'qty' => $color['qty'][$key],
                ];
            }
            $colorModel->attributes()->createMany($attribute);

            //defined multiple images array form color index
            $images = [];
            $getImage = $request->file('color');
            if(isset($getImage)){
                foreach ($request->file('color') as $key=>$image){
                    foreach ($image as $key=>$img){
                        $images[] =[
                            'image' =>$img
                        ];
                    }
                }
            }

            //define single image name form images array
            $imageName = [];
            if ($images != null){
                foreach ($images[$k]['image'] as $key=>$sImage){
                    $ext = $sImage->getClientOriginalExtension();
                    $fullName =  time().random_int(1, 1000).'.'.$ext;
                    $imageName[] = [
                        'image' => $fullName
                    ];
                    $sImage->storeAs('public/product', $fullName);
                }
            }else{
                $imageName[] = [
                    'image' => null
                ];
            }
            $colorModel->images()->createMany($imageName);
        }
        return redirect()->route('app.product.index')->with('toast_success', 'Product Update Successfully...');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    //delete product is here
    public function destroy(Product $product)
    {


        //all color gated by product id.
        $allColorByProductId = Color::where('product_id', $product->id)->get();

        //product color and image delete when product update.
//        foreach ($allColorByProductId as $color){
//            foreach ($color->images as $image){
//                Storage::delete("public/product/{$image->image}");
//            }
//            $color->delete();
//        }


        $product->update(['deletion_status' => 0]);
        return back()->with('toast_success', 'Product Deleted Successfully...');
    }

    //get all active category
    public function getCategoryAjax(){
        $category = Category::where('status', 'active')->get();
        $brands = Brand::where('status', 'on')->get();
        return response()->json([
            'categories' => $category,
            'brands' =>$brands,
        ]);
    }



    //get sub category by category id with ajax .
    public function getSubCategoryAjax(Request $request){
        $sCat = SubCategory::where('status', 'active')->where('category_id', $request->id)->get();
        return response()->json([
            'sCat' => $sCat,
        ]);
    }



    //publication status update with ajax | product published and unpublished
    public function ajaxpublished(Request $request){
        $product = Product::find($request->id);
        $product->publication_status = $request->status;
        $product->save();
        return $product;
    }


}
