@extends('layouts/medicalmaster')
@section('m1')
    <a style="margin-left: 5px;"  href="manage"><img src="../../../p/public/css/images/back.jfif"style="height: 50px;"></a>

    @if($medi)

        <form method="post" action="delete1">
            <table cellpadding="8" align="center">
                @csrf
                <tr><th colspan="2"><h1 style=" margin-top: -25px" align="center">Delete</h1></th>
                <tr><th>Name</th><td><input readonly type="text" name="T1" value="{{$medi[0]->mname}}" /> </td></tr>
                <tr><th>Company</th><td><input readonly type="text" name="T2" value="{{$medi[0]->cname}}" /> </td></tr>
                <tr><th>License No</th><td><input readonly type="text" name="T3" value="{{$medi[0]->lno}}" /> </td></tr>
                <tr><th>Description</th><td><textarea cols="22" rows="5" name="T4" > {{$medi[0]->description}} </textarea> </td></tr>
                <tr><th>Unit Price</th><td><input readonly type="text" name="T5" value="{{$medi[0]->unitprice}}" /> </td></tr>
                <tr><th>Upload BY</th><td><input readonly type="text" name="T6" value="{{$medi[0]->uploadby}}" /> </td></tr>

                <tr><input type="hidden" name="H1" value="{{$medi[0]->mid}}" /> </tr>
                <tr><th></th><td><input type="submit" name="B1" value="Delete" /></td> </tr>
            </table>
        </form>

    @endif
@endsection