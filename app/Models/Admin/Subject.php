<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subject extends Model
{
    use HasFactory;
    public static function add($data)
    {
        return DB::table('subjects')->insert($data);
    }
    public static function edit($data,$subjectId)
    {
        return DB::table('subjects')->where('subject_id',$subjectId)->update($data);
    }
    public static function byClass($classId)
    {
        return DB::table('subjects as s')
            ->where('s.classId',$classId)
            ->orderBy('s.subject_name','DESC')
            ->get(['s.*']);
    }

    public static function fetchSubjectByAssignedSubjectstoTeachers($teacherId,$classId)
    {



        return DB::table('subjects as s')
        ->join('classes_assigned_to_teachers', 's.subject_id', '=', 'classes_assigned_to_teachers.class_number')
        ->where('classes_assigned_to_teachers.teacherId', $teacherId)
        ->where('s.classId', $classId)
        ->select('s.*')
        ->distinct()
        ->get();

        
        // return DB::table('subjects')
        // ->join('classes_assigned_to_teachers', 'subjects.subject_id', '=', 'classes_assigned_to_teachers.class_number')
        // ->join('classes', 'subjects.classId', '=', 'classes.class_id')
        // ->join('courses', 'subjects.courseId', '=', 'courses.course_id')
        // ->where('classes_assigned_to_teachers.teacherId', $teacherId)
        // ->select('subjects.*')
        // ->distinct()
        // ->get();


    // $assignedSubjectsArray = [];
    // foreach ($assignedSubjects as $item) {
    //     $assignedSubjectsArray[] = $item->class_number;
    // }
    //     return DB::table('classes_assigned_to_teachers as cast')
    //         ->where('cast.teacherId',$teacherId)
    //         ->orderBy('cast.id','DESC')
    //         ->get(['cast.*']);


    }


    public static function getSubject($subjectId)
    {
        return DB::table('subjects')
            ->where('subject_id',$subjectId)
            ->join('classes', 'classes.class_id','=','subjects.classId')
            ->first();
    }
    public static function remove($subjectId)
    {
        return DB::table('subjects')
            ->where('subject_id',$subjectId)
            ->delete();
    }
}
