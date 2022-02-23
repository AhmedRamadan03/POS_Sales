<?php

namespace App\Http\Controllers\Dashboard\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('da');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {   
        $orders = $client->orders()->with('products')->get();
        $categories = Category::with('products')->get();
        return view('dashboard.clients.orders.create', compact('client', 'categories','orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Client $client)
    {
        $request->validate([
            'product_ids'      =>  'required|array',
        ]);

        $order  =   $client->orders()->create([]);
        $total_price    = 0;

        foreach($request->product_ids as $index=>$product_id){
            $product    = Product::where('id',$product_id)->first();
            $total_price    +=  $product->sale_price;
            $order->products()->attach($product_id,['quantity' =>  $request->quantities[$index]]);

            $product->update([
                'stock' =>  $product->stock - $request->quantities[$index],
            ]);
        }
        $order->update([
            'total_price'   =>   $total_price
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order, Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, Client $client)
    {
        //
    }
}
