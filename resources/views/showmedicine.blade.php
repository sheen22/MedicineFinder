@extends('layouts/master')
 @section('m1')
     <a style="margin-left: 5px;"  href="search"><img src="../../../p/public/css/images/back.jfif"style="height: 50px;"></a>

     <style>
    h3{
        color: crimson;
        font-family: "Lucida Sans";
    }
    p{
        color: darkblue;
        font-family: "Lucida Sans";
    }
</style>

@if(count($data)>0)
    @foreach($data as $a)
        <h3>{{$a->mname}}💊</h3>
        <p>
            Company :{{$a->cname}}<br>
            License_No:{{$a->lno}}<br>
            Description:{{$a->description}}<br>
            Unit_Price:{{$a->unitprice}}<br>
            Upload_By:{{$a->uploadby}}<br/>
            Name:{{$a->name}}<br/>
            Owner:{{$a->owner}}<br/>
            Address:{{$a->address}}<br/>
            Contact:{{$a->contact}}
        </p>
        @endforeach
    @else
    <h3 align="center">NO DATA FOUND...</h3>
@endif
@endsection