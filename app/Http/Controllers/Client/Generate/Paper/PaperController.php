<?php

namespace App\Http\Controllers\Client\Generate\Paper;

use App\Http\Controllers\Controller;
use App\Models\Admin\Chapter;
use App\Models\Admin\Course;
use App\Models\Admin\CourseClass;
use App\Models\Admin\Customer;
use App\Models\Admin\Question\Bank\extra\Assign;
use App\Models\Admin\Question\Bank\extra\Prerequisite;
use App\Models\Admin\Question\Bank\Question;
use App\Models\Admin\Subject;
use App\Models\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcher;
use DB;

class PaperController extends Controller
{
    public function index()
    {
       // return  htmlspecialchars(Session::get('edit00-paper')->paper);
        // get data of selected chapters and topics
        $request = new Request(Session::get('generate128'));
        $chapter = Chapter::chaptersById($request->chapters[0]);
        $school = Session::get('school');
        $client=Helper::client();
        $medium = DB::table('questions')
            ->where('subject', $chapter->subject)
            ->select('medium')
            ->distinct()->get();
        $selectedMedium = 0;
        if(count( $medium) ){
            $selectedMedium =  $medium[0]->medium;

        }
        return view('client.generate.paper.layout',
            [
                'mediums' => Prerequisite::mediums(),
                'assign_priority' => $this->priority($request->chapters),
                'priorities' => Prerequisite::priorities(),
                'chapters' => $request->chapters,
                'subject' => Subject::getSubject($chapter->subject),
                'course' => Course::courseById($chapter->course),
                'class' => CourseClass::classesById($chapter->class),
                'class1' => CourseClass::getClass($chapter->class),
                'assign_types' => $this->uniqueTypes($request->chapters),
                'types' => Prerequisite::questionTypes(),
                'school' => $school,
                'role'=>$client->client_role,
                 'selectedMedium' => $selectedMedium
            ]);
    }


    // Filter Unique Priorities Of All Selected Chapters
    private function priority($chapter)
    {
        $priorities = array();
        foreach ($chapter as $chapterId) {
            foreach (Assign::priorityByChapter($chapterId) as $item) {
                $priorities[] = $item->priority_id;

            }
        }
        return array_unique($priorities);
    }

    // Filter Unique Questions Types Id Of All Selected Chapters
    private function uniqueTypes($chapter)
    {
        $priorities = array();
        foreach ($chapter as $chapterId) {
            foreach (Assign::QTbyChapter($chapterId) as $item) {
                $priorities[] = $item->typeId;
            }
        }
        return array_unique($priorities);
    }

    /////////// Submit Generate Questions Form ////////////////////

    public function generate(Request $req)  // Display Searched Questions
    {
        
        Session::put('form', $req->all());  // Create Session of Searched Form;

        Session::put('q_id', []);  // Create Session for question ids to be generated;
        $qt = $this->questions($req);
        $questions = view('client.generate.paper.question.question-partial',
            [
                'questions' => $qt,
                'medium' => Prerequisite::mediumById($req->medium),
                'type' => (Prerequisite::typeById($req->type))->short_key,
                'board' => $req->boards,
                'lines' => isset($req->lines)?$req->lines:1
            ])->render();

        return response()->json([
                      'html' => $questions,
                      'total' =>  count(Session::get('q_id')),
                      'generated' =>count($qt),
                      'form'=>$req->form
        ]);

    }

    private function questions(Request $req) // retrieve all questions by search criteria
    {
        $request = new Request(Session::get('generate128')); //Get Request

        $chapters = $req->ch;
        $priorities = $req->priority;
        $type = $req->priority;                  //Question Type
        $questions = array();
        foreach ($chapters as $chapter)          // Loop Search Chapters
        {
            foreach ($request->topics as $topic)  // Get Id's Of Topics And Chapters
            {
                $filter = explode(',', $topic);   // explode to separate chapter & topic id
                $chapterId = $filter[0];
                $topicId = $filter[1];
                if ($chapter == $chapterId) {
                    foreach ($priorities as $p) {
                        $searched = Question::filterQuestion($chapterId, $topicId, $req->type, $p, $req->medium);
                        if (count($searched) > 0) {
                            $questions[] = $searched;
                        }
                    }
                }
            }
        }
        return Arr::collapse($questions);
    }

    public function randomQuestion()
    {
        $request = new Request(Session::get('form')); //Get Searched Question Form Request
        
        $required = $request->total_question;             // Get Required Questions

        $questions = $this->questions($request);
        $randomQuestions = array();
        if (count($questions) > $required)              // check if questions are greater than required questions
        {
            $randomQuestions = Arr::random($questions, $required);    // get random questions
        } else {
            $randomQuestions = $questions;                            // return All Questions
        }
        $this->randomId($randomQuestions);                     // Push id os randomly selected question into session
        //return $randomQuestions;

        $random = view('client.generate.paper.question.added-partial',   //Display Randomly selected question
            [
                'questions' => $randomQuestions,
                'medium' => Prerequisite::mediumById($request->medium),
                'type' => (Prerequisite::typeById($request->type))->short_key,
                'lines' => isset($request->lines)?$request->lines:1

            ])->render();


        $html = view('client.generate.paper.question.selected-partial',        // Active questions which are selected randomly
            [
                'questions' => $questions,
                'random' => Session::get('q_id'),
                'medium' => Prerequisite::mediumById($request->medium),
                'type' => (Prerequisite::typeById($request->type))->short_key,
                'board' => $request->boards,

            ])->render();

        return response()->json([
                       'random' => $random,
                       'questions' => $html,
                       'total' =>count($randomQuestions),
                       'generated' =>count($questions),
                       'form'=>$request->form]);

    }

    private function randomId($questions)       // get questions Id Selected Randomly
    {
        $ids = array();
        Session::put('q_id', []);
        foreach ($questions as $question) {
            $questionId = $question->q_id;
            Session::push('q_id', $questionId);   // push into session of selected question
            $ids[] = $questionId;
        }

        return $ids;
    }


    public function selectQuestion(Request $req)   //
    {
        Session::push('q_id', $req->questionId);

        $request = new Request(Session::get('form')); //Get Searched Question Form Request
       // dd($request->all());
        $questions = $this->questions($request);

        $random = view('client.generate.paper.question.added-partial',   //Display Randomly selected question
            [
                'questions' => $this->filterById(),
                'medium' => Prerequisite::mediumById($request->medium),
                'type' => (Prerequisite::typeById($request->type))->short_key,
                'lines' => isset($request->lines)?$request->lines:1

            ])->render();

        $html = view('client.generate.paper.question.selected-partial',        // Active questions which are selected randomly
            [
                'questions' => $questions,
                'random' => Session::get('q_id'),
                'medium' => Prerequisite::mediumById($request->medium),
                'type' => (Prerequisite::typeById($request->type))->short_key,
                'board' => $request->boards,
            ])->render();
        return response()->json(['random' => $random,'form'=>$request->form, 'questions' => $html, 'total' => count(Session::get('q_id'))]);
    }

    public function removeQuestion(Request $req)   //
    {
        $this->remove($req->questionId);
        // return  Session::get('q_id');
        $request = new Request(Session::get('form')); //Get Searched Question Form Request
        $questions = $this->questions($request);

        $random = view('client.generate.paper.question.added-partial',   //Display Randomly selected question
            [
                'questions' => $this->filterById(),
                'medium' => Prerequisite::mediumById($request->medium),
                'type' => (Prerequisite::typeById($request->type))->short_key,
                'lines' => isset($request->lines)?$request->lines:1

            ])->render();

        $html = view('client.generate.paper.question.selected-partial',        // Active questions which are selected randomly
            [
                'questions' => $questions,
                'random' => Session::get('q_id'),
                'medium' => Prerequisite::mediumById($request->medium),
                'type' => (Prerequisite::typeById($request->type))->short_key,
                'board' => $request->boards,
                'lines' => isset($request->lines)?$request->lines:1
            ])->render();
        return response()->json(['random' => $random,'form'=>$request->form, 'questions' => $html, 'total' => count(Session::get('q_id'))]);
    }

    private function remove($questionId)
    {
       $array= Session::get('q_id');
       unset($array[array_search($questionId, $array)]);
       Session::forget('q_id');
       Session::put('q_id',$array);
      // return Session::get('q_id');

    }

    private function displaySelected(Request $request)
    {
        $questions = $this->questions($request);
        $random = view('client.generate.paper.question.question-partial',   //Display Randomly selected question
            [
                'questions' => $this->filterById(),
                'medium' => Prerequisite::mediumById($request->medium),
            ])->render();

        $html = view('client.generate.paper.question.selected-partial',        // Active questions which are selected randomly
            [
                'questions' => $questions,
                'random' => Session::get('q_id'),
                'medium' => Prerequisite::mediumById($request->medium),
            ])->render();

        return response()->json(['random' => $random,'form'=>$request->form, 'questions' => $html, 'total' => count(Session::get('q_id'))]);

    }

    private function filterById()
    {
        $ids =Session::get('q_id');    // get all ids of selected question
        $questions = array();
        foreach ($ids as $id)          // loop selected questions id
        {
            $questions[] = Question::filterById($id);
        }
        return Arr::collapse($questions);
    }

    private function gt()
    {
        $ids = Session::get('q_id');    // get all ids of selected question
        return $ids;
    }

    /////////////////////////////Add Generated Question ///////////////////////////

    public function addQuestion(Request $req)
    {
       
        $selected = Session::get('q_id');          // get ids of selected questions
        $form = new Request(Session::get('form')); //Get Searched Question Form Request
        $medium = Prerequisite::mediumById($form->medium);
        $questions=$this->filterById();
        $short_key=(Prerequisite::typeById($form->type))->short_key;
        
        $html = view('client.generate.paper.make.generate-paper',
            [
                'questionsId' => $selected,
                'questions' => $questions,
                'medium' => $medium->medium_name,
                'type' =>$short_key,
                'typeId' => $form->type,
                'blank' => $form->blank,
                'ignored' => $form->ignored,
                'chapters' => $form->ch,
                'priorities' => $form->priority,
                'mark' => $form->mark,
                'total_questions' => $form->total_question,
//                'qn' => $req->q_number,  old
                'qn' =>$form->form!='edit'?$req->q_number:$form->cq_number,
                'mediumId' => $medium->medium_id,
                'qt'=>Prerequisite::typeById($form->type),
                'lines' => isset($form->lines)?$form->lines:1
            ]
        )->render();
        $keys=$this->answerKeys($questions,$short_key,$medium);  // answer keys

        return response()->json(['html' => $html,'form'=>$form->form,'panel'=>$form->panel,'qn'=>$form->q_number,'keys'=>$keys]);
    }

    //////////////////////Edit Questions ///////////////

    public function edit(Request $req)
    {
        //return $req->questionsId;
        Session::forget('q_id');
        Session::put('q_id',$req->questionsId);
        Session::put('form',$req->all());
        $request = new Request(Session::get('generate128'));
        $chapter = Chapter::chaptersById($request->chapters[0]);
        $questions = $this->questions($req);
        //$school = Session::get('school');

        $question= view('client.generate.paper.question.selected-partial',        // Active questions which are selected randomly
            [
                'questions' => $questions,
                'random' =>$req->questionsId,
                'medium' => Prerequisite::mediumById($req->medium),
                'type' => (Prerequisite::typeById($req->type))->short_key,
                'board' => $request->boards,
                'lines' => isset($request->lines)?$request->lines:1

            ])->render();

        $select= view('client.generate.paper.question.added-partial',   //Display  selected question
            [
                'questions' => $this->filterById1($req->questionsId),
                'medium' => Prerequisite::mediumById($req->medium),
                'type' => (Prerequisite::typeById($req->type))->short_key,
                //'board' => $request->boards,
                'lines' => isset($request->lines)?$request->lines:1
            ])->render();

        $html= view('client.generate.paper.edit.modal-parital',
            [
                'mediums' => Prerequisite::mediums(),
                'assign_priority' => $this->priority($request->chapters),
                'priorities' => Prerequisite::priorities(),
                'chapters' => $request->chapters,
                'subject' => Subject::getSubject($chapter->subject),
                'course' => Course::courseById($chapter->course),
                'class' => CourseClass::classesById($chapter->class),
                'assign_types' => $this->uniqueTypes($request->chapters),
                'types' => Prerequisite::questionTypes(),
                // These are from Edit Questions
                'type1' => $req->type,
                'medium1' => $req->medium,
                'blank' => $req->blank,
                'ignore' => $req->ignored,
                'marks' => $req->mark,
                'required' => $req->total_question,
                //'priority' => explode(",", $req->priority),
                'priority' =>$req->priority,
                //'ch1' => explode(",", $req->ch),
                'ch1' =>$req->ch,
                'panel' =>$req->panel,
                'cq' =>$req->cq_number,
                /////////////////////////
                'question'=>$question,
                'selected'=>$select,
                'lines' => isset($request->lines)?$request->lines:1
            ])->render();

       return response()->json(
           [
                          'html'=>$html,
                          'total' => count(Session::get('q_id')),
                          'required'=>$req->total_question,
                          'generated'=>count($questions),
                          'question'=>$question,
                'selected'=>$select,
           ]);
    }

    private function filterById1($ids)
    {
        $questions = array();
        foreach ($ids as $id)          // loop selected questions id
        {
            $questions[] = Question::filterById($id);
        }
        return Arr::collapse($questions);
    }

    ///////////Cancel Paper ///////////////////

    public function cancel()
    {
        // Remove All Paper Generation Sessions
        Helper::removeSession();
    }

    public function answerKeys($questions,$type,$medium)
    {
          if (in_array($type,Helper::mcqTypes()))
          {
             $keys=view('client.generate.paper.answer.keys',['questions'=>$questions,'medium'=>$medium,'type'=>$type])->render();
             return ['type'=>'mcq','keys'=>$keys];
          }
          else if (in_array($type,['blank']))
          {
              $keys=view('client.generate.paper.answer.keys',['questions'=>$questions,'medium'=>$medium,'type'=>$type])->render();
              return ['type'=>'blank','keys'=>$keys];
          }
          else if (in_array($type,['boolean1']))
          {
              $keys=view('client.generate.paper.answer.keys',['questions'=>$questions,'medium'=>$medium,'type'=>$type])->render();
              return ['type'=>'bol','keys'=>$keys];
          }
          return ['type'=>'','keys'=>''];
    }

}
