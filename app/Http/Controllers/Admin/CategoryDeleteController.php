<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryDeleteController extends Controller
{
    public function deleteCat($id){
        $cat = Category::FindOrFail($id);
        $cat->delete();

    }
}
