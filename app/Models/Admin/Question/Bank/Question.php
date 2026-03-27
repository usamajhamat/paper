<?php

namespace App\Models\Admin\Question\Bank;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    use HasFactory;
    public static function add($data)
    {
       return DB::table('questions')->insert($data);
    }
    public static function total()
    {
        return DB::table('questions')->get();
    }

    //Search by All i.e chapter,topic and medium(dual,eng,urdu)
    public static function search($courseId,$classId,$subId,$chId,$topicId,$type,$priority,$medium)
    {
        $condition=self::condition($courseId,$classId,$subId,$chId,$topicId,$type,$priority,$medium);
        return DB::table('questions as q')
                   ->join('courses as c','q.course','=','c.course_id')
                   ->join('classes as cl','q.class','=','cl.class_id')
                   ->join('subjects as s','q.subject','=','s.subject_id')
                   ->join('chapters as ch','q.chapter','=','ch.chapter_id')
                   ->join('topics as t','q.topic','=','t.topic_id')
                   ->join('question_types as ty','q.question_type','=','ty.question_id')
                   ->join('question_priorities as p','q.priority','=','p.priority_id')
                   ->join('mediums as m','q.medium','=','m.medium_id')
                  ->where($condition)
                 // ->orWhere('q.medium',$medium)

                  ->get(['q.*','c.course_name','cl.class_name','s.subject_name',
                         'ch.chapter_name','t.topic_name','ty.*','p.*','m.*']);
    }

    //Search by All i.e chapter and medium(dual,eng,urdu)
    public static function searchByChapter($courseId,$classId,$subId,$chId,$topicId,$type,$priority,$medium)
    {
        $condition=self::condition($courseId,$classId,$subId,$chId,$topicId,$type,$priority,$medium);
        return DB::table('questions as q')
            ->join('courses as c','q.course','=','c.course_id')
            ->join('classes as cl','q.class','=','cl.class_id')
            ->join('subjects as s','q.subject','=','s.subject_id')
            ->join('chapters as ch','q.chapter','=','ch.chapter_id')
            ->join('topics as t','q.topic','=','t.topic_id')
            ->join('question_types as ty','q.question_type','=','ty.question_id')
            ->join('question_priorities as p','q.priority','=','p.priority_id')
            ->join('mediums as m','q.medium','=','m.medium_id')
            ->where($condition)
            //->orWhere('q.medium',$medium)
            ->orderBy('t.topic_name','ASC')
            ->get(['q.*','c.course_name','cl.class_name','s.subject_name',
                'ch.chapter_name','t.topic_name','ty.*','p.*','m.*']);
    }

    public static function remove($questionId)
    {
        return DB::table('questions')->where('q_id',$questionId)->delete();
    }
    public static function edit($questionId,$data)
    {
        return DB::table('questions')->where('q_id',$questionId)->update($data);
    }
    public static function questionById($questionId)
    {
        return DB::table('questions as q')
                   ->join('question_types as ty','q.question_type','=','ty.question_id')
                   ->where('q_id',$questionId)
                   ->first(['q.*','ty.*']);
    }




    private static function condition($courseId,$classId,$subId,$chId,$topicId,$type,$priority,$medium)
    {
         if ($medium!=0 and $priority!=0 and $topicId!=null)
         {
            return [
                'q.course'=>$courseId,
                'q.class'=>$classId,
                'q.subject'=>$subId,
                'q.chapter'=>$chId,
                'q.topic'=>$topicId,
                'q.question_type'=>$type,
                'q.priority'=>$priority,
                'q.medium'=>$medium,

            ];
         }else if ($medium!=0 and $priority==0 and $topicId!=null)
         {
            return [
                 'q.course'=>$courseId,
                 'q.class'=>$classId,
                 'q.subject'=>$subId,
                 'q.chapter'=>$chId,
                 'q.topic'=>$topicId,
                 'q.question_type'=>$type,
                 //'q.priority'=>$priority,
                 'q.medium'=>$medium,

             ];
         }
         else if ($medium==0 and $priority!=0 and $topicId!=null)
         {
            return [
                 'q.course'=>$courseId,
                 'q.class'=>$classId,
                 'q.subject'=>$subId,
                 'q.chapter'=>$chId,
                 'q.topic'=>$topicId,
                 'q.question_type'=>$type,
                 'q.priority'=>$priority,
                // 'q.medium'=>$medium,

             ];
         }
         else if ($medium==0 and $priority==0 and $topicId==null)
         {
             return  [
                 'q.course'=>$courseId,
                 'q.class'=>$classId,
                 'q.subject'=>$subId,
                 'q.chapter'=>$chId,
                 //'q.topic'=>$topicId,
                 'q.question_type'=>$type,
                // 'q.priority'=>$priority,
                // 'q.medium'=>$medium,

             ];
         }
         else if ($medium==0 and $priority!=0 and $topicId==null)
         {
             return [
                 'q.course'=>$courseId,
                 'q.class'=>$classId,
                 'q.subject'=>$subId,
                 'q.chapter'=>$chId,
                 //'q.topic'=>$topicId,
                 'q.question_type'=>$type,
                 'q.priority'=>$priority,
                 // 'q.medium'=>$medium,

             ];
         }
         else if ($medium!=0 and $priority!=0 and $topicId==null)
         {
             return [
                 'q.course'=>$courseId,
                 'q.class'=>$classId,
                 'q.subject'=>$subId,
                 'q.chapter'=>$chId,
                 //'q.topic'=>$topicId,
                 'q.question_type'=>$type,
                 'q.priority'=>$priority,
                 'q.medium'=>$medium,

             ];
         }
         else if ($medium==0 and $priority==0 and $topicId!=null)
         {
             return [
                 'q.course'=>$courseId,
                 'q.class'=>$classId,
                 'q.subject'=>$subId,
                 'q.chapter'=>$chId,
                 'q.topic'=>$topicId,
                 'q.question_type'=>$type,
                 //'q.priority'=>$priority,
                 //'q.medium'=>$medium,

             ];
         }
         else if ($medium!=0 and $priority==0 and $topicId==null)
         {
             return [
                 'q.course'=>$courseId,
                 'q.class'=>$classId,
                 'q.subject'=>$subId,
                 'q.chapter'=>$chId,
                 //'q.topic'=>$topicId,
                 'q.question_type'=>$type,
                 //'q.priority'=>$priority,
                 'q.medium'=>$medium,

             ];
         }
    }



    //////////////////////////////////////////////////////////////////////////////////////////////////////
    /// /////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////// Filter Questions of Topic to generate paper //////////////////////////

    public static function filterQuestion($chId,$topicId,$type,$priority,$medium)
    {
        $condition=[
            'q.chapter'=>$chId,
            'q.topic'=>$topicId,
            'q.question_type'=>$type,
            'q.priority'=>$priority,
            // 'q.medium'=>$medium,
            ];
        return DB::table('questions as q')
            ->join('courses as c','q.course','=','c.course_id')
            ->join('classes as cl','q.class','=','cl.class_id')
            ->join('subjects as s','q.subject','=','s.subject_id')
            ->join('chapters as ch','q.chapter','=','ch.chapter_id')
            ->join('topics as t','q.topic','=','t.topic_id')
            ->join('question_types as ty','q.question_type','=','ty.question_id')
            ->join('question_priorities as p','q.priority','=','p.priority_id')
            ->join('mediums as m','q.medium','=','m.medium_id')
            ->where($condition)
            //->orWhere('q.medium',$medium)
            ->orderBy('t.topic_name','ASC')
            ->get(['q.*','c.course_name','cl.class_name','s.subject_name',
                'ch.chapter_name','t.topic_name','ty.*','p.*','m.*']);
    }

    public static function filterById($questionId)   // filter by question id
    {
        $condition=[
            'q.q_id'=>$questionId
        ];
        return DB::table('questions as q')
            ->join('courses as c','q.course','=','c.course_id')
            ->join('classes as cl','q.class','=','cl.class_id')
            ->join('subjects as s','q.subject','=','s.subject_id')
            ->join('chapters as ch','q.chapter','=','ch.chapter_id')
            ->join('topics as t','q.topic','=','t.topic_id')
            ->join('question_types as ty','q.question_type','=','ty.question_id')
            ->join('question_priorities as p','q.priority','=','p.priority_id')
            ->join('mediums as m','q.medium','=','m.medium_id')
            ->where($condition)
            //->orWhere('q.medium',$medium)
            ->orderBy('t.topic_name','ASC')
            ->get(['q.*','c.course_name','cl.class_name','s.subject_name',
                'ch.chapter_name','t.topic_name','ty.*','p.*','m.*']);
    }

}
