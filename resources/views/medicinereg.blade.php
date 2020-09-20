@extends('layouts/medicalmaster')
@section('m1')
    <a style="margin-left: 5px;"  href="manage"><img src="../../../p/public/css/images/back.jfif"style="height: 50px;"></a>

    <style>
        tr{
            font-size: 20px;
            font-style: italic;
            font-family:"Arial";
        }
        th,td{
            font-size:18px;
            font-style:italic;
        }

    </style>
    <form method="post" action="medireg">
        <table cellpadding="6" align="center">
            @csrf
            <tr><th colspan="2">
                    <h1 style="margin-top: 20px " align="center">Add Medicine</h1></th>
            <tr>
                <th>Name</th><td><input type="text" name="T1"></td>
            </tr>
            <tr>
                <th>Company</th><td><input type="text" name="T2"></td>
            </tr>
            <tr>
                <th>License No</th><td><input type="text" name="T3"></td>
            </tr>
            <tr>
                <th>Description</th><td><textarea cols="22" rows="5" name="T4"></textarea></td>
            </tr>
            <tr>
                <th>Unit Price</th><td><input type="text" name="T5" id="T5"></td>
            </tr>
            <tr>

            <tr>
                <th></th><td><input type="submit" name="B1" value="Add"></td>
            </tr>
        </table>

    </form>

    @if($msg)
        <h3>{{$msg}}</h3>
    @endif
@endsection