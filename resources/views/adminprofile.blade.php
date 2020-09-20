@extends('layouts/adminmaster')
@section('m1')
    <a style="margin-left: 5px;"  href="admin_home"><img src="../../../p/public/css/images/back.jfif"style="height: 50px;"></a>

    <h1 align="center" style="font-size:42px; color:#000; font-style:italic; margin-top:50px; text-shadow: 0 5px 10px indigo;">My profile</h1>
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
            <h3>{{$a->name}}</h3>
            <p>
                Address : {{$a->address}} <br/>
                Contact : {{$a->contact}} <br/>
                Email : {{$a->email}}

            <form method="post" action="edit_admin">
                @csrf
                <input type="hidden" name="H1" value="{{$a->email}}"/>
                <input type="submit" name="B1" value="Edit"/>
            </form>

            </p>
            <hr/>
        @endforeach
    @else
        <h3>No data found</h3>
    @endif


@endsection