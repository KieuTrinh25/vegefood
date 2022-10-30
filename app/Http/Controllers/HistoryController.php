<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // dd( config('order.unpay', 'order.finished'));
        $order = Order::where('user_id', $user->id)->orderByDesc('created_at')->limit(1)->first();
        return view('history', ['order' => $order]);

    }
}
