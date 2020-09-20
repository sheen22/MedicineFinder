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


<form method="post" action="admin_reg" style="text-align: center">
    <table cellpadding="8" align="center">
    @csrf
        <tr><th colspan="2">
                <h1 style=" margin-top: 20px" align="center">Admin Registration</h1></th>
        <tr><th>Name</th>
            <td><input type="text" name="T1" id="T1" /></td>
    </tr>
        <tr><th>Address</th>
            <td><input type="text" name="T2" id="T2" /></td>
    </tr>
        <tr><th>Contact</th>
            <td><input type="text" name="T3" id="T3" /></td>
    </tr>
        <tr><th>Email</th>
            <td><input type="text" name="T4" id="T4" /></td>
    </tr>
        <tr><th>Password</th>
            <td><input type="password" name="T5" id="T5" /></td>
    </tr>
        <tr><th>Confirm Password</th>
            <td><input type="password" name="T6" id="T6" /></td>
    </tr>
    <tr><th></th>
        <td><input type="submit" name="B1" id="B1" value="Register" /></td>
    </tr>
</table>
</form>

@if($msg)
    <h3>{{$msg}}</h3>
@endif
@endsection