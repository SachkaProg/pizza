<?php

namespace App\Http\Controllers;
use App\Models\Addition;
use Illuminate\Http\Request;

class AdditionController extends Controller
{
    public function createAddition(Request $request){

        $path = 0;

        $name = $request->input("name");
        
        if($request->hasFile('img')){
            $img = $request->file('img');
            $imageName = time().'1.'.$request->img->extension(); 
            $request->file('img')->move(public_path() . '/uploads',$imageName);
            $path = '/uploads/'.$imageName;
        }
        
        $price = $request->input("price");


        $addition = Addition::create([
            'name' => $name,
            'img' => $path,
            'price' => $price,
            'quantity' => 1,
        ]);



        return [
                    "status" => true,

                ];
    }

    public function getAdditions(){
        return Addition::all();
    }

    public function IngradientItemByName(Request $request){
        $name = $request->input("name");

        return Addition::where('name', $name)->first();
    }
}
