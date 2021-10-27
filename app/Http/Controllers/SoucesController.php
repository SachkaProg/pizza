<?php

namespace App\Http\Controllers;

use App\Models\Sauce;

use Illuminate\Http\Request;

class SoucesController extends Controller
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
    	$souce = Sauce::all();
    	return view('souces.list',[
    		'souce' => $souce
    	]);
    }
    public function create() {
    	return view('souces.create');
    }
    public function delete(Request $request) {
        Sauce::where('id', $request->id)->delete();
        return redirect()->back();
    }
    public function createPost(Request $request) {
        $path = 0;
        
        if($request->hasFile('img')){
            $img = $request->file('img');
            $imageName = time().'1.'.$request->img->extension(); 
            $request->file('img')->move(public_path() . '/uploads',$imageName);
            $path = '/uploads/'.$imageName;
        }


        $good = new Sauce;
        $good->name = $request->name;
        $good->price = $request->price;
        $good->img = $path;
        $good->save();

        return redirect()->route('soucesList');
    }
    public function update(Request $request) {
        $souce = Sauce::where('id', $request->id)->first();

        return view('souces.update', ['souce' => $souce]);
    }
    public function updatePost(Request $request)
    {
        $souce = Sauce::where('id', $request->id)->first();
        $path = $souce->img;
        
        if($request->hasFile('img')){
            $img = $request->file('img');
            $imageName = time().'1.'.$request->img->extension(); 
            $request->file('img')->move(public_path() . '/uploads',$imageName);
            $path = '/uploads/'.$imageName;
        }


        Sauce::where('id', $request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'img'  => $path
        ]);
        

        return redirect()->route('soucesList');
    }
}
