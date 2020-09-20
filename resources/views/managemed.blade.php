@extends('layouts/medicalmaster')
@section('m1')
    <a style="margin-left: 5px;"  href="medhome"><img src="../../../p/public/css/images/back.jfif"style="height: 50px;"></a>
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
    @if(count($med)>0)
        @foreach($med as $data)
                <h3>{{$data->mname}}💊</h3>
                <p>
                   Medicine_Id :{{$data->mid}}<br/>
                   Company :{{$data->cname}}<br>
                    License_No:{{$data->lno}}<br>
                    Description:{{$data->description}}<br>
                    Unit_Price:{{$data->unitprice}}<br>
                    Upload_By:{{$data->uploadby}}

            <form method="post" action="edit">
                @csrf
                <input type="hidden" name="H1" value="{{$data->mid}}"/>
                <tr><th></th><td><input type="submit" name="B1" value="Edit"/></td></tr>
            </form>

            <form method="post" action="delete">
                @csrf
                <input type="hidden" name="H1" value="{{$data->mid}}"/>
                <input type="submit" name="B1" value="Delete"/>
            </form>

            <form method="post" action="comp">
                @csrf
                <input type="hidden" name="H1" value="{{$data->mname}}"/>
                <input type="submit" name="B1" value="Competitors"/>
            </form>


            </p>
        @endforeach
    @else
        <h3>No data found</h3>
    @endif
@endsection