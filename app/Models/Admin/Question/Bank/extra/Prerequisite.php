<?php

namespace App\Models\Admin\Question\Bank\extra;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Prerequisite extends Model
{
    use HasFactory;
   //////////////Questions Priority//////////////
    public static function priorities()
    {
        return DB::table('question_priorities')->get();
    }
    public static function priorityById($priorityId)
    {
        return  DB::table('question_priorities')->where('priority_id',$priorityId)->first();
    }
    public static function editPriority($priorityId,$data)
    {
        return  DB::table('question_priorities')->where('priority_id',$priorityId)->update($data);
    }
    ////////////End////////////


    //////////////Questions Type//////////////
    public static function questionTypes()
    {
      return  DB::table('question_types')->get();
    }

    public static function typeById($typeId)
    {
        return  DB::table('question_types')->where('question_id',$typeId)->first();
    }
    public static function typeByAssignId($assignId)
    {
        return  DB::table('question_types as q')
                   ->join('assigns as a','q.question_id','=','a.typeId')
                   ->where('a.assign_id',$assignId)
                  ->first(['q.*']);
    }

    public static function editType($typeId,$data)
    {
        return  DB::table('question_types')->where('question_id',$typeId)->update($data);
    }
    ////////////End////////////


    //////////////Questions Type//////////////
    public static function mediums()
    {
        return DB::table('mediums')->orderBy('medium_name')->get();
    }
    public static function mediumById($mediumId)
    {
        return  DB::table('mediums')->where('medium_id',$mediumId)->first();
    }
    public static function editMedium($mediumId,$data)
    {
        return  DB::table('mediums')->where('medium_id',$mediumId)->update($data);
    }
    ////////////End////////////
}
