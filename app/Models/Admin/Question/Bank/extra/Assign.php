<?php

namespace App\Models\Admin\Question\Bank\Extra;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Assign extends Model
{
    use HasFactory;
    public static function addType($data)
    {
        return DB::table('assigns')->insert($data);
    }
    public static function getByType($typeId,$courseId,$classId,$subjectId,$chapterId)
    {
        return  DB::table('assigns')
                    ->where([
                             'courseId'=>$courseId,
                             'classId'=>$classId,
                             'subjectId'=>$subjectId,
                             'chapterId'=>$chapterId,
                             'typeId'=>$typeId,

                    ])
                    ->exists();
    }
    public static function getByPriority($priorityId,$courseId,$classId,$subjectId,$chapterId)
    {
        return  DB::table('assigns')
            ->where([
                'courseId'=>$courseId,
                'classId'=>$classId,
                'subjectId'=>$subjectId,
                'chapterId'=>$chapterId,
                'priorityId'=>$priorityId
            ])
            ->first();
    }
    public static function existTypes($typeId,$courseId,$classId,$subjectId,$chapterId)
    {
        return  DB::table('assigns')
            ->where([
                'courseId'=>$courseId,
                'classId'=>$classId,
                'subjectId'=>$subjectId,
                'chapterId'=>$chapterId,
                'typeId'=>$typeId,
                'type'=>'questionType'
            ])
            ->exists();
    }
    public static function existPriority($priorityId,$courseId,$classId,$subjectId,$chapterId)
    {
        return  DB::table('assigns')
            ->where([
                'courseId'=>$courseId,
                'classId'=>$classId,
                'subjectId'=>$subjectId,
                'chapterId'=>$chapterId,
                'priorityId'=>$priorityId,
                'type'=>'priority'
            ])
            ->exists();
    }
    public static function removeByType($courseId,$classId,$subjectId,$chapterId,$type,$typeId)
    {
        return  DB::table('assigns')
            ->where([
                'courseId'=>$courseId,
                'classId'=>$classId,
                'subjectId'=>$subjectId,
                'chapterId'=>$chapterId,
                'typeId'=>$typeId,
                'type'=>$type,
            ])
            ->delete();
    }
    public static function removeByPriority($courseId,$classId,$subjectId,$chapterId,$type,$typeId)
    {
        return  DB::table('assigns')
            ->where([
                'courseId'=>$courseId,
                'classId'=>$classId,
                'subjectId'=>$subjectId,
                'chapterId'=>$chapterId,
                'priorityId'=>$typeId,
                'type'=>$type
            ])
            ->delete();
    }
    public static function editPriority($priorityId,$data)
    {
        return  DB::table('assigns')->where('priority_id',$priorityId)->update($data);
    }

    public static function QTbyChapter($chapterId)
    {
        return  DB::table('assigns as a')
                    ->join('question_types as t','a.typeId','=','t.question_id')
                    ->where('a.chapterId',$chapterId)
                    ->get(['a.*','t.*']);
    }
    public static function getById($assignId)
    {
        return  DB::table('assigns')->where('assign_id',$assignId)->first();
    }
    public static function priorityByChapter($chapterId)
    {
        return  DB::table('assigns as a')
            ->join('question_priorities as p','a.priorityId','=','p.priority_id')
            ->where('a.chapterId',$chapterId)
            ->get(['a.*','p.*']);
    }
    

    public static function getByMedium($chapterId)
    {
        return  DB::table('chapters')
            ->where([
                'chapter_id'=>$chapterId,
            ])->first();
    }
}
