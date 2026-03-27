<?php

namespace App\Http\Controllers\Client\Setting;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use App\Models\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function info()
    {
        $school = Session::get('school');
        // return $school;
        return view('client.setting.school-setting',['customer'=>$school]);
    }

    public function update(Request $req)
    {
        $watermark=null;
        $logo=null;

        if ($req->hasFile('water')) {
            $filename = 'watermark-' . uniqid(12) . time() . '.' . $req->file('water')->getClientOriginalExtension();
            Storage::disk('photo')->putFileAs('/', $req->file('water'), $filename);
            $watermark = $filename;
            Helper::imageDelete($req->mark);
        }else{
            $watermark=$req->mark;
        }
        if ($req->hasFile('logo')) {
            $filename = 'logo-' . uniqid(12) . time() . '.' . $req->file('logo')->getClientOriginalExtension();
            Storage::disk('photo')->putFileAs('/', $req->file('logo'), $filename);
            $logo = $filename;
            Helper::imageDelete($req->oldLogo);
        }else{
            $logo=$req->oldLogo;
        }

        $data=[
            'name'=>$req->name,
            'phone'=>$req->phone,
            'school_name'=>$req->school,
            'address'=>$req->address,
            'logo'=>$logo,
            'watermark'=>$watermark,
            'watermark_type'=>$req->watermark_type,
            'wathermark_text'=>$req->wathermark_text,
            'wathermark_color'=>$req->wathermark_color,
            'wathermark_size'=>$req->wathermark_size,
            'wathermark_rotate'=>$req->wathermark_rotate,
            'wathermark_margin'=>$req->wathermark_margin,
            'wathermark_top'=>$req->wathermark_top,
            'wathermark_left'=>$req->wathermark_left,
            'watermark_position'=>$req->watermark_position
        ];
        // return $data;

        if (Customer::edit($req->id,$data))
        {
            $client=Helper::client();
            $school=$client->parent_id==null?Customer::customerById($client->id):Customer::customerById($client->parent_id);
            Session::put('school',$school);
            return back()->with('success','School info are updated successfully!');
        }else{
            return back()->with('failure','School are not updated!');
        }
    }
}
