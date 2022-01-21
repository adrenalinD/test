<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view("order.index", compact("orders"));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('order.show', compact('order'));
    }

    public function create()
    {
        return view('order.create');
    }

    public function store(Request $request)
    {
        $client = Client::firstOrCreate([
            "name" => $request->fio,
            "phone" => $request->phone,
        ]);
        Order::insert([
            "client_id" => $client->id,
            "ration_name" => $request->ration_name,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "delivery_type" => $request->delivery_type,
            "days" => json_encode(array_values($request->days)),
            "comment" => $request->comment ?? null,
            "create_date" => $request->create_date,
        ]);

        return redirect(route('order.list'));
    }

}
