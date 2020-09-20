@extends('layouts/master')
@section('m1')

    <form method="post" action="login">
        <table cellpadding="8" align="center"  style="margin-left: 250px">
        @csrf
       <!-- <img src="" height="150px" width=300px" style="margin-left: 300px; margin-top: 100px;">-->
            <tr><th colspan="2"><h1 style=" margin-top: 10px" align="center">Login Page</h1></th>
            <tr><th>Login_Id</th><td><input type="text" name="T1"></td></tr>
            <tr><th>Password</th><td><input type="text" name="T2"></td></tr>
            <tr><th></th><td><input type="submit" name="B1" value="login"></td></tr>
        </table>
        <img src="../../../../p/public/css/images/med77.jpg" height="200" width="350" style="margin-left:215px;">

    </form>
@endsection