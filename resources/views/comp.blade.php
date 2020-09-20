@extends('layouts/medicalmaster')
@section('m1')
    <a style="margin-left: 5px;"  href="manage"><img src="../../../p/public/css/images/back.jfif"style="height: 50px;"></a>
    <style>
        tr{
            color: crimson;
            font-family: "Lucida Sans";
        }
        td{
            color: darkblue;
            font-family: "Lucida Sans";
        }
    </style>
    <table border="1"cellpadding="6">
        <tr>
            <th>Medicine_Name</th>
            <th>Unit_Price</th>
            <th>Upload_By</th>
            <th>Name</th>
            <th>Address</th>
            <th>Contact</th>
        </tr>
    @if(count($med)>0)
        @foreach($med as $data)
            <tr>
                <td>{{$data->mname}}</td>
                <td>{{$data->unitprice}}</td>
                <td>{{$data->uploadby}}</td>
                <td> {{$data->name}}</td>
                <td>{{$data->address}} </td>
                <td>{{$data->contact}} </td>
            </tr>
        @endforeach
    @else
            <tr>
            <td colspan="6" align="center">No Data Found</td>
            </tr>

    @endif
    </table>
@endsection