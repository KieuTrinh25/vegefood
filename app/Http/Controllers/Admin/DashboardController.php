<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        if(request()->has('action')){
            $action = request()->get('action');
            if($action == 'statistic_order'){
                
            }
        }
        $product_count = Product::count();
        $voucher_count = Voucher::count();
        $cus_count = Customer::count();
        $order_count = Order::count();
        $orders = Order::where('status','pending')->get();
        if(request()->time_from && request()->time_end){
            $orders = Order::where('status', 'pending')->whereBetween('created_at', [request()->time_from, request()->time_end])->get();
        }
        
        return view('admin.dashboard', compact('product_count','voucher_count','cus_count','orders','order_count'));
  

    }
}
