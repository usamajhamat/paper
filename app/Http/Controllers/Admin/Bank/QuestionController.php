<?php

namespace App\Http\Controllers\Admin\Bank;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Question\Bank\QuestionReq;
use App\Models\Admin\Chapter;
use App\Models\Admin\Course;
use App\Models\Admin\CourseClass;
use App\Models\Admin\Question\Bank\extra\Assign;
use App\Models\Admin\Question\Bank\extra\Prerequisite;
use App\Models\Admin\Question\Bank\Question;
use App\Models\Admin\Subject;
use App\Models\Admin\Topic;
use App\Models\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    public function add()
    {
       return view('admin.question.question-add',
                      [
                          'courses'=>Course::courses(),
                          'mediums'=>Prerequisite::mediums(),
                      ]);
    }

    public function save(QuestionReq $req)
    {
        //return $req->all();
        if (in_array($req->type,Helper::types($req->type)) and $req->type!=null)
        {
            $data=null;
            if (in_array($req->type,Helper::questionTypes()))
            {

                $data=[
                    'course'=>$req->course,
                    'class'=>$req->class,
                    'subject'=>$req->subject,
                    'chapter'=>$req->chapter,
                    'topic'=>$req->topic,
                    'question_type'=>(Assign::getById($req->q_type))->typeId,
                    'priority'=>$req->priority,
                    'medium'=>$req->medium,
                    'question_english'=>$req->english,
                    'question_urdu'=>$req->urdu,
                    'question_board'=>$req->boards,
                ];
            }else if(in_array($req->type,Helper::booleanTypes()))
            {
                $data=[
                    'course'=>$req->course,
                    'class'=>$req->class,
                    'subject'=>$req->subject,
                    'chapter'=>$req->chapter,
                    'topic'=>$req->topic,
                    'question_type'=>(Assign::getById($req->q_type))->typeId,
                    'priority'=>$req->priority,
                    'medium'=>$req->medium,
                    'question_english'=>$req->english,
                    'question_urdu'=>$req->urdu,
                    'ans_english'=>$req->ans_eng,
                    'ans_urdu'=>$req->ans_urdu,
                    'question_board'=>$req->boards
                ];
            }else if(in_array($req->type,Helper::mcqTypes()))
            {
                $data=[
                    'course'=>$req->course,
                    'class'=>$req->class,
                    'subject'=>$req->subject,
                    'chapter'=>$req->chapter,
                    'topic'=>$req->topic,
                    'question_type'=>(Assign::getById($req->q_type))->typeId,
                    'priority'=>$req->priority,
                    'medium'=>$req->medium,
                    'question_english'=>$req->english,
                    'question_urdu'=>$req->urdu,
                    'eng_a'=>$req->eng_a,
                    'eng_b'=>$req->eng_b,
                    'eng_c'=>$req->eng_c,
                    'eng_d'=>$req->eng_d,
                    'urdu_a'=>$req->ur_a,
                    'urdu_b'=>$req->ur_b,
                    'urdu_c'=>$req->ur_c,
                    'urdu_d'=>$req->ur_d,
                    'answer'=>$req->answer,
//                    'ans_english'=>$req->ans_eng,
//                    'ans_urdu'=>$req->ans_urdu,
                    'question_board'=>$req->boards
                ];
            }
            if (Question::add($data))
            {
                return response()->json(['status'=>true,'message'=>'Question is saved successfully']);
            }else{
                return response()->json(['status'=>false,'message'=>'Please Try Again! question is not saved successfully']);
            }
        }else{
            return response()->json(['status'=>false,'message'=>'Please Try Again! question is not saved successfully']);
        }
    }

    public function searchQuestion()
    {
        return view('admin.question.question-search',
            [
                'courses'=>Course::courses(),
                'mediums'=>Prerequisite::mediums(),
            ]);
    }

    public function search(Request $req)
    {
        //Save to Session Search Criteria
        Session::put('qs',$req->all());
       return $this->showQuestion($req);

    }

    public function remove($questionId)
    {
        // Getting Previous Searched Criteria
        $req=new Request(Session::get('qs'));
       if (Question::remove($questionId))
       {
           return $this->showQuestion($req);
       }else{
           return $this->showQuestion($req);
       }
    }
    public function edit($questionId)
    {
        $question=Question::questionById($questionId);
        $medium=Prerequisite::mediumById($question->medium);
        $questionType=Prerequisite::typeById($question->question_type);
        $html=view('admin.question.question-partial.question-edit-partial',
            [
                'type'=>$questionType->short_key,
                'lang'=>$medium->medium_name,
                'title'=>$questionType->title,
               // 'types'=>Helper::questionTypes(),
                'types'=>Helper::types($questionType->short_key),
                'question'=>Question::questionById($questionId),
            ]
        )->render();

        return response()->json(['data'=>$html]);

    }

    public function update(Request $req)
    {
         //return $req->all();
        // Getting Previous Searched Criteria
        $searched=new Request(Session::get('qs'));
        $data=null;
        if ($req->type!='boolean1' and $req->type!='blank' and $req->type!='mcq')
        {
            $data=[
                    'question_english'=>$req->english,
                     'question_urdu'=>$req->urdu,
                     'question_board'=>$req->boards
                  ];
        }
//        else if($req->type=='boolean1' or $req->type=='blank')
//        {
//            $data=[
//                'question_english'=>$req->english,
//                'question_urdu'=>$req->urdu,
//                'ans_english'=>$req->ans_eng,
//                'ans_urdu'=>$req->ans_urdu,
//                'question_board'=>$req->boards
//            ];
//        }
        else if(in_array($req->type,Helper::booleanTypes()))
        {
            $data=[
                'question_english'=>$req->english,
                'question_urdu'=>$req->urdu,
                'ans_english'=>$req->ans_eng,
                'ans_urdu'=>$req->ans_urdu,
                'question_board'=>$req->boards
            ];
        }
        else if(in_array($req->type,Helper::mcqTypes()))
        {
            $data=[
                'question_english'=>$req->english,
                'question_urdu'=>$req->urdu,
                'eng_a'=>$req->eng_a,
                'eng_b'=>$req->eng_b,
                'eng_c'=>$req->eng_c,
                'eng_d'=>$req->eng_d,
                'urdu_a'=>$req->ur_a,
                'urdu_b'=>$req->ur_b,
                'urdu_c'=>$req->ur_c,
                'urdu_d'=>$req->ur_d,
//                'ans_english'=>$req->ans_eng,
//                'ans_urdu'=>$req->ans_urdu,
                'answer'=>$req->answer,
                'question_board'=>$req->boards
            ];
        }

        if (Question::edit($req->id,$data))
        {
            return $this->showQuestion($searched);
        }else{
            return $this->showQuestion($searched);
        }
    }

    private function showQuestion(Request $req)
    {
        $course=$req->course;
        $class=$req->class;
        $subject=$req->subject;
        $chapter=$req->chapter;
        $topic=$req->topic;
        $question_type=(Assign::getById($req->q_type))->typeId;
        $priority=$req->priority;
        $medium=$req->medium;
        $questions=null;
        $searchBy=null;
        if ($topic!=null)
        {
            $questions=Question::search($course,$class,$subject,$chapter,$topic,$question_type,$priority,$medium);
            $searchBy='all';
        }else{
            $questions=Question::searchByChapter($course,$class,$subject,$chapter,$topic,$question_type,$priority,$medium);
            $searchBy='chapter';
        }
        $html=view('admin.question.question-partial.question_search_partial',
            [
                'questions'=>$questions,
                'search'=>$searchBy,
                'medium'=>$medium!=0?(Prerequisite::mediumById($medium))->medium_name:'all',
                'type'=>(Prerequisite::typeById($question_type))->short_key
            ]
        )->render();

        return response()->json($html);
    }


    private function testEdit($questionId)
    {
        $req=Question::questionById($questionId);
        $courses=Course::courses();
        $classes=CourseClass::classesById($req->course);
        $subject=Subject::byClass($req->class);
        $chapter=Chapter::chaptersBySub($req->subject);
        $topic=Topic::topicByChapter($req->chapter);
        $question_type=Assign::QTbyChapter($req->chapter);
        $priorities=Assign::priorityByChapter($req->chapter);
        $medium=Prerequisite::mediums();
        $data=[
            'question'=>$req, 'courses'=>$courses, 'classes'=>$classes,
            'subjects'=>$subject, 'chapters'=>$chapter, 'topics'=>$topic,
            'types'=>$question_type, 'priorities'=>$priorities,'mediums'=>$medium
        ];
        $html=view('admin.question.question-partial.question-edit-partial',$data)->render();
        return response()->json(['data'=>$html]);
    }

}
