<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserCpController extends Controller
{

    public function reg()
    {
        return view('reg');
    }

    //
    public function get_info()
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('user_cp', compact('user'));
    }
//public function get_info(User $user){
//        //  $users=DB::table('users')->get;
//        return view('user_cp',compact('user'));
//    }

    public function user_store()
    {
//     User::create(
//         request(array('login','email','password'))
////     );
        $user = new User;
        $user->login = request('login');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->photo = 'img/grey.jpg';
        $user->save();
        return redirect('/1');

    }


    public function avaUpload(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = User::find(Auth::id())->id . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('/img'), $imageName);
        $user = User::find(Auth::id());
        $user->photo = $imageName;
        $user->save();
        return redirect('/user_cp');
    }

    public function store_about(Request $request)
    {
        $about='jjjj';
        if ($request->isMethod('post')) {
            $id = $request->id;
            $about = $request->about;
            User::where('id', $id)->update(['about' => $about]);
        }
        return $about;
    }
}

