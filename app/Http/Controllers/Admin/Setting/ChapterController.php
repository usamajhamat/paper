<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChapterReq;
use App\Models\Admin\Chapter;
use App\Models\Admin\Course;
use App\Models\Admin\CourseClass;
use App\Models\Admin\Subject;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function chapterList()
    {

        return view('admin.chapter.chapter-list',
                     [
                         'courses'=>Course::courses()
                     ]
            );
    }
    public function add()
    {
        return view('admin.chapter.chapter-add',
            [
                'courses'=>Course::courses()
            ]
        );
    }

    public function save(ChapterReq $req)
    {

        $data=[
            'course'=>$req->course,
            'class'=>$req->class,
            'subject'=>$req->subject,
            'chapter_name'=>$req->chapter,
            'chapter_number'=>$req->number,
        ];
        if (Chapter::add($data))
        {
            return response()->json(['status'=>true,'msg'=>'New chapter is added successfully!']);
        }else{
            return response()->json(['status'=>false,'msg'=>'New chapter is not added!']);
        }
    }
    public function getChapters(Request $req)
    {
        $html=$this->chapters($req->subject);
        return response()->json(['status'=>true,'chapters'=>$html]);
    }

    public function edit($chapterId)
    {
        $chapter=Chapter::chaptersById($chapterId);
        $html=view('admin.chapter.partial.chapter-edit',
            [
                'classes'=>CourseClass::classesById($chapter->course),
                'courses'=>Course::courses(),
                'subjects'=>Subject::byClass($chapter->class),
                'chapter'=>$chapter

            ]
        )->render();
        return response()->json(['status'=>true,'subject'=>$html]);
    }

    public function update(ChapterReq $req)
    {

        $data=[
            'course'=>$req->course,
            'class'=>$req->class,
            'subject'=>$req->subject,
            'chapter_name'=>$req->chapter,
            'chapter_number'=>$req->number,
        ];
        $chapter=Chapter::chaptersById($req->id);
        if (Chapter::edit($req->id,$data))
        {
            $html=$this->chapters($chapter->subject);
            return response()->json(['status'=>true,'chapters'=>$html,'msg'=>'Chapter is updated successfully!']);

        }else{
            $html=$this->chapters($chapter->subject);
            return response()->json(['status'=>false,'chapters'=>$html,'msg'=>'Chapter is not updated!']);
        }
    }

    public function remove($chapterId)
    {

        $chapter=Chapter::chaptersById($chapterId);
        if (Chapter::remove($chapterId))
        {
            $html=$this->chapters($chapter->subject);
            return response()->json(['status'=>true,'chapters'=>$html,'msg'=>'Chapter is removed successfully!']);

        }else{
            $html=$this->chapters($chapter->subject);
            return response()->json(['status'=>false,'chapters'=>$html,'msg'=>'Chapter is not removed!']);
        }
    }


    public function chapters1($subjectId)
    {
        return response()->json(['status'=>true,'chapters'=>Chapter::chaptersBySub($subjectId)]);
    }

    private function chapters($subjectId)
    {
        $html=view('admin.chapter.partial.chapter-partial',
            [
                'chapters'=>Chapter::bySubject($subjectId)
            ]
        )->render();
        return  $html;
    }

}
