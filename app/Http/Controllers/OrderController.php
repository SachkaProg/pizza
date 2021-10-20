<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function makeOrder(Request $request){

        $order = $request->input("order");
        $total = $request->input("total");
        $name = $request->input("name");
        $phone = $request->input("phone");
        $city = $request->input("city");
        $house = $request->input("house");
        $apartment = $request->input("apartment");
        $floor = $request->input("floor");
        $intercom = $request->input("intercom");
        $korpus = $request->input("korpus");
        $entrance = $request->input("entrance");
        $comment = $request->input("comment");
        $callback = $request->input("callback");


        $order = Order::create([
            'order' => $order,
            'status' => 'active',
            'total' => $total,
            'name' => $name,
            'phone' => $phone,
            'city' => $city,
            'house' => $house,
            'apartment' => $apartment,
            'floor' => $floor,
            'intercom' => $intercom,
            'korpus' => $korpus,
            'entrance' => $entrance,
            'comment' => $comment,
            'callback' => (int) $callback,
        ]);


        return [
            "status" => true,
        ];
    }

    public function getOrders(){
        $active = Order::where('status', 'active')->orderBy('created_at')->get();
        $completed = Order::where('status', 'completed')->orderBy('created_at')->get();
        $rejected = Order::where('status', 'rejected')->orderBy('created_at')->get();
        return [
            'active' => $active,
            'completed' => $completed,
            'rejected' => $rejected
        ];
    }

    public function changeStatusOrder(Request $req)
    {
        $id = $req->id;
        $status = $req->status;

        $order = Order::where('id', $id)->update([
            'status' => $status
        ]);

        return [
            'status' => true,
            'order'  => $order
        ];
    }
}
