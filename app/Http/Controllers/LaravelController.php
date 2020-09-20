<?php
namespace App\Http\Controllers;

use App\admindata;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\logindata;
use App\student;

class LaravelController extends Controller
{
    public function index()
    {
        $st=new student();
        $st->name='VGT';
        $st->save(); //It will insert the record to students table
        return view('index');
    }

    public function admin_reg()
    {
        if(Input::has('B1'))
        {
            $name=Input::post('T1');
            $address=Input::post('T2');
            $contact=Input::post("T3");
            $email=Input::post("T4");
            $password=Input::post("T5");
            $usertype="admin";

            $ad=new admindata();
            $lgn=new logindata();

            $ad->name=$name;
            $ad->address=$address;
            $ad->contact=$contact;
            $ad->email=$email;

            $lgn->email=$email;
            $lgn->password=$password;
            $lgn->usertype=$usertype;

            $n=$this->check_email($email);
            //$n=0;
            $msg='';

            if($n>0)
            {
                $msg='Email already exist';
            }
            else
                {
                $ad->save();
                $lgn->save();
                $msg='Data saved successfully';
            }

            return view("hello")->with(['msg'=>$msg]);
        }
        else
        {
            return view("hello")->with(['msg'=>'']);
        }
    }
    private function check_email($email)
    {
        $r=DB::select("select * from admindatas where email=?",[$email]);
        $n=count($r);
        return $n;

    }
    public function show_admins()
    {
        $s1=DB::select("select * from admindatas");
        return view('show_admins')->with(['data'=>$s1]);
    }
    public function edit_admins()
    {
        if(Input::has('B1'))
        {
            $a=Input::post("H1");
            $s1=DB::select('select * from admindatas where email=?',[$a]);
            return view('edit_admin')->with(['ad'=>$s1]);
        }
        else{
            return redirect()->action('LaravelController@show_admins');
        }
    }
    public function edit_admins1()
    {
        if(Input::has('B1'))
        {
            $a=Input::post("T1");
            $b=Input::post("T2");
            $c=Input::post("T3");
            $d=Input::post('H1');

            $ad=DB::update("update admindatas set name=?,address=?,contact=? where email=?",[$a,$b,$c,$d]);

        }
        return redirect()->action('LaravelController@show_admins');
    }


}
