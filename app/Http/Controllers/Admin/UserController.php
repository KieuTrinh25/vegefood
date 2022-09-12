<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $userList = User::all();
        return view('admin.users.index', array(
            'userList' => $userList
        ));
    }
    public function destroy($id){
        User::destroy($id);
        return redirect()->route('admin.users.index');
    }
}
