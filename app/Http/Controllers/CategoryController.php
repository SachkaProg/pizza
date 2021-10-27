<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories(){
        return Category::all();
    }
    // public function create() {
    // 	$category = new Category;
    // 	$category->name = $request->name;
    // 	$category->save();
    // }
    public function list() {
    	$category = Category::all();
    	return view('category.list',[
    		'category' => $category
    	]);
    }
    public function create() {
    	return view('category.create');
    }
    public function delete(Request $request) {
        Category::where('id', $request->id)->delete();
        return redirect()->back();
    }
    public function createPost(Request $request) {
    	$category = new Category;
    	$category->name = $request->name;
    	$category->save();

    	return redirect()->route('categoryList');
    }
    public function update(Request $request) {
        $category = Category::where('id', $request->id)->first();

        echo "string";
        // return view('category.update', ['category' => $category]);
    }
    public function updatePost(Request $request)
    {
        Category::where('id', $request->id)->update([
            'name' => $request->name
        ]);
        return redirect()->route('categoryList');
    }
}
