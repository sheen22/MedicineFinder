@extends('layouts/adminmaster')
@section('m1')
    <a style="margin-left: 5px;"  href="admin_home"><img src="../../../p/public/css/images/back.jfif"style="height: 50px;"></a>

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
    <form method="post" action="medreg">
    <table cellpadding="6" align="center">
        @csrf
        <tr><th colspan="2">
                <h1 style="margin-top: -25px " align="center">Medical Registration</h1></th>
        <tr>
            <th>Name</th><td><input type="text" name="T1"></td>
        </tr>
        <tr>
            <th>Owner</th><td><input type="text" name="T2"></td>
        </tr>
        <tr>
            <th>License No</th><td><input type="text" name="T3"></td>
        </tr>
        <tr>
            <th>Address</th><td><input type="text" name="T4"></td></tr>
        <tr>
            <th>Landmark</th><td><input type="text" name="T5"></td>
        </tr>
        <tr>
            <th>Colony</th><td><input type="text" name="T6"></td>
        </tr>
        <tr>
            <th>Contact</th><td><input type="text" name="T7"></td>
        </tr>
        <tr>
            <th>Email</th><td><input type="text" name="T8"></td>

        </tr>
        <tr>
            <th>Password</th><td><input type="text" name="T9"></td></tr>
        <tr>
            <th>Confirm Password</th><td><input type="text" name="T10"></td>
        </tr>
        <tr>
            <th></th><td><input type="submit" name="B1" value="Register"></td>
        </tr>
    </table>

</form>

@if($msg)
    <h3>{{$msg}}</h3>
@endif
@endsection