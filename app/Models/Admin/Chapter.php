<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chapter extends Model
{
    use HasFactory;
    public static function add($data)
    {
        return DB::table('chapters')->insert($data);
    }
    public static function edit($chapterId,$data)
    {
        return DB::table('chapters')->where('chapter_id',$chapterId)->update($data);
    }
    public static function bySubject($subjectId)
    {
        return DB::table('chapters')
                   ->where('subject',$subjectId)
                   ->orderBy('chapter_name','DESC')
                   ->get();
    }
    public static function chaptersById($chapterId)
    {
        return DB::table('chapters')->where('chapter_id',$chapterId)->first();
    }
    public static function chaptersBySub($subjectId)
    {
        return DB::table('chapters')->where('subject',$subjectId)->get();
    }
    public static function remove($chapterId)
    {
        return DB::table('chapters')->where('chapter_id',$chapterId)->delete();
    }
}
