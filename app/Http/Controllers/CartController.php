<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 'unpay')->first();
        if($order == null) {
            $order = Order::create(
                array(
                    'code' => randomOrderCode(),
                    'user_id' => Auth::user()->id,
                    'status' => 'unpay'
                )
            );
        }

        $orderDetail = $order->orderDetails()->where('product_id', $request->input('product_id'))->first();
        if($orderDetail == null){
            $orderDetail = new OrderDetail();
            $orderDetail->product_id = $request->input('product_id');
            $orderDetail->quantity = $request->input('quantity');
            $order->orderDetails()->save($orderDetail);
        }else{
            $orderDetail->quantity += $request->input('quantity');
            $orderDetail->save();
        }
        return redirect()->route('show.cart');
    }  

    public function index() {
        $user = Auth::user();
        // dd(config('order.unpay'));
        $order = Order::where('user_id', $user->id)->where('status', config('order.unpay'))->first();
        return view('cart', ['order' => $order]);
    }

    public function deleteOrderDetail(Request $request){
        $id = $request->input('order_detail_id');
        OrderDetail::destroy($id);
        $request->session()->flash('message','Deleted succesfully!'); 

        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('status', config('order.unpay'))->first();
        return view('cart', ['order' => $order]);
    }
}
