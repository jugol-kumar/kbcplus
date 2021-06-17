<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    public function showWatchlist(){
        return view('frontend.watchlist.watchlist');
    }

    public function addWatchlist(Request $request){
        $product = Product::find($request->product_id);
        Cart::instance('watchlist')->add([
            'id'        => $request->product_id,
            'name'      => $product->product_title,
            'price'     => $request->product_price,
            'qty'       => 1,
            'options'   => [
                'image' => $product->avatar
            ],
        ]);
        return redirect(route('front.show.watchlist'))->with('toast_success', 'Product Add To Watchlist');
    }

    public function watchDelete($rowId){
        Cart::instance('watchlist')->remove($rowId);
        return back()->with('toast_success', 'Watchlist Item Deleted');
    }
}
