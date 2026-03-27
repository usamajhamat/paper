<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;
    public static function add($data)
    {
        return DB::table('users')->insert($data);
    }
    public static function edit($id,$data)
    {
        return DB::table('users')->where('id',$id)->update($data);
    }
    public static function setting($id,$data)
    {
        return DB::table('users')->where('id',$id)->update($data);
    }
    public static function users()
    {
        return DB::table('users as u')
                   ->join('roles as r','u.role','=','r.role_id')
                  ->get(['u.*','r.role_name']);
    }

    public static function isExist($id)
    {
        return DB::table('users')->where('id',$id)->exists();
    }
    public static function login($username,$password)
    {
        return DB::table('users as u')
            ->join('roles as r','u.role','=','r.role_id')
            ->where(['email'=>$username,'password'=>$password])
            ->first(['u.*','r.role_name']);
    }
    public static function userById($id)
    {
        return DB::table('users as u')
            ->join('roles as r','u.role','=','r.role_id')
            ->where(['id'=>$id])
            ->first(['u.*','r.role_name']);
    }

    public static function remove($id)
    {
        return DB::table('users')->where('id',$id)->delete();
    }

    public static function status($id,$data)
    {
        return DB::table('users')->where('id',$id)->update($data);
    }
}
