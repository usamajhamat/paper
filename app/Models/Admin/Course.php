<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    use HasFactory;
    public static function add($data)
    {
        return DB::table('courses')->insert($data);
    }
    public static function edit($id,$data)
    {
        return DB::table('courses')->where('course_id',$id)->update($data);
    }
    public static function courses()
    {
        return DB::table('courses')->get();
    }
    public static function courseById($id)
    {
        return DB::table('courses')->where('course_id',$id)->first();
    }

    public static function remove($id)
    {
        return DB::table('courses')->where('course_id',$id)->delete();
    }
}
