<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TopicReq;
use App\Models\Admin\Chapter;
use App\Models\Admin\Course;
use App\Models\Admin\CourseClass;
use App\Models\Admin\Subject;
use App\Models\Admin\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function topicList()
    {

        return view('admin.topic.topic-list',
            [
                'courses'=>Course::courses()
            ]
        );
    }

    public function add()
    {
        return view('admin.topic.topic-add',
            [
                'courses'=>Course::courses()
            ]
        );
    }

    public function save(TopicReq $req)
    {
        $data=[
            't_course'=>$req->course,
            't_class'=>$req->class,
            't_subject'=>$req->subject,
            't_chapter'=>$req->chapter,
            'topic_name'=>$req->topic,
            'topic_number'=>$req->number,
        ];
        try
        {
            if (Topic::add($data))
            {
                return response()->json(['status'=>true,'msg'=>'New Topic is added successfully!']);
            }else{
                return response()->json(['status'=>false,'msg'=>'New Topic is not added!']);
            }
        }catch (\Exception $exception)
        {
            return $exception->getMessage();
        }

    }

    public function getTopics(Request $req)
    {
        try{
            $html=$this->topics($req->chapter);
            return response()->json(['status'=>true,'topics'=>$html]);
        }catch (\Exception $exception)
        {
            return $exception->getMessage();
        }
    }

    public function edit($topicId)
    {
        $topic=Topic::topicById($topicId);
        $html=view('admin.topic.partial.topic-edit',
            [
                'classes'=>CourseClass::classesById($topic->t_course),
                'courses'=>Course::courses(),
                'subjects'=>Subject::byClass($topic->t_class),
                'chapters'=>Chapter::bySubject($topic->t_subject),
                'topic'=>$topic

            ]
        )->render();
        return response()->json(['status'=>true,'topic'=>$html]);
    }

    public function update(TopicReq $req)
    {

        $data=[
            't_course'=>$req->course,
            't_class'=>$req->class,
            't_subject'=>$req->subject,
            't_chapter'=>$req->chapter,
            'topic_name'=>$req->topic,
            'topic_number'=>$req->number,
        ];
        $topic=Topic::topicById($req->id);
        if (Topic::edit($req->id,$data))
        {
            $html=$this->topics($topic->t_chapter);
            return response()->json(['status'=>true,'topics'=>$html,'msg'=>'Topic is updated successfully!']);

        }else{
            $html=$this->topics($topic->t_chapter);
            return response()->json(['status'=>false,'topics'=>$html,'msg'=>'Topic is not updated!']);
        }
    }

    public function remove($topicId)
    {


        $topic=Topic::topicById($topicId);
        if (Topic::remove($topicId))
        {
            $html=$this->topics($topic->t_chapter);
            return response()->json(['status'=>true,'topics'=>$html,'msg'=>'Topic is removed successfully!']);

        }else{
            $html=$this->topics($topic->t_chapter);
            return response()->json(['status'=>false,'topics'=>$html,'msg'=>'Topic is not removed!']);
        }
    }


    private function topics($chapterId)
    {
        $html=view('admin.topic.partial.topic-partial',
            [
                'topics'=>Topic::topicByChapter($chapterId)
            ]
        )->render();
        return  $html;
    }

    public function topics1($chapterId)
    {
        return response()->json(['status'=>true,'topics'=>Topic::topicByChapter($chapterId)]);
    }

}
