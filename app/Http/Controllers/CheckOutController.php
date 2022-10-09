<?php

namespace App\Http\Controllers;

use App\Models\Localtion;

class CheckOutController extends Controller
{
    public function index(){
        $localtionList = Localtion::all();
        return view('checkout', array('localtionList' => $localtionList));
    }

    public function checkout(){
        
    }
}
