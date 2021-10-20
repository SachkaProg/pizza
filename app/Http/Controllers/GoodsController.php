<?php

namespace App\Http\Controllers;
use App\Models\Good;
use App\Models\Sauce;
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
}
