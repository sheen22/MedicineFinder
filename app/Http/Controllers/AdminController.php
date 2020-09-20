<?php

namespace App\Http\Controllers;

use App\admindata;
use App\logindata;
use App\photodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;

class AdminController extends Controller
{
    public function admin_profile(Request $req)
    {

        if($req->session()->has('email'))
        {
            $ut=$req->session()->get('usertype');
            $e1=$req->session()->get('email');
            if($ut=='admin')
            {
                $s1=DB::select("select * from admindatas where email=? ",[$e1]);
                return view('adminprofile')->with(['data'=>$s1]);
            }

            else
                return redirect()->action('LoginController@auth_error');
        }
        else
        {
            return redirect()->action('LoginController@auth_error');
        }

       /* $request->session()->has('email');
        $e1=$request->session()->get('email');
        $s1=DB::select("select * from admindatas where email=? ",[$e1]);
        return view('adminprofile')->with(['data'=>$s1]);*/
    }

    public function admin_home(Request $req)
    {
        if($req->session()->has('email'))
        {
            $ut=$req->session()->get('usertype');
            $e1=$req->session()->get('email');
            if($ut=='admin')
            {
                    $photo = $this->check_photo($e1);
                    return view('admin_home')->with(["photo"=>$photo]);
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

    public function admin_reg(Request $req)
    {

        if($req->session()->has('email'))
        {
            $ut=$req->session()->get('usertype');
            $e1=$req->session()->get('email');
            if($ut=='admin')
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

            else
                return redirect()->action('LoginController@auth_error');
        }
        else
        {
            return redirect()->action('LoginController@auth_error');
        }

        
    }

    private function check_email($email)
    {
        $r=DB::select("select * from admindatas where email=?",[$email]);
        $n=count($r);
        return $n;

    }

    public function show_admins(Request $req)
    {
        if($req->session()->has('email'))
        {
            $ut=$req->session()->get('usertype');
            $e1=$req->session()->get('email');
            if($ut=='admin')
            {
                $s1=DB::select("select * from admindatas");
                return view('show_admins')->with(['data'=>$s1]);
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

    public function edit_admins(Request $req)
    {
        if($req->session()->has('email'))
        {
            $ut=$req->session()->get('usertype');
            $e1=$req->session()->get('email');
            if($ut=='admin')
            {
                if(Input::has('B1'))
                {
                    $a=Input::post("H1");
                    $s1=DB::select('select * from admindatas where email=?',[$a]);
                    return view('edit_admin')->with(['ad'=>$s1]);
                }
                else
                {
                     return redirect()->action('AdminController@show_admins');
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
        return redirect()->action('AdminController@show_admins');
    }

    public  function change_password(Request $req)
    {
        if($req->session()->has('email'))
        {
            $ut=$req->session()->get('usertype');
            $e1=$req->session()->get('email');
            if($ut=='admin')
            {
                if(Input::has('B1'))
                {
                    $oldpass=Input::post('T1');
                    $newpass=Input::post('T2');
                    DB::update('update logindatas set password=? where email=? AND password=
?',[$newpass,$e1,$oldpass]);
                    return view('change_pass')->with(['msg'=>"password Changed"]);
                }
                else
                {
                    return view('change_pass')->with(['msg'=>'']);
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

    private function check_photo($email)
    {
        $s1=DB::select('select * from photodatas where email=?',[$email]);
        $n=count($s1);
        $photo="no";
        if($n>0)
        {
            $photo=$s1[0]->photo;
        }
        return $photo;
    }

    public function upload_photo(Request $req)
    {
        if($req->session()->has('email')) {
            $ut = $req->session()->get('usertype');
            if ($ut == 'admin')
            {
                if (Input::has("B1"))
                {
                    //It will automatically save photo in folder storage/photos folder

                    $file = $req->file("F1")->store('photos');

                    $obj = new photodata();
                    $obj->email = $req->session()->get('email');
                    $obj->photo = $file;
                    $obj->save();
                    return view('upload_photo_admin')->with(['msg' => 'Photo Uploaded']);
                }
                else {
                    return view('upload_photo_admin')->with(['msg' => '']);
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

    public function change_admin_photo(Request $request)
    {
        if ($request->session()->has('email')) {
            $ut = $request->session()->get('usertype');
            $e1 = $request->session()->get('email');
            if ($ut == "admin")
            {
                if(Input::has("B1"))
                {
                    $photo=Input::post("H1");
                    $path="storage/app/".$photo;
                    unlink($path);
                    DB::delete("delete from photodatas where email=?",[$e1]);
                    return view('upload_photo_admin')->with(['msg'=>'Photo Deleted']);
                }
                else
                {
                    return redirect()->action('AdminController@admin_home');
                }

            } else
                {
                return redirect()->action('LoginController@auth_error');
            }
        }
        else
            {
            return redirect()->action('LoginController@auth_error');
        }
    }

}
