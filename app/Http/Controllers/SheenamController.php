<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SheenamController extends Controller
{
    public function add()
    {
        if(Input::has('B1'))
        {
            $val1=Input::post('T1');
            $val2=Input::post('T2');
            $a=$val1+$val2;
            return view('addnumbers')->with(['ans'=>$a]);

        }
        else
        {
            return view('addnumbers')->with(['ans'=>'Enter numbers and press add button']);
        }
    }

    public function sub()
    {
        if(Input::has('B1'))
        {
            $val1=Input::post('T1');
            $val2=Input::post('T2');
            $a=$val1-$val2;
            return view('subnumbers')->with(['ans'=>$a]);

        }
        else
        {
            return view('subnumbers')->with(['ans'=>'Enter numbers and press sub button']);
        }
    }
    public function multi()
    {
        if(Input::has('B1'))
        {
            $val1=Input::post('T1');
            $val2=Input::post('T2');
            $a=$val1*$val2;
            return view('multinumbers')->with(['ans'=>$a]);

        }
        else
        {
            return view('multinumbers')->with(['ans'=>'Enter numbers and press multiply button']);
        }
    }
}
