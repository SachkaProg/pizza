<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function makeBanner(Request $request){

        $name = $request->input("name");
        $link = $request->input("link");

        if($request->hasFile('img')){
            $img = $request->file('img');
            $imageName = time().'1.'.$request->img->extension();
            $request->file('img')->move(public_path() . '/uploads',$imageName);
            $path = '/uploads/'.$imageName;
        }

        $order = Banner::create([
            'name' => $name,
            'link' => $link,
            'img' => $path
        ]);

        return [
            "status" => true,
        ];
    }

    public function getBanners(){
        return Banner::all();
    }

    public function editBanner(Request $req)
    {
        $id = $req->id;

        $ban = Banner::where('id', $id)->first();
        $img = $ban->img;

        if($ban->img != $req->img){
            if($req->hasFile('img')){
                $img = $req->file('img');
                $imageName = time().'1.'.$req->img->extension();
                $req->file('img')->move(public_path() . '/uploads',$imageName);
                $img = '/uploads/'.$imageName;
            }
        }

        Banner::where('id', $id)->update([
            'name' => $req->name,
            'link' => $req->link,
            'img' => $img
        ]);

        return [
            'status' => true,
        ];
    }

    public function deleteBanner(Request $req)
    {
        Banner::whereId($req->id)->delete();
        return;
    }
}
