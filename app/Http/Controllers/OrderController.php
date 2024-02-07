<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //index
    public function index(Request $request)
    {
        //get orders paginate 10
        $orders = Order::latest()->get();


        return view('pages.order.index', compact('orders'));
    }

    //show
    public function show($id)
    {
        return abort(404);
    }

    //edit
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('pages.order.edit', compact('order'));
    }

    //update
    public function update(Request $request, $id)
    {
        //update status order
        $order =  Order::findOrFail($id);
        $order->update([
            'status' => $request->status,
            'shipping_resi' => $request->shipping_resi,
        ]);

        //redirect to index
        return redirect()->route('order.index')->with([
            'message' => 'Data Berhasil Diedit!',
        'alert-type' => 'success'
    ]);
    }
}
