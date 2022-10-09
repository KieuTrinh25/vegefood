<?php

namespace App\Http\Controllers;

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
}
