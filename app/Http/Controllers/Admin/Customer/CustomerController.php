<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerReq;
use App\Models\Admin\Customer;
use App\Models\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;


class CustomerController extends Controller
{
    public function customers()
    {
        // return Customer::customers();
        return view('admin.customer.customer-list',['customers'=>Customer::customers()]);
    }

    public function remove(Request $request){
        if (Customer::where('id',$request->id)->delete() || Customer::where('parent_id',$$request->id)->delete()){
            echo 1;
        }
        else{
            echo 0;
        }
    }

    public function PrintCustomer(Request $req)
    {
        $users = Customer::all(); // Assuming you have a 'users' table and User model

        $pdf = new Dompdf();
        $pdf->loadHTML(View::make('pdf.users', ['users' => $users])->render());
    
        // Optional: Set PDF options if needed
        // $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'Arial']);
    
        // Generate the PDF file
        $pdf->render();
    
        // Download the PDF file
        return $pdf->stream('users.pdf');    }

    public function add()
    {
        return view('admin.customer.customer-add');
    }

    public function save(CustomerReq $req)
    {
        $photo=null;
        $logo=null;


        if ($req->hasFile('photo')) {
            $filename = 'photo-' . uniqid(12) . time() . '.' . $req->file('photo')->getClientOriginalExtension();
            Storage::disk('photo')->putFileAs('/', $req->file('photo'), $filename);
            $photo = $filename;
        }
        if ($req->hasFile('logo')) {
            $filename = 'logo-' . uniqid(12) . time() . '.' . $req->file('logo')->getClientOriginalExtension();
            Storage::disk('photo')->putFileAs('/', $req->file('logo'), $filename);
            $logo = $filename;
        }

        $data=[
            'id'=>Helper::customerId(),
            'name'=>$req->name,
            'phone'=>$req->phone,
            'email'=>$req->username,
            'school_name'=>$req->school,
            'address'=>$req->address,
            'password'=>$req->password,
            'price'=>$req->price,
            'status'=>$req->status,
            'photo'=>$photo,
            'logo'=>$logo,
            'created_at'=>$req->join,
            'expired_at'=>$req->expire
        ];

        if (Customer::add($data))
        {
            return back()->with('success','New customer is added successfully!');
        }else{
            return back()->with('failure','New customer is  not added!');
        }
    }

    public function edit($id)
    {
        return view('admin.customer.customer-edit',['customer'=>Customer::customerById($id)]);
    }

    public function update(CustomerReq $req)
    {
        $photo=null;
        $logo=null;


        if ($req->hasFile('photo')) {
            $filename = 'photo-' . uniqid(12) . time() . '.' . $req->file('photo')->getClientOriginalExtension();
            Storage::disk('photo')->putFileAs('/', $req->file('photo'), $filename);
            $photo = $filename;
            Helper::imageDelete($req->oldPhoto);
        }else{
            $photo=$req->oldPhoto;
        }
        if ($req->hasFile('logo')) {
            $filename = 'logo-' . uniqid(12) . time() . '.' . $req->file('logo')->getClientOriginalExtension();
            Storage::disk('photo')->putFileAs('/', $req->file('logo'), $filename);
            $logo = $filename;
            Helper::imageDelete($req->oldLogo);
        }else{
            $logo=$req->oldLogo;
        }

        $data=[
            'name'=>$req->name,
            'phone'=>$req->phone,
            'email'=>$req->username,
            'school_name'=>$req->school,
            'address'=>$req->address,
            'password'=>$req->password,
            'price'=>$req->price,
            'status'=>$req->status,
            'photo'=>$photo,
            'logo'=>$logo,
            'created_at'=>$req->join,
            'expired_at'=>$req->expire
        ];

        if (Customer::edit($req->id,$data))
        {
            return back()->with('success','Customer info are updated successfully!');
        }else{
            return back()->with('failure','Customer are not updated!');
        }
    }


    public function status($id,$status)
    {

        if (Customer::status($id,['status'=>$status]))
        {
            return response()->json(['status'=>true,'message'=>'Customer status is changed successfully!']);
        }else{
            return response()->json(['status'=>false,'message'=>'Customer status is not changed']);
        }
    }

    public function profile($id)
    {
        return view('admin.customer.customer-profile',['customer'=>Customer::customerById($id)]);
    }

}
