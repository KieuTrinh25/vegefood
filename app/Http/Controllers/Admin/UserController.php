<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function verify(Request $request) {
        $users = DB::table('users')
                ->where('is_actived', false)
                ->get();
        foreach($users as $user) {
            if(Hash::check($user->email, $request->token)) {
                DB::table('users')
                ->where('id', $user->id)
                ->update(['is_actived'=>true]);
                break;
            }
        }
    }
}
