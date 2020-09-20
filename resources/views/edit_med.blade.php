@extends('layouts/adminmaster')
@section('m1')
    <a style="margin-left: 5px;"  href="showmed"><img src="../../../p/public/css/images/back.jfif"style="height: 50px;"></a>

    @if($md)

        <form method="post" action="editmed1">
            <table cellpadding="8" align="center">
                @csrf
                <tr><th colspan="2"><h1 style=" margin-top: 10px" align="center">Edit & Save</h1></th>
                <tr><th>Name</th><td><input type="text" name="T1" value="{{$md[0]->name}}" /> </td></tr>
                <tr><th>Owner</th><td><input type="text" name="T2" value="{{$md[0]->owner}}" /> </td></tr>
                <tr><th>License No</th><td><input type="text" name="T3" value="{{$md[0]->lno}}" /> </td></tr>
                <tr><th>Address</th><td><input type="text" name="T4" value="{{$md[0]->address}}" /></td> </tr>
                <tr><th>Landmark</th><td><input type="text" name="T5" value="{{$md[0]->landmark}}" /> </td></tr>
                <tr><th>Colony</th><td><input type="text" name="T6" value="{{$md[0]->colony}}" /> </td></tr>
                <tr><th>Contact</th><td><input type="text" name="T7" value="{{$md[0]->contact}}" /> </td></tr>

            <tr><input type="hidden" name="H1" value="{{$md[0]->email}}" /> </tr>
                <tr><th></th><td><input type="submit" name="B1" value="Save" /></td> </tr>
            </table>
        </form>
    @endif
@endsection