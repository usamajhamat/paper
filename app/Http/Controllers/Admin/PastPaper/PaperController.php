<?php

namespace App\Http\Controllers\Admin\PastPaper;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PastPaperReq;
use App\Models\Admin\PastPaper\Extra\Extra;
use App\Models\Admin\PastPaper\PastPaper;
use App\Models\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PaperController extends Controller
{
    public function add()
    {
        return view('admin.past.paper-add',$this->data());
    }
    public function papers()
    {
        return view('admin.past.papers_list',
                        [
                           'boards'=>Extra::boardsList(),
                           'classes'=>Extra::classesList(),
                           'subjects'=>Extra::SubjectList(),
                           'shifts'=>Extra::ShiftList(),
                           'types'=>Extra::TypeList(),
                        ]
            );
    }

    public function save(PastPaperReq $req)
    {
        $paper=null;

        if ($req->hasFile('paper')) {
            $filename = 'paper-' . uniqid(12) . time() . '.' . $req->file('paper')->getClientOriginalExtension();
            Storage::disk('photo')->putFileAs('/', $req->file('paper'), $filename);
            $paper = $filename;
        }


        $data=[
            'board'=>$req->board,
            'class'=>$req->class,
            'subject'=>$req->subject,
            'paper_type'=>$req->type,
            'paper_year'=>$req->year,
            'shift'=>$req->shift,
            'paper'=>$paper
        ];

        if (PastPaper::add($data))
        {
            return back()->with('success','Past paper is saved successfully!');
        }else{
            return back()->with('failure','Past paper is  not saved!');
        }
    }

    public function edit($paperId)
    {
        return view('admin.past.paper-edit',
                  [
                     'boards'=>Extra::boardsList(),
                     'classes'=>Extra::classesList(),
                     'subjects'=>Extra::SubjectList(),
                     'shifts'=>Extra::ShiftList(),
                     'types'=>Extra::TypeList(),
                     'paper'=>PastPaper::paperById($paperId),
                  ]
            );
    }
    public function update(PastPaperReq $req)
    {
        $paper=null;

        if ($req->hasFile('paper')) {
            $filename = 'paper-' . uniqid(12) . time() . '.' . $req->file('paper')->getClientOriginalExtension();
            Storage::disk('photo')->putFileAs('/', $req->file('paper'), $filename);
            $paper = $filename;
            Helper::imageDelete($req->old);
        }else{
            $paper=$req->old;
        }


        $data=[
            'board'=>$req->board,
            'class'=>$req->class,
            'subject'=>$req->subject,
            'paper_type'=>$req->type,
            'paper_year'=>$req->year,
            'shift'=>$req->shift,
            'paper'=>$paper
        ];

        if (PastPaper::edit($req->id,$data))
        {
            return back()->with('success','Past paper is updated successfully!');
        }else{
            return back()->with('failure','Past paper is  not updated!');
        }
    }


    public function search(PastPaperReq $req)
    {
       $html=view('admin.past.partial.search-partial',
                         [
                             'papers'=>PastPaper::search($req->board,$req->class,$req->subject)
                         ])->render();
       Session::put('old',$req->all());
       return response()->json(['status'=>true,'papers'=>$html]);
    }
    public function remove($paperId)
    {
        $req=Session::get('old');
        $image=PastPaper::paperById($paperId);

        if (PastPaper::remove($paperId))
        {
            Helper::imageDelete(base_path('images').'/'.$image->paper);
            $html=view('admin.past.partial.search-partial',
                [
                    'papers'=>PastPaper::search($req['board'],$req['class'],$req['subject'])
                ])->render();
            return response()->json(['status'=>true,'papers'=>$html]);
        }else{
            $html=view('admin.past.partial.search-partial',
                [
                    'papers'=>PastPaper::search($req['board'],$req['class'],$req['subject'])
                ])->render();
            return response()->json(['status'=>false,'papers'=>$html]);
        }
    }

    public function paperById($paperId)
    {
        $paper=PastPaper::paperById($paperId);

        return response()->json(['status'=>true,'paper'=>url('images').'/'.$paper->paper]);
    }

    public function download($image)
    {
        $url=base_path('images').'/'.$image;
        return response()->download($url);
    }

    private function data()
    {
        return [
            'boards'=>Extra::boardsList(),
            'classes'=>Extra::classesList(),
            'subjects'=>Extra::SubjectList(),
            'shifts'=>Extra::ShiftList(),
            'types'=>Extra::TypeList(),
        ];
    }
    private function oldRequest($request)
    {
        Session::put('old',$request);
    }

}
