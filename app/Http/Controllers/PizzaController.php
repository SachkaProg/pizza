<?php

namespace App\Http\Controllers;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function createPizza(Request $request){

        $path = 0;

        $name = $request->input("name");
        
        if($request->hasFile('img')){
            $img = $request->file('img');
            $imageName = time().'1.'.$request->img->extension(); 
            $request->file('img')->move(public_path() . '/uploads',$imageName);
            $path = '/uploads/'.$imageName;
        }
        
        $price = $request->input("price");

        $possibleAds = json_decode($request->input("possibleAds"));
        $possibleAds = json_encode($possibleAds);
        
        
        // $course = Course::create([
        //     'title' => $title,
        //     'desc'  => $desc,
        //     'img'   => $path,
        //     'pause' => $pause,
        //     'price' => $price
        // ]);
        

        // $sT = json_decode($request->input("stages_titles"));
        // $sD = json_decode($request->input("stages_descs"));
        // $sV = json_decode($request->input("stages_videos"));
        $ingTitles = json_decode($request->input("ing_titles"));
        $ingNullable = json_decode($request->input("ing_nullable"));
        $ingPrice = json_decode($request->input("ing_price"));

        $composition = [];

        for($i = 0; $i < count($ingTitles); $i++){
            // $composition[$ingTitles[$i]] = $ingNullable[$i];
            $composition[$i] = [
                'ingradient' => $ingTitles[$i],
                'nullable' => $ingNullable[$i],
                'price' => $ingPrice[$i],
                'use' => true,
            ];
        }

        $composition = json_encode($composition);

        

        // $stages;
        // for($i = 0; $i < count($sV); $i++){
        //     $stages[] = CourseStage::create([
        //         'title' => $sT[$i],
        //         'course_id' => $course->id,
        //         'desc' => $sD[$i],
        //         'number' => $i+1,
        //         'video_url' => $sV[$i]
        //     ]);
        // }

        $pizza = Pizza::create([
            'name' => $name,
            'composition'  => $composition,
            'possibleAds' => $possibleAds,
            'img'   => $path,
            'price' => $price
        ]);



        return [
                    "status" => true,

                ];
    }

    public function getPizza(){
        return Pizza::all();
    }
}
