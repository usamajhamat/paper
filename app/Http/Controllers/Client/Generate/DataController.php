<?php

namespace App\Http\Controllers\Client\Generate;

use App\Http\Controllers\Controller;
use App\Models\Client\Papers\Paper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataController extends Controller
{
    public function questions(Request $request)
    {
        Session::put('generate128',$request->all());
       //return redirect()->route('my-paper-generate');
    }

    public function editPaper($paperId)
    {
        $paper=Paper::getById($paperId);
        $request = new Request([
            'topics'   => unserialize($paper->topics),
            'chapters' => unserialize($paper->chapters),
        ]);
        Session::put('generate128',$request->all());
        Session::put('edit00-paper',$paper);
        return redirect()->route('my-paper-generate');
    }


}
