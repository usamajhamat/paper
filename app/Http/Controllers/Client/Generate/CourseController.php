<?php

namespace App\Http\Controllers\Client\Generate;

use App\Http\Controllers\Controller;
use App\Models\Admin\Chapter;
use App\Models\Admin\Course;
use App\Models\Admin\CourseClass;
use App\Models\Admin\Subject;
use Illuminate\Http\Request;
use App\Models\Helper;
use DB;
class CourseController extends Controller
{


    public function courses()
    {
   
        $client = Helper::client();
        $classes = DB::table('classes')
            ->whereIn('class_id', explode(',', $client->classes_assigned))
            ->get();
         //   return $client;
        $courseIds = $classes->pluck('course_id')->toArray();
            if ($client->client_role === 'Teacher') {
                $courses = Course::whereIn('course_id', $courseIds)->get();
                
            } else {
                $courses = Course::all();
            }
            
            return view('client.generate.courses-list', ['courses' => $courses]);
        
    }
    



    public function classes(Request $req)
    {



        $client = Helper::client();
        $classes = DB::table('classes')
            ->whereIn('class_id', explode(',', $client->classes_assigned))
            ->get();
        $classIds = $classes->pluck('class_id')->toArray();
            if ($client->client_role === 'Teacher') {
                $Getclasses = CourseClass::AssignedCourse($classIds,$req->id);
            } else {
                $Getclasses = CourseClass::classesById($req->id);
            }

        $view=view('client.generate.classes',['classes'=>$Getclasses])->render();
        return response()->json($view);
    }






    public function subjects(Request $req)
    {
        $client = Helper::client();
        $teacherId = Helper::client()->id;
        $classes = DB::table('classes')
            ->whereIn('class_id', explode(',', $client->classes_assigned))
            ->get();
        $classIds = $classes->pluck('class_id')->toArray();
            if ($client->client_role === 'Teacher') {
                // $Getclass = CourseClass::AssignedClass($classIds);

                $Getclass = CourseClass::getClass($req->id);
                $GetSubjects = Subject::fetchSubjectByAssignedSubjectstoTeachers($teacherId, $req->id);
            } else {
                $Getclass = CourseClass::getClass($req->id);
                $GetSubjects = Subject::byClass($req->id);
            }
        $view=view('client.generate.subjects',
                         [
                            'subjects'=> $GetSubjects,
                             'class'=> $Getclass,
                         ])->render();
        return response()->json($view);
    }




    public function chapters(Request $req)
    {
         Helper::removeSession();
        $view=view('client.generate.chapters',
                       [
                           'chapters'=>Chapter::chaptersBySub($req->id),
                       ]
               )->render();
        return response()->json($view);
    }
}
