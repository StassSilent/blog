<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserCpController extends Controller
{

    public function reg(){
        return view('reg');
    }

    //
    public function get_info(){
        $id = Auth::id();
        $user=User::find($id);
        return view('user_cp',compact('user'));
    }
//public function get_info(User $user){
//        //  $users=DB::table('users')->get;
//        return view('user_cp',compact('user'));
//    }

    public function user_store(){
//     User::create(
//         request(array('login','email','password'))
////     );
        $user= new User;
        $user->login=request('login');
        $user->email=request('email');
        $user->password=bcrypt(request('password'));
        $user->save();
     return redirect('/1');
//dd(\request()->all());
    }
}


