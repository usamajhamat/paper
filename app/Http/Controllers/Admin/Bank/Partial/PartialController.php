<?php

namespace App\Http\Controllers\Admin\Bank\Partial;

use App\Http\Controllers\Controller;
use App\Models\Admin\Question\Bank\extra\Prerequisite;
use App\Models\Helper;
use Illuminate\Http\Request;

class PartialController extends Controller
{
    public function shortOrLong($typeId,$mediumId)
    {
        $medium=Prerequisite::mediumById($mediumId);
        $questionType=Prerequisite::typeByAssignId($typeId);
       // return $this->questionTypes($questionType->short_key);
       return view('admin.question.question-partial.question_partial',
                      [
                          'type'=>$questionType->short_key,
                          'lang'=>$medium->medium_name,
                          'title'=>$questionType->title,
                          'types'=>$this->questionTypes($questionType->short_key)
                      ]
           )->render();
    }

    private function questionTypes($key)
    {
        if (in_array($key,Helper::questionTypes()))
        {
            return Helper::questionTypes();
        }else if(in_array($key,Helper::booleanTypes()))
        {
            return Helper::booleanTypes();
        }

    }


}
