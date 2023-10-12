<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request){
        $orders = Order::whereHas('client', function($q) use ($request){
            return $q->where('name', 'like', '%' . $request->search . '%');
        })->latest()->paginate(10);
        // dd($orders);

        $clients = Client::get();
        return view('dashboard.orders.index',compact('orders','clients'));
    }

    public function products(Order $order){
        $products = $order->products;
        return view('dashboard.orders._products',compact('products','order'));
    }


    public function store(Request $request){

        return redirect()->route('dashboard.clients.orders.create',[$request->client_id]);
    }

    public function destroy(Order $order){

        foreach($order->products as $product){
            $product->update([
                'stock' =>$product->stock + $product->pivot->quantity
            ]);
        }
        $order->delete();
        session()->flash('success', __('site.delete_successfully'));
        return redirect()->route('dashboard.orders.index');
    }

}
