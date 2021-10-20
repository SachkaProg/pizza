<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories(){
        return Category::all();
    }
    public function create() {
    	$category = new Category;
    	$category->name = $request->name;
    	$category->save();
    }
}
