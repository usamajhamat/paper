<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CourseClass extends Model
{
    use HasFactory;

    public static function add($data)
    {
        return DB::table('classes')->insert($data);
    }
    public static function edit($id,$data)
    {
        return DB::table('classes')->where('class_id',$id)->update($data);
    }
    public static function classes()
    {
        return DB::table('classes as cl')
                   ->join('courses as c','cl.course_id','=','c.course_id')
                   ->orderBy('cl.class_number','ASC')
                   ->get(['cl.*','c.course_name']);
    }
    public static function classesById($id)
    {
        return DB::table('classes as cl')
                    ->join('courses as c','cl.course_id','=','c.course_id')
                    ->where('cl.course_id',$id)
                    ->orderBy('cl.class_number')
                    ->get();
    }

    // 4x4 code starts
    public static function AssignedCourse($classIds,$id)
    {

        // return DB::table('classes as cl')
        //             ->join('courses as c','cl.course_id','=','c.course_id')
        //             ->whereIn('cl.course_id',$classIds)
        //             ->orderBy('cl.class_number')
        //             ->get();

        return DB::table('classes as cl')
        ->join('courses as c','cl.course_id','=','c.course_id')
        ->whereIn('cl.class_id',$classIds)
        ->where('cl.course_id',$id)
        ->orderBy('cl.class_number')
        ->get();
    }



    public static function AssignedClass($classIds)
    {
        return DB::table('classes as cl')
                   ->whereIn('cl.class_id',$classIds)
                   ->first();
    }
        // 4x4 code ends





    public static function getClass($id)
    {
        return DB::table('classes as cl')
                   ->where('cl.class_id',$id)
                   ->first();
    }

    public static function remove($id)
    {
        return DB::table('classes')->where('class_id',$id)->delete();
    }

}
