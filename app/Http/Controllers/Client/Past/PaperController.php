<?php

namespace App\Http\Controllers\Client\Past;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PastPaperReq;
use App\Models\Admin\PastPaper\Extra\Extra;
use App\Models\Admin\PastPaper\PastPaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaperController extends Controller
{
    public function papers()
    {
        return view('client.past.papers_list',
            [
                'boards'=>Extra::boardsList(),
                'classes'=>Extra::classesList(),
                'subjects'=>Extra::SubjectList(),
                'shifts'=>Extra::ShiftList(),
                'types'=>Extra::TypeList(),
            ]
        );
    }

    public function search(PastPaperReq $req)
    {
        $html=view('client.past.partial.past-partial',
            [
                'papers'=>PastPaper::search($req->board,$req->class,$req->subject)
            ])->render();
        //Session::put('old',$req->all());
        return response()->json(['status'=>true,'papers'=>$html]);
    }

    public function download($image)
    {
        $url=base_path('images').'/'.$image;
        return response()->download($url);
    }

}
