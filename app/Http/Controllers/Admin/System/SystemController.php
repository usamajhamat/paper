<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SystemReq;
use App\Models\Admin\System;
use App\Models\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SystemController extends Controller
{
    public function info()
    {
        return view('admin.system.system-info',['info'=>System::info()]);
    }

    public function update(SystemReq $req)
    {
        $logo=null;

        if ($req->hasFile('logo')) {
            $filename = 'logo-' . uniqid(12) . time() . '.' . $req->file('logo')->getClientOriginalExtension();
            Storage::disk('photo')->putFileAs('/', $req->file('logo'), $filename);
            $logo = $filename;
            Helper::imageDelete($req->oldLogo);
        }else{
            $logo=$req->oldLogo;
        }

        $data=[
            'title'=>$req->title,
            'phone'=>$req->phone,
            'email'=>$req->email,
            'address'=>$req->address,
            'logo'=>$logo
        ];

        if (System::edit($data))
        {
            return back()->with('success','System info are updated successfully!');
        }else{
            return back()->with('failure','System are not updated!');
        }
    }

}
