<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Order\Actions\DeleteOrderAction;
use App\Services\Order\Actions\ShowOrderAction;
use App\Services\Order\Actions\UpdateOrderAction;
use App\Services\OrderDetail\Actions\ShowOrderDetailAction;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Order::class);
        $orderList = resolve(ShowOrderAction::class)->run();
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
        $order = resolve(ShowOrderAction::class)->find($id);
        $orderList = resolve(ShowOrderAction::class)->run();
        return view('admin.orders.edit', array('order' => $order, 'orderList' => $orderList));
    }

    public function update(Request $request, $id)
    {

        $order = resolve(ShowOrderAction::class)->find($id);
        $order = resolve(UpdateOrderAction::class)->update($id, $request->all());

        // $this->authorize('update', Order::class);
        // $order = $this->repository->update($id, $request->all());
        return redirect()->route('admin.orders.index');
    }

    public function destroy($id)
    {

        $this->authorize('delete', Order::class);
        $order = resolve(DeleteOrderAction::class)->delete($id);
        return redirect()->route('admin.orders.index');
    }

    public function show($id)
    {

        $orderDetail = resolve(ShowOrderDetailAction::class)->find($id);
        // $orderDetail = orderDetail::find($id);
        //    dd($orderDetail);
        return view('admin.orders.show', array('orderDetail' => $orderDetail));
    }
}
