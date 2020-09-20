@extends('layouts/adminmaster')
@section('m1')
    <a style="margin-left: 5px;"  href="showmed"><img src="../../../p/public/css/images/back.jfif"style="height: 50px;"></a>

    @if($med)

    <form method="post" action="delmed1">
        <table cellpadding="8" align="center">
            @csrf
            <tr><th colspan="2"><h1 style=" margin-top: 10px" align="center">Delete</h1></th>
            <tr><th>Name</th><td><input readonly type="text" name="T1" value="{{$med[0]->name}}" /> </td></tr>
            <tr><th>Owner</th><td><input readonly type="text" name="T2" value="{{$med[0]->owner}}" /> </td></tr>
            <tr><th>License No</th><td><input readonly type="text" name="T3" value="{{$med[0]->lno}}" /> </td></tr>
            <tr><th>Address</th><td><input readonly type="text" name="T4" value="{{$med[0]->address}}" /></td> </tr>
            <tr><th>Landmark</th><td><input readonly type="text" name="T5" value="{{$med[0]->landmark}}" /> </td></tr>
            <tr><th>Colony</th><td><input readonly type="text" name="T6" value="{{$med[0]->colony}}" /> </td></tr>
            <tr><th>Contact</th><td><input readonly type="text" name="T7" value="{{$med[0]->contact}}" /> </td></tr>

            <tr><input type="hidden" name="H1" value="{{$med[0]->email}}" /> </tr>
            <tr><th></th><td><input type="submit" name="B1" value="Delete" /></td> </tr>
        </table>
    </form>

    @endif
@endsection