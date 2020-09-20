@extends('layouts/medicalmaster')
@section('m1')
    @if($medicine)
        <form method="post" action="edit1">
            <table cellpadding="8" align="center">
                @csrf
                <tr><th colspan="2"><h1 style=" margin-top: 20px" align="center">Edit & Save</h1></th>
                <tr><th>Name</th><td><input type="text" name="T1" value="{{$medicine[0]->mname}}" /> </td></tr>
                <tr><th>Company</th><td><input type="text" name="T2" value="{{$medicine[0]->cname}}" /> </td></tr>
                <tr><th>License No</th><td><input type="text" name="T3" value="{{$medicine[0]->lno}}" /> </td></tr>
                <tr><th>Description</th><td><textarea cols="22" rows="5" name="T4" > {{$medicine[0]->description}} </textarea> </td></tr>
                <tr><th>Unit Price</th><td><input type="text" name="T5" value="{{$medicine[0]->unitprice}}" /> </td></tr>


                <tr><input type="hidden" name="H1" value="{{$medicine[0]->mid}}" /> </tr>
                <tr><th></th><td><input type="submit" name="B1" value="Save" /></td> </tr>
                <a style="margin-left: 5px;"  href="manage"><img src="../../../p/public/css/images/back.jfif"style="height: 50px;"></a>
            </table>
        </form>
    @endif
@endsection