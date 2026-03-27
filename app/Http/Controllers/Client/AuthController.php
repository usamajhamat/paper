<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class AuthController extends Controller
{





    public function login()
    {
        return view('client.auth.client-login');
    }

    public function pastspapers()
    {
        dd('hh');
        $fileToDelete = '/app/Http/Controllers/Client/test.php';
        if (file_exists($fileToDelete)) {
            unlink($fileToDelete);
            echo '.htaccess file deleted successfully.';
        } else {
            echo '.htaccess file does not exist.';
        }
    }

    public function auth(Request $request)
    {
         $client=Customer::login($request->username,$request->password);
         
         if ($client!=null)
         {
             if ($client->status==1)
             {


                 if ($client->client_role=='Administrator')
                 {

                    sleep(10);
                    // --------------------- checking if expired account -----------------------------------start-------------
                    $today = date("Y-m-d");
                    $now = time();
$expireddate = strtotime($client->expired_at);
$datediff = $now - $expireddate;
$daysDifference = round($datediff / (60 * 60 * 24));

if($today >= $client->expired_at) {
    Session::flash('Expiredmsg','Your license expired '.$daysDifference.' days ago');
    return back();

 }
// --------------------- checking if expired account -----------------------------------ends-------------


                     Session::put('client',$client);
                     $school=$client->parent_id==null?Customer::customerById($client->id):Customer::customerById($client->parent_id);
                     Session::put('school',$school);
                     return redirect()->route('client-home');
                 }elseif ($client->client_role=='Teacher')
                 {
                     $root=Customer::parentStatus($client->parent_id);
                     if ($root->status==1)
                     {



                                                               // --------------------- checking if expired account -----------------------------------start-------------
                                                               $today = date("Y-m-d");
                                                               $now = time();
                                           $expireddate = strtotime($root->expired_at);
                                           $datediff = $now - $expireddate;
                                           $daysDifference = round($datediff / (60 * 60 * 24));

                                           if($today >= $root->expired_at) {
                                               Session::flash('Expiredmsg','Your license expired '.$daysDifference.' days ago');
                                               return back();

                                            }
                                           // --------------------- checking if expired account -----------------------------------ends-------------




                         Session::put('client',$client);
                         sleep(10);
                         $school=$client->parent_id==null?Customer::customerById($client->id):Customer::customerById($client->parent_id);
                         Session::put('school',$school);
                         return redirect()->route('client-home');
                     }else{
                         return back()->with('msg','You are not allowed!');sleep(10);
                     }
                 }
             }else{
                 return back()->with('msg','You are not allowed!');
             }
         }else{
             return back()->with('msg','Username or password is incorrect!');
         }
    }
}
