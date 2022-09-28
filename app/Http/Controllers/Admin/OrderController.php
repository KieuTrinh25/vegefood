<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orderList = Order::all();
        return view('admin.orders.index', array(
            'orderList' => $orderList
        ));
    }


    public function edit($id){
        $order = Order::find($id);
        $orderList = Order::all();
        return view('admin.orders.edit', array('order' => $order, 'orderList' => $orderList));
    }

    public function update(Request $request, $id){
        $order = Order::find($id);
        $order->update( $request->all());
        return redirect()->route('admin.orders.index');
    }

    public function destroy($id){
        Order::destroy($id);
        return redirect()->route('admin.orders.index');
    }

    public function show($id){       
        $orderDetail = orderDetail::find($id);
    //    dd($orderDetail);
        return view('admin.orders.show', array('orderDetail' => $orderDetail)); 
    }
}
