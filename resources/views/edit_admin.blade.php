@extends('layouts/adminmaster')
@section('m1')
    <a style="margin-left: 5px;"  href="show"><img src="../../../p/public/css/images/back.jfif"style="height: 50px;"></a>

    @if($ad)
        <form method="post" action="edit_admin1">
            <table cellpadding="8" align="center">
            @csrf
                <tr><th colspan="2"><h1 style=" margin-top: 50px" align="center">Edit & Save</h1></th>
                <tr><th>Name</th><td><input type="text" name="T1" value="{{$ad[0]->name}}" /> </td></tr>
                <tr><th>Address</th><td><input type="text" name="T2" value="{{$ad[0]->address}}" /> </td></tr>
                <tr><th>Contact</th><td><input type="text" name="T3" value="{{$ad[0]->contact}}" /> </td></tr>

                <tr><input type="hidden" name="H1" value="{{$ad[0]->email}}" /> </tr>
                <tr><th></th><td><input type="submit" name="B1" value="Save" /></td> </tr>
            </table>
        </form>
    @endif
@endsection