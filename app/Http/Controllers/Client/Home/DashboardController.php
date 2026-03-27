<?php

namespace App\Http\Controllers\Client\Home;

use App\Http\Controllers\Controller;
use App\Models\Client\Papers\Paper;
use App\Models\Client\Teachers\Teacher;
use App\Models\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function home()
    {
        $client=Helper::client();
        // Calculate the first day of the current month
        $firstDayOfCurrentMonth = Carbon::now()->startOfMonth();
//        dd($firstDayOfCurrentMonth);
//         Delete all papers created before the first day of the current month
        DB::table('papers')->where('paper_at', '<', $firstDayOfCurrentMonth)->delete();
        return view('client.home.home',
                        [
                            'teachers'=>count(Teacher::getAll($client->id)),
                            'role'=>$client->client_role,
                            'papers'=>$client->client_role=='Administrator'?
                                               count(Paper::school($client->id)):
                                               count(Paper::teacher($client->id,$client->parent_id)),
                            'alerts'=>DB::table('alerts')->get(),
                        ]);
    }
}