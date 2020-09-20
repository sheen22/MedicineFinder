<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MathController extends Controller
{
    public function addition()
    {
        if(Input::has('B1'))
        {
            $val1=Input::post('T1');
            $val2=Input::post('T2');
            $sum=$val1+$val2;
            return view('sum')->with(['ans'=>$sum]);

        }
        else
        {
            return view('sum')->with(['ans'=>'Enter numbers and press add button']);
        }
    }
}
