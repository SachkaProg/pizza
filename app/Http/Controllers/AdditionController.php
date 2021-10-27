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


    public function list() {
        $souce = Addition::all();
        return view('addition.list',[
            'souce' => $souce
        ]);
    }
    public function create() {
        return view('addition.create');
    }
    public function delete(Request $request) {
        Addition::where('id', $request->id)->delete();
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


        $good = new Addition;
        $good->name = $request->name;
        $good->price = $request->price;
        $good->img = $path;
        $good->save();

        return redirect()->route('addList');
    }
    public function update(Request $request) {
        $souce = Addition::where('id', $request->id)->first();

        return view('addition.update', ['souce' => $souce]);
    }
    public function updatePost(Request $request)
    {
        $souce = Addition::where('id', $request->id)->first();
        $path = $souce->img;
        
        if($request->hasFile('img')){
            $img = $request->file('img');
            $imageName = time().'1.'.$request->img->extension(); 
            $request->file('img')->move(public_path() . '/uploads',$imageName);
            $path = '/uploads/'.$imageName;
        }


        Addition::where('id', $request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'img'  => $path
        ]);
        

        return redirect()->route('addList');
    }
}
