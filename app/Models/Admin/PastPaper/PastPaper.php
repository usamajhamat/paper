<?php

namespace App\Models\Admin\PastPaper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PastPaper extends Model
{
    use HasFactory;
    public static function add($data)
    {
        return DB::table('past_papers')->insert($data);
    }

    public static function search($boardId,$classId,$subjectId)
    {
        return DB::table('past_papers as p')
                   ->join('boards as b','p.board','=','b.board_id')
                   ->join('board_classes as c','p.class','=','c.class_id')
                   ->join('board_subjects as s','p.subject','=','s.subject_id')
                   ->join('shifts as sh','p.shift','=','sh.shift_id')
                   ->join('paper_types as t','p.paper_type','=','t.type_id')
                   ->where(['p.board'=>$boardId,'p.class'=>$classId,'p.subject'=>$subjectId])
                   ->get(['p.*','b.board_name','c.class_name','s.subject_name','t.type_name','sh.shift_name']);
    }
    public static function searchById($paperId)
    {
        return DB::table('past_papers as p')
            ->join('boards as b','p.board','=','b.board_id')
            ->join('board_classes as c','p.class','=','c.class_id')
            ->join('board_subjects as s','p.subject','=','s.subject_id')
            ->join('shifts as sh','p.shift','=','sh.shift_id')
            ->join('paper_types as t','p.paper_type','=','t.type_id')
            ->where(['p.paper_id'=>$paperId])
            ->get(['p.*','b.board_name','c.class_name','s.subject_name','t.type_name','sh.shift_name']);
    }
    public static function paperById($paperId)
    {
        return DB::table('past_papers')->where('paper_id',$paperId)->first();
    }
    public static function edit($paperId,$data)
    {
        return DB::table('past_papers')->where('paper_id',$paperId)->update($data);
    }
    public static function remove($paperId)
    {
        return DB::table('past_papers')->where('paper_id',$paperId)->delete();
    }

    public static function total()
    {
        return DB::table('past_papers')->get();
    }

}
