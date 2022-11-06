<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Order\OrderRepositoryInterface;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orderList = Order::all();
        $order_count = Order::count();
        $number_pending = 0;
        $number_finish = 0;
        foreach ($orderList as $order) {
            if ($order->status == 'pending')
                $number_pending++;
            if ($order->status == 'finish')
                $order_count = Order::count();
            $number_finish++;
        }


        return view('admin.orders.index', compact('number_finish','number_pending','order_count'),array(
            'orderList' => $orderList

        ));
    }


    public function edit($id)
    {
        $order = Order::find($id);
        $orderList = Order::all();
        return view('admin.orders.edit', array('order' => $order, 'orderList' => $orderList));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->update($request->all());
        return redirect()->route('admin.orders.index');
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return redirect()->route('admin.orders.index');
    }

    public function show($id)
    {
        $orderDetail = orderDetail::find($id);
        //    dd($orderDetail);
        return view('admin.orders.show', array('orderDetail' => $orderDetail));
    }
}
