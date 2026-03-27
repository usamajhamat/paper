<?php

namespace App\Models\Client\Papers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Paper extends Model
{
    use HasFactory;

    public static function add($data)
    {
        return DB::table('papers')->insert($data);
    }
    public static function total()
    {
        return DB::table('papers')->get();
    }
    public static function edit($paperId,$data)
    {
        return DB::table('papers')->where('paperId',$paperId)->update($data);
    }
    public static function show($paperId)
    {
        return DB::table('papers')->where('paperId',$paperId)->first();
    }

    public static function teacher($teacherId,$schoolId)
    {
        return DB::table('papers as p')
                   ->join('courses as c','p.courseId','=','c.course_id')
                   ->join('classes as cl','p.classId','=','cl.class_id')
                   ->join('subjects as s','p.subjectId','=','s.subject_id')
                   ->join('customers as cus','p.teacher','=','cus.id')
                   ->where(['teacher'=>$teacherId,'school'=>$schoolId])
                   ->orderBy('p.paper_at', 'desc')
                   ->get(['p.*','c.course_name','cl.class_name','s.subject_name','cus.name']);
    }
    public static function school($schoolId, $date = '')
    {
        $data =  DB::table('papers as p')
            ->join('courses as c','p.courseId','=','c.course_id')
            ->join('classes as cl','p.classId','=','cl.class_id')
            ->join('subjects as s','p.subjectId','=','s.subject_id')
            ->join('customers as cus','p.teacher','=','cus.id')
            ->where(['school'=>$schoolId])
            ->orderBy('p.paper_at', 'desc');
            if($date){
                $data =  DB::table('papers as p')
            ->join('courses as c','p.courseId','=','c.course_id')
            ->join('classes as cl','p.classId','=','cl.class_id')
            ->join('subjects as s','p.subjectId','=','s.subject_id')
            ->join('customers as cus','p.teacher','=','cus.id')
            ->where('schedule_date', $date)
            ->where(['school'=>$schoolId])
            ->orderBy('p.paper_at', 'desc');
            }
            
            return $data->get(['p.*','c.course_name','cl.class_name','s.subject_name','cus.name']);
    }
      public static function school_s($schoolId, $sub='')
    {
        $data =  DB::table('papers as p')
            ->join('courses as c','p.courseId','=','c.course_id')
            ->join('classes as cl','p.classId','=','cl.class_id')
            ->join('subjects as s','p.subjectId','=','s.subject_id')
            ->join('customers as cus','p.teacher','=','cus.id')
            ->where(['school'=>$schoolId])
            ->orderBy('p.paper_at', 'desc');
            if($sub){
                $data->where('subjectId', $sub);
            }
            
            return $data->get(['p.*','c.course_name','cl.class_name','s.subject_name','cus.name']);
    }
public static function school_sd($schoolId, $date = '',$sub='')
    {
        $data =  DB::table('papers as p')
            ->join('courses as c','p.courseId','=','c.course_id')
            ->join('classes as cl','p.classId','=','cl.class_id')
            ->join('subjects as s','p.subjectId','=','s.subject_id')
            ->join('customers as cus','p.teacher','=','cus.id')
            ->where(['school'=>$schoolId])
            ->orderBy('p.paper_at', 'desc');
            if($sub){
                $data = $data->where('subjectId', $sub)->where('schedule_date', $date);;
            }
            
            return $data->get(['p.*','c.course_name','cl.class_name','s.subject_name','cus.name']);
    }


    public static function getById($paperId)
    {
        return DB::table('papers as p')
            ->join('courses as c','p.courseId','=','c.course_id')
            ->join('classes as cl','p.classId','=','cl.class_id')
            ->join('subjects as s','p.subjectId','=','s.subject_id')
            ->join('customers as cus','p.teacher','=','cus.id')
            ->where(['paperId'=>$paperId])
            ->first(['p.*','c.course_name','cl.class_name','s.subject_name','cus.name']);
    }


    public static function isExist($id)
    {
        return DB::table('papers')->where('paperId',$id)->exists();
    }
    public static function remove($paperId)
    {
        return DB::table('papers')->where('paperId',$paperId)->delete();
    }




}
