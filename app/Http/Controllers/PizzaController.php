<?php

namespace App\Http\Controllers;
use App\Models\Pizza;
use Exception;
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
        $popular = $request->input("popular");

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
                'use' => true
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

        try{
            $pizza = Pizza::create([
                'name' => $name,
                'composition'  => $composition,
                'possibleAds' => $possibleAds,
                'img'   => $path,
                'price' => $price,
                'popular'=> (int) $popular
            ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }





        return [
                    "status" => true,

                ];
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function editPizza(Request $request){

        $id = $request->input("id");
        $name = $request->input("name");
        $pizza = Pizza::where("id",$id)->first();
        $img = $pizza->img;

        if($pizza->img != $request->img){
            if($request->hasFile('img')){
                $img = $request->file('img');
                $imageName = time().'1.'.$request->img->extension();
                $request->file('img')->move(public_path() . '/uploads',$imageName);
                $img = '/uploads/'.$imageName;
            }
        }


        $price = $request->input("price");
        $popular = (int) $request->input("popular");

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

        Pizza::where('id', $id)->update([
            'name' => $name,
            'composition'  => $composition,
            'possibleAds' => $possibleAds,
            'img'   => $img,
            'popular' => $popular,
            'price' => $price
        ]);



        return [
                    "status" => true,

                ];
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getPizza(){
        return Pizza::all();
    }

    public function list(){
        $pizzas = Pizza::all();
        return view('pizza.list', [
            'pizzas' => $pizzas
        ]);
    }

    public function delete(Request $request) {
        $pizza = Pizza::where('id', $request->id)->delete();
        return redirect()->back();
    }
    public function updateComponents(Request $request) {
        $id = $request->id;
        $pizza = Pizza::where('id', $id)->first();
        $components = json_decode($pizza->components,true);
        if (empty($components)) {
            $components['comp1'] = '';
            $components['comp2'] = '';
            $components['comp3'] = '';
            $components['comp4'] = '';
            $components['comp5'] = '';
            $components['comp6'] = '';
        }
        return view('pizza.component', [
            'id' => $id,
            'components' => $components
        ]);
    }
    public function update(Request $request)
    {
        $pizza = Pizza::where('id',$request->id)->first();
        return view('pizza.update', [
            'pizza' => $pizza
        ]);
    }
    public function updatePost(Request $request)
    {
        $pizza = Pizza::where('id',$request->id)->first();
        return redirect()->route('pizzaList');
    }
    public function updateComponentsPost(Request $request) {
        $id = $request->id;
        $comp['comp1'] = $request->comp1;
        $comp['comp2'] = $request->comp2;
        $comp['comp3'] = $request->comp3;
        $comp['comp4'] = $request->comp4;
        $comp['comp5'] = $request->comp5;
        $comp['comp6'] = $request->comp6;
        $components = json_encode($comp);
        // print_r($components);
        Pizza::where('id', $id)->update([
            'components' => $components
        ]);
        return redirect()->back();
    }
}
