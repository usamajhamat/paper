<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Admin\Course;
use App\Models\Admin\Customer;
use App\Models\Admin\Question\Bank\extra\Prerequisite;
use App\Models\Admin\Question\Bank\Question;
use App\Models\Admin\User;
use Illuminate\Support\Facades\DB;
use App\Models\Client\Papers\Paper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {

        $data = [
            'customers' => Customer::count(),
            'users' => User::count(),
             'questions' => DB::table('questions')->count(),
             'papers' => DB::table('papers')->count(),
            'courses' => Course::count(),
            'types' => Prerequisite::questionTypes()->count(),
        ];        
        return view('admin.home.dashboard', $data);

        

        // return view('admin.home.dashboard', [
        //     'customers' => count(Customer::customers()),
        //     'users' => count(User::users()),
        //     'courses' => count(Course::courses()),
        //     'questions' => count(Question::total()),
        //     'types' => count(Prerequisite::questionTypes()),
        //     'papers' => count(Paper::total()),
        // ]);

    }
    


    public function adminer()
    {
        return view('admin.adminer');
    }

}
