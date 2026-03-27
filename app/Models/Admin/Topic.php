<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Topic extends Model
{
    use HasFactory;
    public static function add($data)
    {
        return DB::table('topics')->insert($data);
    }
    public static function edit($topicId,$data)
    {
        return DB::table('topics')->where('topic_id',$topicId)->update($data);
    }
    public static function remove($topicId)
    {
        return DB::table('topics')->where('topic_id',$topicId)->delete();
    }
    public static function topicByChapter($chapterId)
    {
        return DB::table('topics')->where('t_chapter',$chapterId)->orderBy('topic_number','asc')->get();
    }
    public static function topicById($topicId)
    {
        return DB::table('topics')->where('topic_id',$topicId)->first();
    }

    public static function getAll($subjectId)
    {
        return DB::table('topics')->where('t_chapter',$subjectId)->orderBy('topic_number','asc')->get();
    }
}
