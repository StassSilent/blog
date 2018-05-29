<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\User;
use App\Dialog;
use Illuminate\Support\Facades\Auth;
class messageController extends Controller
{
    public function get_dialog(){
//        $dialog=Dialog::get();
        $id = Auth::id();
        $user = User::find($id);
        $data= Dialog::leftJoin('users as id_1', 'dialogs.id_1', '=', 'id_1.id')
          ->leftJoin('users as id_2', 'dialogs.id_2', '=', 'id_2.id')
        ->select('dialogs.id  as  id','dialogs.id_1  as  id_1', 'id_1.name  as  id_1_name', 'id_1.photo  as  id_1_photo', 'dialogs.id_2  as  id_2',
                'id_2.name  as  id_2_name', 'id_2.photo  as  id_2_photo')
            ->where('dialogs.id_1', $user->id)
            ->orwhere('dialogs.id_2', $user->id)
            ->get();

        return view('dialog',compact('data'));
    }


    public function post_dialog ($id){
        $id_photo=request()->id_photo;
        $id_d=$id;
        $id_name=request()->id_name;
        $data_mes= Message::leftJoin('dialogs as d','messages.dialog','=','d.id')
            ->select('messages.message as message', 'messages.id_from as from','messages.id_to as to' )
            ->where('messages.dialog', $id)
            ->get();
//        $data_mes_one=Message::leftJoin('dialogs as d','messages.dialog','=','d.id')
//            ->distinct('messages.id_from as from','messages.id_to as to' )
//            ->where('messages.dialog', $id)
//            ->get();
        return view('messages',compact('data_mes', 'id_d', 'id_photo','id_name'));
    }
    public function post_messages(Request $request){
    if ($request->isMethod('post')) {
            $id_dialog = $request->id_dialog;
            $id_to=$request->id_to;
            $mes=$request->mes;
            $message= new Message;
        $message->message=$mes;
        $message->dialog=$id_dialog;
        $message->id_from=Auth::id();
            $message->id_to=$id_to;
            $message->save();
//            return $request->all();
        }

    }
}
