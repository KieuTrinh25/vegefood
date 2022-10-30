<?php

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductDetailController extends Controller
{
    public function addToCart(Request $request)
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 'pending')->first();
        if($order == null) {
            $order = Order::create(
                array(
                    'code' => randomOrderCode(),
                    'user_id' => Auth::user()->id,
                    'status' => 'pending'
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

}

