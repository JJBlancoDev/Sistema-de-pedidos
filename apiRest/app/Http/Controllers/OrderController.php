<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OrderResource::collection(Order::with(['products'])->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $order = new Order();

        $order->id_client = $request->id_client;
        $order->name_client = $request->name_client;
        $order->addres_client = $request->addres_client;
        $order->cellphone_client = $request->cellphone_client;
        $order->save();

        $order->products()->attach($request->products);

        return response()->json(
            $data = [
                'respuesta' => true,
                'mensaje' => 'Orden registrada correctamente'
            ], 
            200
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return OrderResource::collection(Order::with(['products'])->where('id', $order->id)->get());
    }
}
