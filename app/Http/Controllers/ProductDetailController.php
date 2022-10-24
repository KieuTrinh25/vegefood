<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Product;


class ProductDetailController extends Controller
{
 public function addToCart($id){
       
        $product = Product ::find($id);
        $cart =  session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $cart[$id]['quantity'] +1 ;
        }else{
            $cart[$id]=[
               'name'=> $product->name,
               'price'=>$product -> price,
               'quantity'=> 1,
               'img'=>$product ->img
            ];
        };
        session()->put('cart',$cart);
        // echo"<pre>";
        // print_r(session()->get('cart'));
        return response()->json([
            'code'=>200,
            'message'=>'success'
        ],200);
 }
 public function showCart(){ 
    // echo"<pre>";
    //     print_r(session()->get('cart'));
}
=======
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
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
        
    
>>>>>>> 0795341 (addtocart)
}
