<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubjectReq;
use App\Models\Admin\Chapter;
use App\Models\Admin\Course;
use App\Models\Admin\CourseClass;
use App\Models\Admin\Subject;
use App\Models\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Html;

class SubjectController extends Controller
{
    public function subjects()
    {
        return view('admin.subject.subject-list',
            [
                'courses'=>Course::courses()
            ]
        );
    }
    public function add()
    {
        return view('admin.subject.subject-add',
            [
                'courses'=>Course::courses()
            ]
        );
    }

    public function save(SubjectReq $req)
    {

        $image=null;

        if ($req->hasFile('photo')) {
            $filename = 'computer-' . uniqid(12) . time() . '.' . $req->file('photo')->getClientOriginalExtension();
            Storage::disk('photo')->putFileAs('/', $req->file('photo'), $filename);
            $image= $filename;
        }
        $data=[
            'courseId'=>$req->course,
            'classId'=>$req->class,
            'subject_name'=>$req->subject,
            'cover'=>$image,
        ];
        if (Subject::add($data))
        {
            return response()->json(['status'=>true,'msg'=>'New subject is added successfully!']);
        }else{
            return response()->json(['status'=>false,'msg'=>'New subject is not added!']);
        }
    }
    public function getSubjects(Request $req)
    {
        $html=$this->subject($req->class);
        return response()->json(['status'=>true,'subjects'=>$html]);
    }

    public function edit($subjectId)
    {
        $html=view('admin.subject.partial.subject-edit',
            [
                'classes'=>CourseClass::classes(),
                'courses'=>Course::courses(),
                'subject'=>Subject::getSubject($subjectId)
            ]
        )->render();
        return response()->json(['status'=>true,'subject'=>$html]);
    }

    public function update(SubjectReq $req)
    {
        $image=null;

        if ($req->hasFile('photo')) {
            $filename = 'subject-' . uniqid(12) . time() . '.' . $req->file('photo')->getClientOriginalExtension();
            Storage::disk('photo')->putFileAs('/', $req->file('photo'), $filename);
            $image= $filename;
            Helper::imageDelete($req->cover);
        }else{
            $image=$req->cover;
        }

        $data=[
            'courseId'=>$req->course,
            'classId'=>$req->class,
            'subject_name'=>$req->subject,
            'cover'=>$image,
        ];
        $sub=Subject::getSubject($req->id);
        if (Subject::edit($data,$req->id))
        {
            $html=$this->subject($sub->classId);
            return response()->json(['status'=>true,'subjects'=>$html,'msg'=>'Subject is updated successfully!']);

        }else{
            $html=$this->subject($sub->classId);
            return response()->json(['status'=>false,'subjects'=>$html,'msg'=>'Subject is not updated!']);
        }
    }

    public function remove($id)
    {

        $sub=Subject::getSubject($id);
        if (Subject::remove($id))
        {
            Helper::imageDelete($sub->cover);
            $html=$this->subject($sub->classId);
            return response()->json(['status'=>true,'subjects'=>$html,'msg'=>'Subject is removed successfully!']);

        }else{
            $html=$this->subject($sub->classId);
            return response()->json(['status'=>false,'subject'=>$html,'msg'=>'Subject is not removed!']);
        }
    }
    private function subject($classId)
    {
        $html=view('admin.subject.partial.subject-partial',
            [
                'subjects'=>Subject::byClass($classId)
            ]
        )->render();
        return  $html;
    }

    public function subject1($classId)
    {
        return response()->json(['status'=>true,'subjects'=>Subject::byClass($classId)]);
    }

}
