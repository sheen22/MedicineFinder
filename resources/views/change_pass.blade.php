@extends('layouts/adminmaster')
@section('m1')
    <a style="margin-left: 5px;"  href="admin_home"><img src="../../../p/public/css/images/back.jfif"style="height: 50px;"></a>

    <form method="post" action="change">
        <table cellpadding="7" align="center">
            @csrf
            <tr><th colspan="2"><h1 style=" margin-top: 50px" align="center">Change Password</h1></th>
            <tr><th>Old Password</th><td><input type="text" name="T1"></td></tr>
            <tr><th>New Password</th><td><input type="text" name="T2"></td></tr>
            <tr><th>Confirm Password</th><td><input type="text" name="T3"></td></tr>
            <tr><th></th><td><input type="Submit" name="B1" value="Save Changes"></td></tr>
            </table>
        </form>

        @if($msg)
            <h1>{{$msg}}</h1>
        @endif
@endsection