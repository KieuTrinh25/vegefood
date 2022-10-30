<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Order\OrderRepositoryInterface;
use App\Http\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $repository;
    protected $repository_orderDetail;

    public function __construct(OrderRepositoryInterface $repository, OrderDetailRepositoryInterface $repository_orderDetail)
    {
        $this->repository = $repository;
        $this->repository_orderDetail = $repository_orderDetail;
    }
    public function index()
    {
        // $user = Auth::user();
        // $orderList = array();
        $this->authorize('viewAny', Order::class);

        $orderList = $this->repository->list();

        return view('admin.orders.index', array(
            'orderList' => $orderList
        ));
    }

    public function edit($id)
    {       
        $order = $this->repository->find($id);
        $orderList = $this->repository->getAll();
        return view('admin.orders.edit', array('order' => $order, 'orderList' => $orderList));
    }

    public function update(Request $request, $id)
    {
        // $this->authorize('update', Order::class);
        $order = $this->repository->update($id, $request->all());
        return redirect()->route('admin.orders.index');
    }

    public function destroy($id)
    {
        $order = $this->repository->delete($id);
        return redirect()->route('admin.orders.index');
    }

    public function show($id)
    {
        $orderDetail = $this->repository_orderDetail->find($id);
        // $orderDetail = orderDetail::find($id);
        //    dd($orderDetail);
        return view('admin.orders.show', array('orderDetail' => $orderDetail));
    }
}
