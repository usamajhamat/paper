<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Account;
use App\Http\Requests\Admin\UserReq;
use App\Models\Admin\Role;
use App\Models\Admin\User;
use App\Models\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function admins()
    {
        return view('admin.users.users-list',['users'=>User::users()]);
    }

    public function add()
    {
        return view('admin.users.user-add',['roles'=>Role::roles()]);
    }
    public function save(UserReq $req)
    {

        $photo=null;
        if ($req->hasFile('photo')) {
            $filename = 'photo-' . uniqid(12) . time() . '.' . $req->file('photo')->getClientOriginalExtension();
            Storage::disk('photo')->putFileAs('/', $req->file('photo'), $filename);
            $photo = $filename;
        }

        $data=[
            'id'=>Helper::userId(),
            'name'=>$req->name,
            'phone'=>$req->phone,
            'gender'=>$req->gender,
            'email'=>$req->username,
            'password'=>$req->password,
            'role'=>$req->role,
            'status'=>$req->status,
            'photo'=>$photo
        ];

        if (User::add($data))
        {
            return back()->with('success','New user is added successfully!');
        }else{
            return back()->with('failure','New user is  not added!');
        }
    }

    public function edit($id)
    {
        return response()->json(['user'=>User::userById($id),'roles'=>Role::roles()]);
    }

    public function update(UserReq $req)
    {
        $photo=null;


        if ($req->hasFile('photo')) {
            $filename = 'photo-' . uniqid(12) . time() . '.' . $req->file('photo')->getClientOriginalExtension();
            Storage::disk('photo')->putFileAs('/', $req->file('photo'), $filename);
            $photo = $filename;
            Helper::imageDelete($req->oldPhoto);
        }else{
            $photo=$req->oldPhoto;
        }

        $data=[
            'name'=>$req->name,
            'phone'=>$req->phone,
            'gender'=>$req->gender,
            'email'=>$req->username,
            'password'=>$req->password,
            'role'=>$req->role,
            'status'=>$req->status,
            'photo'=>$photo
        ];

        if (User::edit($req->id,$data))
        {
            return back()->with('success','User is updated successfully!');
        }else{
            return back()->with('failure','User is  not Updated!');
        }
    }


    public function logout()
    {
        Session::forget('user');
        return redirect()->route('user-login');
    }

    public function profile($id)
    {
        return view('admin.users.user-profile',['user'=>User::userById($id)]);
    }


    public function setting($id)
    {
        return view('admin.users.user-change-password',['user'=>User::userById($id)]);
    }
    public function account(Account $req)
    {
        $photo=null;


        if ($req->hasFile('photo')) {
            $filename = 'photo-' . uniqid(12) . time() . '.' . $req->file('photo')->getClientOriginalExtension();
            Storage::disk('photo')->putFileAs('/', $req->file('photo'), $filename);
            $photo = $filename;
            Helper::imageDelete($req->oldPhoto);
        }else{
            $photo=$req->oldPhoto;
        }

        $data=[
            'email'=>$req->email,
            'password'=>$req->password,
            'photo'=>$photo
        ];

        if (User::edit($req->id,$data))
        {
            Session::put('user',User::userById($req->id));
            return back()->with('success','User info is updated successfully!');
        }else{
            return back()->with('failure','User info is  not Updated!');
        }
    }

    public function remove($id)
    {

        if (User::remove($id))
        {
            return back()->with('success','User is deleted successfully!');
        }else{
            return back()->with('failure','User is  not deleted!');
        }
    }

    public function status($id,$status)
    {

        if (User::status($id,['status'=>$status]))
        {
            return response()->json(['status'=>true,'message'=>'User status is changed successfully!']);
        }else{
            return response()->json(['status'=>false,'message'=>'User status is not changed']);
        }
    }

}
