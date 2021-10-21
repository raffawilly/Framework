<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;

class User extends Controller
{
    //
    public function login_admin()
    {
        # code...
        return view('login_admin');
    }

    public function cek_login_admin(Request $req)
    {
        # code...
        $rules =[
            'username' =>'required',
            'password'=>'required'
        ];
        $this->validate($req,$rules);
        $user = admin::where('username','=',$req->username)->where('password','=',$req->password)->first();
        if($user){
            return redirect()->route('admin_index');
        }
        else{
            return redirect('/welcome/login_admin');
        }
    }

    public function login_student()
    {
        # code...
        return view('login_student');
    }
}
