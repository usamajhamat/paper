<?php

namespace App\Http\Controllers\Client\Generate\Paper;

use App\Http\Controllers\Controller;
use App\Models\Admin\Course;
use App\Models\Admin\CourseClass;
use App\Models\Admin\Subject;
use App\Models\Client\Teachers\Teacher;
use App\Models\Admin\Topic;
use App\Models\Client\Papers\Paper;
use App\Models\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;
use Illuminate\Support\Facades\DB;


class SavedPaperController extends Controller
{
    public function papers(Request $request)
    {
        $subject=Subject::get(['subject_name', 'subject_id']);
         $data = json_decode($subject, true);

// Extracting only subject names
 $subjectNames = $data;
 $json = json_encode($subjectNames);
 $client=Helper::client();
        
        $teachers=Teacher::getAll($client->id);

//  dd($teachers);
// Outputting the result

       
        // return $request->input();
        if($request->date){
            $client=Helper::client();
            $papers = [];
            $papers=$client->client_role=='Administrator'?Paper::school($client->id, $request->date):Paper::teacher($client->id,$client->parent_id, $request->date);

            return view('client.paper.saved-paper',['papers'=>$papers,'role'=>$client->client_role,'courses'=>Course::courses(), 'date'=>$request->date,'teachers'=>$teachers]);
        
        }elseif($request->subject)
        {
            // return $request->subject;
            $client=Helper::client();
            $papers = [];
            $papers=$client->client_role=='Administrator'?Paper::school($client->id, $request->subject):Paper::teacher($client->id,$client->parent_id, $request->subject);
            return view('client.paper.saved-paper',['papers'=>$papers,'role'=>$client->client_role,'courses'=>Course::courses(), 'date'=>$request->subject,'teachers'=>$teachers]);
        
        }

        $client=Helper::client();
        $papers = [];
        $papers=$client->client_role=='Administrator'?Paper::school($client->id, $request->date):Paper::teacher($client->id,$client->parent_id, $request->date);
        
        return view('client.paper.saved-paper',['papers'=>$papers,'role'=>$client->client_role,'courses'=>Course::courses(), 'date'=>$request->date,'subjectNames'=>$subjectNames,'teachers'=>$teachers]);
    
    }
    
    public function papers_date(Request $request)
    {
         $subject=Subject::get(['subject_name', 'subject_id']);
        $data = json_decode($subject, true);

// Extracting only subject names
 $subjectNames = $data;
$json = json_encode($subjectNames);
         $client=Helper::client();
        
        $teachers=Teacher::getAll($client->id);
        if($request->teachers){
                $client=Helper::client();
                if($client->client_role=="Administrator"){
                    $teacherId=$request->teachers;
                                    $papers=Paper::where('teacher',$request->teachers)->get();
                                    $papers=DB::table('papers as p')
                   ->join('courses as c','p.courseId','=','c.course_id')
                   ->join('classes as cl','p.classId','=','cl.class_id')
                   ->join('subjects as s','p.subjectId','=','s.subject_id')
                   ->join('customers as cus','p.teacher','=','cus.id')
                   ->where(['teacher'=>$teacherId])
                   ->orderBy('p.paper_at', 'desc')
                   ->get(['p.*','c.course_name','cl.class_name','s.subject_name','cus.name']);
                
                }else{
                   $teacherId=$client->id;
                                     $papers=Paper::where('teacher',$request->teachers)->get();
                                    $papers=DB::table('papers as p')
                   ->join('courses as c','p.courseId','=','c.course_id')
                   ->join('classes as cl','p.classId','=','cl.class_id')
                   ->join('subjects as s','p.subjectId','=','s.subject_id')
                   ->join('customers as cus','p.teacher','=','cus.id')
                   ->where(['teacher'=>$teacherId])
                   ->orderBy('p.paper_at', 'desc')
                   ->get(['p.*','c.course_name','cl.class_name','s.subject_name','cus.name']);
                    
                }
          
            // $papers=$client->client_role=='Administrator'?Paper::school_s($client->id, $request->subject):Paper::teacher($request->teachers,$client->parent_id, $request->subject);
            return view('client.paper.saved-paper',['papers'=>$papers,'role'=>$client->client_role,'courses'=>Course::courses(), 'date'=>$request->date,'subjectNames'=>$subjectNames,'teachers'=>$teachers]);
            
        }
        // return $request->input();
        elseif($request->subject == null && $request->date != null){
            
            $client=Helper::client();
            $papers = [];
            $papers=$client->client_role=='Administrator'?Paper::school($client->id, $request->date  ):Paper::teacher($client->id,$client->parent_id, $request->date);
    
             return view('client.paper.saved-paper',['papers'=>$papers,'role'=>$client->client_role,'courses'=>Course::courses(), 'date'=>$request->date,'subjectNames'=>$subjectNames,'teachers'=>$teachers]);
   
        }elseif($request->subject != null && $request->date == null)
        {
            // return $request->subject;
            $client=Helper::client();
            $papers = [];
            $papers=$client->client_role=='Administrator'?Paper::school_s($client->id, $request->subject):Paper::teacher($client->id,$client->parent_id, $request->subject);
            return view('client.paper.saved-paper',['papers'=>$papers,'role'=>$client->client_role,'courses'=>Course::courses(), 'date'=>$request->date,'subjectNames'=>$subjectNames,'teachers'=>$teachers]);
    
        }
        elseif($request->subject != null && $request->date != null)
        {
            // return $request->subject;
            $client=Helper::client();
            $papers = [];
            $papers=$client->client_role=='Administrator'?Paper::school_sd($client->id, $request->date,$request->subject):Paper::teacher($client->id,$client->parent_id, $request->subject);
            return view('client.paper.saved-paper',['papers'=>$papers,'role'=>$client->client_role,'courses'=>Course::courses(), 'date'=>$request->date,'subjectNames'=>$subjectNames,'teachers'=>$teachers]);
    
        }

        $client=Helper::client();
        $papers = [];
        $papers=$client->client_role=='Administrator'?Paper::school($client->id, $request->date):Paper::teacher($client->id,$client->parent_id, $request->date);
        
         return view('client.paper.saved-paper',['papers'=>$papers,'role'=>$client->client_role,'courses'=>Course::courses(), 'date'=>$request->date,'subjectNames'=>$subjectNames,'teachers'=>$teachers]);
   
    }

    // public function Searchpapers(Request $request)
    // {
    //     return $request->input();
    //     $client=Helper::client();
    //     $papers = [];
    //     $papers=$client->client_role=='Administrator'?Paper::school($client->id, $request->date):Paper::teacher($client->id,$client->parent_id, $request->date);
        
    //     return view('client.paper.saved-paper',['papers'=>$papers,'role'=>$client->client_role,'courses'=>Course::courses(), 'date'=>$request->date]);
    // }
    private function looking($papers,$role)
    {
       return view('client.paper.partial.search-partial',['papers'=>$papers,'role'=>$role])->render();
    }


    public function print($paperId)
    {

        // dd(Paper::getById($paperId));
        $paper=Paper::getById($paperId);
        $chapterIds=unserialize($paper->chapters);
        $chapters = DB::table('chapters')
            ->whereIn('chapter_id', $chapterIds)
            ->pluck('chapter_name');


        return view('client.paper.print-paper',
                         [
                             'paper'=>Paper::getById($paperId),
                             'school'=>$school=Session::get('school'),
                             'chapters'=>$chapters,
                         ]);
    }


    public function save(Request $request)
    {
        $client=Helper::client();
        $school=$client->parent_id!=null?$client->parent_id:$client->id;
        $req=new Request(Session::get('generate128'));
        $chapters=$req->chapters;
        $topic=(Topic::topicByChapter($chapters[0]))->first();

        $data=[
               'paperId'=>Helper::paperId(),
               'courseId'=>$topic->t_course,
               'classId'=>$topic->t_class,
               'subjectId'=>$topic->t_subject,
               'teacher'=>$client->id,
               'school'=>$school,
               'chapters'=>serialize($chapters),
               'topics'=>serialize($req->topics),
               'paper_name'=>$request->name,
               'marks'=>$request->marks,
               'time'=>$request->allowed,
               'schedule_date'=>$request->sd,
               'paper'=>$request->paperHtml,
               'answers'=>$request->answerHtml,
        ];
        //return $data;


        if (Paper::add($data))
        {
            return redirect()->route('client-home')->with('success','new paper is saved successfully!');
        }

    }

    public function edit(Request $request)
    {
        $client=Helper::client();
        $school=$client->parent_id!=null?$client->parent_id:$client->id;
        $req=new Request(Session::get('generate128'));
        $chapters=$req->chapters;
        $topic=(Topic::topicByChapter($chapters[0]))->first();

        $data=[
            //'paperId'=>Helper::paperId(),
            'courseId'=>$topic->t_course,
            'classId'=>$topic->t_class,
            'subjectId'=>$topic->t_subject,
            'teacher'=>$client->id,
            'school'=>$school,
            'chapters'=>serialize($chapters),
            'topics'=>serialize($req->topics),
            'paper_name'=>$request->name,
            'marks'=>$request->marks,
            'time'=>$request->allowed,
            'schedule_date'=>$request->sd,
            'paper'=>$request->paperHtml,
            'answers'=>$request->answerHtml,
        ];
       // return $data;
        //return $data;

        if (Paper::edit($request->id,$data))
        {
            Helper::removeSession();
            return redirect()->route('client-home')->with('success','Paper is updated successfully!');
        }
    }

    public function remove($paperId)
    {
        if (Paper::remove($paperId))
        {
            return redirect()->route('saved-papers')->with('success','paper is removed successfully!');
        }else{
            return redirect()->route('saved-papers')->with('failure','paper is not removed!');
        }
    }

    public function show($paperId)
    {
        return response()->json(Paper::show($paperId));
    }

    public function bubbles(Request $request){
        $array = [];
        for($i=1; $i<= $request->count; $i++){
            array_push($array, $i); 
        }
      return view('bubbles', compact('array'))->render();   
    }

}
