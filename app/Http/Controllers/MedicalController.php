<?php

namespace App\Http\Controllers;

use App\logindata;
use App\meddata;
use App\medicaldata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class MedicalController extends Controller
{
    public function medicalhome(Request $req)
    {
        if($req->session()->has('email'))
        {
            $ut=$req->session()->get('usertype');
            $e1=$req->session()->get('email');
            if($ut=='medical')

                return view('medical_home');

            else
                return redirect()->action('LoginController@auth_error');
        }
        else
        {
            return redirect()->action('LoginController@auth_error');
        }

    }


    public function medical_reg(Request $req)
    {

        if($req->session()->has('email'))
        {
            $ut=$req->session()->get('usertype');
            $e1=$req->session()->get('email');
            if($ut=='medical')
            {
                if(Input::has('B1'))
                {
                    $name=Input::post('T1');
                    $owner=Input::post('T2');
                    $lno=Input::post('T3');
                    $add=Input::post('T4');
                    $lan=Input::post('T5');
                    $colony=Input::post('T6');
                    $cont=Input::post('T7');
                    $em=Input::post('T8');
                    $pass=Input::post('T9');
                    $ut="medical";

                    $md=new medicaldata();
                    $lgn=new logindata();

                    $md->name=$name;
                    $md->owner=$owner;
                    $md->lno=$lno;
                    $md->address=$add;
                    $md->landmark=$lan;
                    $md->colony=$colony;
                    $md->contact=$cont;
                    $md->email=$em;

                    $lgn->email=$em;
                    $lgn->password=$pass;
                    $lgn->usertype=$ut;

                    $n=$this->check_email($em);
                    $msg='';
                    if($n>0)
                    {
                    $msg='Email already Exist';
                    }
                    else
                    {
                        $md->save();
                        $lgn->save();
                        $msg="Data Saved";
                    }
                    return view("med_reg")->with(['msg'=>$msg]);
                }
                else
                {
                    return view("med_reg")->with(['msg'=>'']);
                }

            }
            else
                return redirect()->action('LoginController@auth_error');
        }
        else
        {
            return redirect()->action('LoginController@auth_error');
        }
        
    }

    public function check_email($em)
    {
        $s1=DB::select('select * from logindatas where email=?',[$em]);
        $n=count($s1);
        return $n;
    }

    public function show_medical()
    {
        $s1=DB::select('select * from medicaldatas');
        return view('show_med')->with(['data'=>$s1]);
    }

    public function edit_medical()
    {
        if(Input::has('B1'))
        {
            $em=Input::post("H1");
            $s1=DB::select('select * from medicaldatas where email=?',[$em]);
            return view('edit_med')->with(['md'=>$s1]);
        }
        else{
            return redirect()->action('MedicalController@show_medical');
        }
    }
    public function edit_medical1()
    {
        if(Input::has('B1'))
        {
            $a=Input::post("T1");
            $b=Input::post("T2");
            $c=Input::post("T3");
            $d=Input::post("T4");
            $e=Input::post("T5");
            $f=Input::post("T6");
            $g=Input::post("T7");
            $h=Input::post('H1');

            $md=DB::update("update medicaldatas set name=?,owner=?,lno=?,address=?,landmark=?,colony=?,contact=? where email=?",[$a,$b,$c,$d,$e,$f,$g,$h]);

        }
        return redirect()->action('MedicalController@show_medical');
    }

    public function delete_med()
    {
        if(Input::has('B1'))
        {
            $em=Input::post("H1");
            $s1=DB::select('select * from medicaldatas where email=?',[$em]);
            return view('deletemed')->with(['med'=>$s1]);
        }
        else
        {
            return redirect()->action('MedicalController@show_medical');
        }
    }

    public function delete_med1(Request $req)
    {
        if (Input::has('B1'))
        {
            $em = Input::post('H1');
            $med = DB::delete('delete from medicaldatas  where email=?', [$em]);
            $med = DB::delete('delete from logindatas where email=?', [$em]);

        return redirect()->action('MedicalController@show_medical');
    }

        else
            return redirect()->action('LoginController@auth_error');


    }

    public function medicine_reg(Request $req)
    {
        if($req->session()->has('email'))
        {
            $ut=$req->session()->get('usertype');
            $e1=$req->session()->get('email');
            if($ut=='medical')
            {
                if (Input::has('B1'))
                {
                    $mname = Input::post('T1');
                    $cname = Input::post('T2');
                    $lno = Input::post('T3');
                    $desc = Input::post('T4');
                    $unprice = Input::post('T5');

                    $med = new meddata();

                    $med->mname = $mname;
                    $med->cname = $cname;
                    $med->lno = $lno;
                    $med->description = $desc;
                    $med->unitprice = $unprice;
                    $med->uploadby=$e1;

                    $med->save();
                    $msg = "Medicine Added Successfully";

                    return view("medicinereg")->with(['msg' => $msg]);
                }
                else
                {
                    return view("medicinereg")->with(['msg' => '']);
                }
            }

            else
                return redirect()->action('LoginController@auth_error');
        }
        else
        {
            return redirect()->action('LoginController@auth_error');
        }

    }

    public function medical_profile(Request $req)
    {

        if($req->session()->has('email'))
        {
            $ut=$req->session()->get('usertype');
            $e1=$req->session()->get('email');
            if($ut=='medical')
            {
                $s1=DB::select("select * from medicaldatas where email=? ",[$e1]);
                return view('medicalprofile')->with(['data'=>$s1]);
            }

            else
                return redirect()->action('LoginController@auth_error');
        }
        else
        {
            return redirect()->action('LoginController@auth_error');
        }

    
    }


    public  function change_password(Request $req)
    {
        if($req->session()->has('email'))
        {
            $ut=$req->session()->get('usertype');
            $e1=$req->session()->get('email');
            if($ut=='medical')
            {
                if(Input::has('B1'))
                {
                    $oldpass=Input::post('T1');
                    $newpass=Input::post('T2');
                    DB::update('update logindatas set password=? where email=? AND password=
?',[$newpass,$e1,$oldpass]);
                    return view('medchangepass')->with(['msg'=>"password Changed"]);
                }
                else
                {
                    return view('medchangepass')->with(['msg'=>'']);
                }
            }
            else
            {
                return redirect()->action('LoginController@auth_error');
            }
        }
        else
        {
            return redirect()->action('LoginController@auth_error');
        }
    }

    public  function manage_med(Request $req)
    {
        if($req->session()->has('email'))
        {
            $ut=$req->session()->get('usertype');
            $e1=$req->session()->get('email');
            if($ut=='medical')
            {
                $s1=DB::select('select * from meddatas where uploadby=?',[$e1]);
                return view('managemed')->with(['med'=>$s1]);

            }

            else
            {
                return redirect()->action('LoginController@auth_error');

            }
        }
        else
        {
            return redirect()->action('LoginController@auth_error');
        }

    }
    public function edit_medicine(Request $req)
    {
        if($req->session()->has('email'))
        {
            $ut=$req->session()->get('usertype');
            $e1=$req->session()->get('email');
            if($ut=='medical')
            {
                if(Input::has('B1'))
                {
                    $mid=Input::post('H1');
                    $s1=DB::select('select * from meddatas where mid=?',[$mid]);
                    return view('editmedicine')->with(['medicine'=>$s1]);
                }
                else
                {
                    return redirect()->action('MedicalController@manage_med');

                }


            }

            else
                return redirect()->action('LoginController@auth_error');
        }
        else
        {
            return redirect()->action('LoginController@auth_error');
        }
    }
    public function edit_medicine1(Request $req)
    {
        if($req->session()->has('email'))
        {
            $ut=$req->session()->get('usertype');
            $e1=$req->session()->get('email');
            if($ut=='medical')
            {
                if(Input::has('B1'))
                {
                    $mid=Input::post('H1');
                    $mname=Input::post('T1');
                    $cname=Input::post('T2');
                    $lno=Input::post('T3');
                    $desc=Input::post('T4');
                    $unprice=Input::post('T5');
                    $s1=DB::update('update meddatas set mname=?,cname=?,lno=?,description=?,unitprice=? where mid=?',[$mname,$cname,$lno,$desc,$unprice,$mid]);
                }
                return redirect()->action('MedicalController@manage_med');

            }

            else
                return redirect()->action('LoginController@auth_error');
        }
        else
        {
            return redirect()->action('LoginController@auth_error');
        }
    }

    public function delete_medicine(Request $req)
    {
        if($req->session()->has('email'))
        {
            $ut=$req->session()->get('usertype');
            $e1=$req->session()->get('email');
            if($ut=='medical')
            {
                if(Input::has('B1'))
                {
                    $mid=Input::post('H1');
                    $s1=DB::select('select * from meddatas where mid=?',[$mid]);
                    return view('deletemedicine')->with(['medi'=>$s1]);
                }
                else
                {
                    return redirect()->action('MedicalController@manage_med');

                }

            }
            else
                return redirect()->action('LoginController@auth_error');
        }
        else
        {
            return redirect()->action('LoginController@auth_error');
        }
    }
    public function delete_medicine1(Request $req)
    {
        if($req->session()->has('email'))
        {
            $ut=$req->session()->get('usertype');
            $e1=$req->session()->get('email');
            if($ut=='medical')
            {
                if(Input::has('B1'))
                {
                    $mid=Input::post('H1');
                    $s1=DB::delete('delete from meddatas where mid=?',[$mid]);
                }
                return redirect()->action('MedicalController@manage_med');

            }

            else
                return redirect()->action('LoginController@auth_error');
        }
        else
        {
            return redirect()->action('LoginController@auth_error');
        }
    }
    public function competitor(Request $req)
    {
        if($req->session()->has('email'))
        {
            $ut=$req->session()->get('usertype');
            $e1=$req->session()->get('email');
            if($ut=='medical')
            {
                if(Input::has('B1'))
                {
                    $mname = Input::post('H1');
                    $s1 = DB::select('select * from medicine_of_medicals where mname=? and uploadby<>?',[$mname,$e1]);
                    return view('comp')->with(['med' => $s1]);
                }
            }

            else
                return redirect()->action('LoginController@auth_error');
        }
        else
        {
            return redirect()->action('LoginController@auth_error');
        }

    }
    public function search()
    {
        if(Input::has('B1'))
        {
            $mname=Input::post('T1');
            $s1=DB::select("select * from show_medicine where mname LIKE '%".$mname."%'");
            return view('showmedicine')->with(['data'=>$s1]);
        }
        else
        {
            return view('search');
        }
    }
    }
