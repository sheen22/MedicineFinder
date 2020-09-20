<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }


    public function login(Request $req)
    {
        if(Input::has('B1'))
        {
            $email = Input::post('T1');
            $password = Input::post('T2');
            $s1=DB::select("select * from logindatas where email=? AND password=?",[$email,$password]);
            if(count($s1)>0)
            {
                $ut = $s1[0]->usertype;
                $req->session()->put('email', $email);
                $req->session()->put('usertype',$ut);
                if ($ut=="admin")
                    return redirect()->action('AdminController@admin_home');

                elseif ($ut=="medical")
                    return redirect()->action('MedicalController@medicalhome');

                else
                    $msg="No user type defined";
            }
            else
            {
                return view('login_error');
            }
        }
        else
            {
                return view('login');
            }

    }

    public function logout(Request $request)
    {
        if($request->session()->has('email'))
        {
            $request->session()->forget('email');
            $request->session()->forget('usertype');
            return redirect()->action('LoginController@login');
        }
        else
        {
            return redirect()->action('LoginController@login');        }
        }

    public function auth_error()
    {
        return view('auth_error');
    }


    public function login_error()
    {
        return view('login_error');
    }


}
