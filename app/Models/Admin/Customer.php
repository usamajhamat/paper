<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;
    public static function add($data)
    {
        return DB::table('customers')->insert($data);
    }
    public static function edit($id,$data)
    {
        return DB::table('customers')->where('id',$id)->update($data);
    }
    public static function isExist($id)
    {
        return DB::table('customers')->where('id',$id)->exists();
    }
    public static function customers()
    {
        return DB::table('customers')->where('client_role','Administrator')->get();
    }
    public static function customerById($id)
    {
        return DB::table('customers')->where('id',$id)->first();
    }

//    public static function remove($id)
//    {
//        return DB::table('customers')->where('id',$id)->delete();
//    }

    public static function status($id,$data)
    {
        return DB::table('customers')
                   ->where('id',$id)
                   ->update($data);
    }
    public static function parentStatus($id)
    {
        return DB::table('customers')
            ->where('id',$id)
            ->first();
    }
    public static function login($username,$password)
    {
        return DB::table('customers')
                    ->where(['email'=>$username,'password'=>$password])
                    ->first();
    }
}
