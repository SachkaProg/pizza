<?php

namespace App\Http\Controllers;
use App\Models\Good;
use App\Models\Sauce;
use App\Models\Category;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function getGoods(Request $request){


        $category = $request->input("subject");
//        echo $category;
//        echo $category;
//        echo $category;
//        echo "The $category has arrived.";
        return Good::where('category', $category)->get();
    }

    public function getSauces(){
        return Sauce::all();
    }
     public function list(){
     	$goods = Good::orderBy('category')->get();
        return view('goods.list', [
        	'goods' => $goods
        ]);
    }

    public function delete(Request $request) {
        $pizza = Good::where('id', $request->id)->delete();
        return redirect()->back();
    }

    public function create() {
        $category = Category::all();
        return view('goods.create', [
            'category' => $category
        ]);
    }


    public function createPost(Request $request) {
        $path = 0;
        
        if($request->hasFile('img')){
            $img = $request->file('img');
            $imageName = time().'1.'.$request->img->extension(); 
            $request->file('img')->move(public_path() . '/uploads',$imageName);
            $path = '/uploads/'.$imageName;
        }


        $good = new Good;
        $good->name = $request->name;
        $good->price = $request->price;
        $good->category = $request->category;
        $good->img = $path;
        $good->save();

        return redirect()->route('goodsList');
    }
    public function update(Request $request)
    {
        $good = Good::where('id', $request->id)->first();
        $category = Category::all();
        return view('goods.update', [
            'good' => $good,
            'category' => $category
        ]);
    }
    public function updatePost(Request $request)
    {
        $good = Good::where('id', $request->id)->first();
        $path = $good->img;
        
        if($request->hasFile('img')){
            $img = $request->file('img');
            $imageName = time().'1.'.$request->img->extension(); 
            $request->file('img')->move(public_path() . '/uploads',$imageName);
            $path = '/uploads/'.$imageName;
        }


        Good::where('id', $request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'img'  => $path
        ]);
        
        return redirect()->route('goodsList');
    }
}
