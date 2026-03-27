<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseReq;
use App\Models\Admin\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function courses()
    {
        return view('admin.course.course-list',['courses'=>Course::courses()]);
    }
    public function save(CourseReq $req)
    {

        $data=[
            'course_name'=>$req->name,
            'descriptive_name'=>$req->short,
        ];
        if (Course::add($data))
        {
            $html=view('admin.course.partial.courses-partial',['courses'=>Course::courses()])->render();
            return response()->json(['status'=>true,'courses'=>$html,'msg'=>'New course is added successfully!']);
        }else{
            $html=view('admin.course.partial.courses-partial',['courses'=>Course::courses()])->render();
            return response()->json(['status'=>false,'courses'=>$html,'msg'=>'New course is not added!']);
        }
    }

    public function edit($courseId)
    {
        return response()->json(['course'=>Course::courseById($courseId)]);
    }

    public function update(CourseReq $req)
    {

        $data=[
            'course_name'=>$req->name,
            'descriptive_name'=>$req->short,
        ];
        if (Course::edit($req->id,$data))
        {
            $html=view('admin.course.partial.courses-partial',['courses'=>Course::courses()])->render();
            return response()->json(['status'=>true,'courses'=>$html,'msg'=>'Course is updated successfully!']);
        }else{
            $html=view('admin.course.partial.courses-partial',['courses'=>Course::courses()])->render();
            return response()->json(['status'=>false,'courses'=>$html,'msg'=>'Course is not updated!']);
        }
    }

    public function remove($courseId)
    {

        if (Course::remove($courseId))
        {
            $html=view('admin.course.partial.courses-partial',['courses'=>Course::courses()])->render();
            return response()->json(['status'=>true,'courses'=>$html,'msg'=>'Course is deleted successfully!']);
        }else{
            $html=view('admin.course.partial.courses-partial',['courses'=>Course::courses()])->render();
            return response()->json(['status'=>false,'courses'=>$html,'msg'=>'Course is not deleted!']);
        }
    }


}
