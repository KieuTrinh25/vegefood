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
    protected $repository;

    public function __construct(OrderRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(){
        $orderList = $this->repository->list();
        return view('admin.orders.index', array(
            'orderList' => $orderList
        ));
    }


    public function edit($id){
        // $order = Order::find($id);
        $order = $this->repository->find($id);
        $orderList = $this->repository->list();
        return view('admin.orders.edit', array('order' => $order, 'orderList' => $orderList));
    }

    public function update(Request $request, $id){
        $order = $this->repository->find($id);
        $order = $this->repository->update($id, $request->all());
        // $order->update( $request->all());
        return redirect()->route('admin.orders.index');
    }

    public function destroy($id){
        // Order::destroy($id);
        $order = $this->repository->delete($id);
        return redirect()->route('admin.orders.index');
    }

    public function show($id){       
        // $orderDetail = orderDetail::find($id);
        $orderDetail = $this->orderDetailRepository->find($id);
    //    dd($orderDetail);
        return view('admin.orders.show', array('orderDetail' => $orderDetail)); 
    }
}
