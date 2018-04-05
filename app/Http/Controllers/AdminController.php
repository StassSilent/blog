<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorypage;
use App\User;
class AdminController extends Controller
{
//    public function panel(){
//        return view('admin_panel');
//    }
    public function panel(){
        $user=User::get();
        $categ=Categorypage::get();
        $user_count=$user->count();
        $categ_count=$categ->count();
        $data=User::select('users.name  as  login','users.photo as photo')
            ->get();
        return view('admin_panel',compact('user_count','categ_count','data'));
    }
    public function block(){
        $user=User::get();
        $id=request($user->id);
        $user1=User::find($id);
        $block = User:: where('id', request($user1->id))->value($user->id);
        Categorypage::insert([
            'block'=>$block,
        ]);
        return redirect('/admin_panel');
    }

}




