<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthReq;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function auth(AuthReq $req)
    {
        $user=User::login($req->username,$req->password);
        if ($user!=null)
        {
            if ($user->status!=0)
            {
                Session::put('user',$user);
                return redirect()->route('admin-home');
            }else{
                return back()->with('failure','Your account is temporary disabled!');

            }

        }else{
            return back()->with('failure','Username or password is incorrect!');
        }
    }
}
