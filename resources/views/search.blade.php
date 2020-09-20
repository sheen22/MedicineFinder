@extends('layouts/master')
@section('m1')
    <a style="margin-left: 5px;"  href="index"><img src="../../../p/public/css/images/back.jfif"style="height: 50px;"></a>



    <form method="post" action="search">
        <table cellpadding="8" align="center"  style="margin-left: 200px">
        @csrf
            <tr><th colspan="2"><h1 style=" margin-top: -7px" align="center">Search Medicine</h1></th>
            <tr><th>Enter Medicine_Name</th><td><input type="text" name="T1"></td></tr>
            <tr><th></th><td><input type="submit" name="B1" value="Search" /></td></tr>
        </table>
        <img src="../../../../p/public/css/images/med77.jpg" height="200" width="350" style="margin-left:215px;">

    </form>

@endsection