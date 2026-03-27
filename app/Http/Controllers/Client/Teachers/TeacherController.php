<?php

namespace App\Http\Controllers\Client\Teachers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Teachers\TeacherRequest;
use App\Models\Admin\Customer;
use App\Models\Client\Teachers\Teacher;
use App\Models\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Admin\Course;
use App\Models\Admin\CourseClass;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function teachers()
    {
        $client=Helper::client();
        
        $teachers=Teacher::getAll($client->id);
        return view('client.teacher.teacher-list',['teachers'=>$teachers]);
    }
    
    public function add()
    {   
        $classes = DB::table('classes')
            ->leftJoin('courses', 'courses.course_id', '=', 'classes.course_id')
            ->get();
        return view('client.teacher.teacher-add',['classes'=>$classes]);
    }




    // public function addAssignSubjects(Request $req)
    // {
    //     $teacherId = $req->teacherId;
    //     $options = $req->option;

    //     // ======================================== code starts to add subjects data into customers table ===========================
    //             $classIds = DB::table('subjects')
    //         ->whereIn('subject_id', $options)
    //         ->select('classId')
    //         ->distinct()
    //         ->get();

    //     $courseIds = [];

    //     foreach ($classIds as $item) {
    //         $courseIds[] = $item->classId;
    //     }

    //     $class_ids = implode(', ', $courseIds);

    //     $data = [
    //         'classes_assigned' => $class_ids,
    //     ];

    //     if (!Teacher::edit($teacherId, $data)) {
    //         return back()->with('failure', 'Something went wrong! Please check.');
    //     }

    //     // ======================================== code ends to add subjects data into customers table ===========================


    //     $now = now();
    //     DB::table('classes_assigned_to_teachers')
    //         ->where('teacherId', $teacherId)
    //         ->delete();
    //     $insertResults = [];
    //     foreach ($options as $class_number) {
    //         $result = DB::insert('insert into classes_assigned_to_teachers (teacherId, class_number, created_at) values (?, ?, ?)', [$teacherId, $class_number, $now]);
    //         $insertResults[] = $result;
    //     }
    //     $allInsertionsSuccessful = !in_array(false, $insertResults);
    //     if ($allInsertionsSuccessful) {
    //         return back()->with('success', 'Subjects assigned successfully!');
    //     } else {
    //         return back()->with('failure', 'Something went wrong!');
    //     }
    // }


    public function addAssignSubjects(Request $req)
    {
//        dd($req->all());
        $teacherId = $req->teacherId;
        $options = $req->option;
    
    
    
        if (is_null($options)) {
            $data =['classes_assigned' => null];
            if (DB::table('classes_assigned_to_teachers')
            ->where('teacherId', $teacherId)
            ->delete()) {
                return back()->with('success', 'Subjects assigned successfully!');
            }
            Teacher::edit($teacherId, $data);
            return back()->with('success', 'Subjects assigned successfully!');
        }
    
        
    
        $classIds = DB::table('subjects')
            ->whereIn('subject_id', $options)
            ->select('classId')
            ->distinct()
            ->get()
            ->pluck('classId');
        $data = [
            'classes_assigned' => $classIds->implode(', '),
        ];
        Teacher::edit($teacherId, $data);
       
    //return $teacherId;
//       if (!Teacher::edit($teacherId, $data)) {
//         return back()->with('failure', 'Something went wrong! Please check.');
//        }
         
        DB::table('classes_assigned_to_teachers')
            ->where('teacherId', $teacherId)
            ->delete();
        $now = now();
        $insertResults = [];
        try {
            foreach ($options as $class_number) {
                DB::table('classes_assigned_to_teachers')
                    ->insert([
                        'teacherId' => $teacherId,
                        'class_number' => $class_number,
                        'created_at' => $now,
                    ]);
            }
            return back()->with('success', 'Subjects assigned successfully!');
        } catch (\Exception $e) {
            return back()->with('failure', 'Something went wrong!');
        }
    }


    public function save(TeacherRequest $req)
    {
        $photo=null;
        $logo=null;


        // dd($req);

        if ($req->hasFile('photo')) {
            $filename = 'teacher-' . uniqid(12) . time() . '.' . $req->file('photo')->getClientOriginalExtension();
            Storage::disk('photo')->putFileAs('/', $req->file('photo'), $filename);
            $photo = $filename;
        }
        $client=Session::get('client');
        $data=[
            'id'=>Helper::customerId(),
            'name'=>$req->name,
            'father_name'=>$req->fname,
            'parent_id'=>$client->id, 
            //'classes_assigned'=> implode(",", $req->option),
            'phone'=>$req->phone,
            'email'=>$req->username,
            'address'=>$req->address,
            'password'=>$req->password,
            'status'=>$req->has('status')?$req->status:0,
            'client_role'=>'Teacher',
            'photo'=>$photo,
            'created_at'=>Carbon::now(),
        ];

        if (Teacher::add($data))
        {
            return back()->with('success','New Teacher is added successfully!');
        }else{
            return back()->with('failure','New Teacher is  not added!');
        }
    }

    public function edit($teacherId)
    {
        $client=Session::get('client');
        return view('client.teacher.teacher-edit',['teacher'=>Teacher::teacherById($teacherId,$client->id)]);
    }


    public function assignSubjects($teacherId)
    {

        // $assignedSubjects = DB::table('subjects')
        // ->join('classes_assigned_to_teachers', 'subjects.subject_id', '=', 'classes_assigned_to_teachers.class_number')
        // ->join('classes', 'subjects.classId', '=', 'classes.class_id')
        // ->join('courses', 'subjects.courseId', '=', 'courses.course_id')
        // ->select('classes_assigned_to_teachers.class_number')
        // ->distinct()
        // ->get();


        $assignedSubjects =  DB::table('classes_assigned_to_teachers')
        ->where('classes_assigned_to_teachers.teacherId', $teacherId)
        ->get();
    
    $assignedSubjectsArray = [];
    
    foreach ($assignedSubjects as $item) {
        $assignedSubjectsArray[] = $item->class_number;
    }
    


        
        $data = DB::table('subjects')
        ->join('classes', 'subjects.classId', '=', 'classes.class_id')
        ->join('courses', 'subjects.courseId', '=', 'courses.course_id')
        ->select('classes.class_name', 'courses.descriptive_name','classes.class_id', 'courses.course_id')
        ->distinct()
        ->get();

    foreach ($data as $item) {
        $item->subjects = DB::table('subjects')
            ->where('classId', $item->class_id)
            ->where('courseId', $item->course_id)
            ->get();
    }

    return view('client.teacher.assignSubjects',['subjects'=>$data, 'assignedSubjectsArray'=>$assignedSubjectsArray, 'teacherId'=>$teacherId]);

    }



    public function update(TeacherRequest $req)
    {
        $photo=null;

        if ($req->hasFile('photo')) {
            $filename = 'teacher-' . uniqid(12) . time() . '.' . $req->file('photo')->getClientOriginalExtension();
            Storage::disk('photo')->putFileAs('/', $req->file('photo'), $filename);
            $photo = $filename;
            Helper::imageDelete($req->pic);
        }else{
            $photo=$req->pic;
        }
        $client=Session::get('client');
        $data=[
            'name'=>$req->name,
            'father_name'=>$req->fname,
            'phone'=>$req->phone,
            'email'=>$req->username,
            'address'=>$req->address,
            'password'=>$req->password,
            'status'=>$req->has('status')?$req->status:0,
            'client_role'=>'Teacher',
            'photo'=>$photo,
            //'created_at'=>Carbon::now(),
        ];

        if (Teacher::edit($req->id,$data))
        {
            return redirect()->route('client-teacher')->with('success','Teacher is updated successfully!');
        }else{
            return redirect()->route('client-teacher')->with('failure','Teacher is  not updated!');
        }
    }


    public function remove($teacherId)
    {
        if (Teacher::remover($teacherId))
        {
            return back()->with('success','Teacher is removed successfully!');
        }else{
            return back()->with('failure','New Teacher is  not removed!');
        }
    }


    public function logout()
    {
        Session::forget('client');
        return redirect()->route('client-login');
    }

    public function change()
    {
        return view('client.teacher.teacher-password');
    }
    public function password(Request $req)
    {
        $client=Helper::client();
        if ($client->password==$req->cpassword)
        {
            $data=['password'=>$req->npassword];
            if (Teacher::password($client->id,$data))
            {
                Session::put('client',Customer::customerById($client->id));
                return back()->with('success','Password is changed successfully!');
            }else{
                return back()->with('failure','Password is changed not removed!')->withInput($req->all());
            }
        }else{
           return back()->with('failure','Incorrect Current Password!')->withInput($req->all());
        }
    }

    public function profile()
    {
        $client=Helper::client();
        return view('client.teacher.teacher-profile',['customer'=>$client]);
    }
}
