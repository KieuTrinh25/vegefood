<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $user = Auth::user();
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
