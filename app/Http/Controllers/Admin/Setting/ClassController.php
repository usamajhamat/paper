<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClassReq;
use App\Models\Admin\Course;
use App\Models\Admin\CourseClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function classes()
    {
        return view('admin.classes.classes-list',
                     [
                         'courses'=>Course::courses(),
                         'classes'=>CourseClass::classes(),
                     ]
                );
    }

    public function save(ClassReq $req)
    {

        $data=[
            'course_id'=>$req->course,
            'class_name'=>$req->class,
            'class_number'=>$req->num,
        ];
        if (CourseClass::add($data))
        {
            $html=view('admin.classes.partial.classes-partial',['classes'=>CourseClass::classes()])->render();
            return response()->json(['status'=>true,'classes'=>$html,'msg'=>'New class is added successfully!']);
        }else{
            $html=view('admin.classes.partial.classes-partial',['classes'=>CourseClass::classes()])->render();
            return response()->json(['status'=>false,'classes'=>$html,'msg'=>'New class is not added!']);
        }
    }

    public function getClasses($courseId)
    {
        $html=$this->myClasses($courseId);
        return response()->json(['status'=>true,'classes'=>$html]);
    }

    public function edit($classId)
    {
        $html=view('admin.classes.partial.edit-partial',
               [
                'class'=>CourseClass::getClass($classId),
                'courses'=>Course::courses(),
               ]
            )->render();
        return response()->json(['status'=>true,'class'=>$html]);
    }

    public function update(ClassReq $req)
    {

        $data=[
            'course_id'=>$req->course,
            'class_name'=>$req->class,
            'class_number'=>$req->num,
        ];
        $cls=CourseClass::getClass($req->id);
        if (CourseClass::edit($req->id,$data))
        {
            $html=view('admin.classes.partial.classes-partial',
                       [
                          'classes'=>CourseClass::classesById($cls->course_id)
                       ]
                      )->render();

            return response()->json(['status'=>true,'classes'=>$html,'msg'=>'Class is updated successfully!']);

        }else{
            $html=view('admin.classes.partial.classes-partial',
                [
                    'classes'=>CourseClass::classesById($cls->course_id)
                ]
            )->render();
            return response()->json(['status'=>false,'classes'=>$html,'msg'=>'Class is not updated!']);
        }
    }

    public function remove($id)
    {


        $cls=CourseClass::getClass($id);
        if (CourseClass::remove($id))
        {

            $html=$this->myClasses($cls->course_id);
            return response()->json(['status'=>true,'classes'=>$html,'msg'=>'Class is removed successfully!']);

        }else{
            $html=$this->myClasses($cls->course_id);
            return response()->json(['status'=>false,'classes'=>$html,'msg'=>'Class is not removed!']);
        }
    }

    public function courseClasses($courseId)
    {
        return response()->json(['status'=>true,'classes'=>CourseClass::classesById($courseId)]);
    }


    private function myClasses($courseId)
    {
        $html=view('admin.classes.partial.classes-partial',
            [
                'classes'=>CourseClass::classesById($courseId)
            ]
        )->render();
        return $html;
    }
}
