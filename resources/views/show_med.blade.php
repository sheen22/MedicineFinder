@extends('layouts/adminmaster')
@section('m1')
    <a style="margin-left: 5px;"  href="admin_home"><img src="../../../p/public/css/images/back.jfif"style="height: 50px;"></a>
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
    <h1 style="color: darkslateblue">Medical list</h1>

    @if(count($data)>0)
        @foreach($data as $a)
            <h3>{{$a->name}}</h3>
            <p>
                Owner:{{$a->owner}}<br>
                Licence No:{{$a->lno}}<br>
                Address:{{$a->address}}<br>
                Landmark:{{$a->landmark}}<br>
                Colony:{{$a->colony}}<br>
                Contact:{{$a->contact}}<br>
                Email:{{$a->email}}<br>

                <form method="post" action="editmed">
                @csrf
                <input type="hidden" name="H1" value="{{$a->email}}">
                <input type="submit" name="B1" value="Edit">
                </form>

                <form method="post" action="delmed">
                    @csrf
                    <input type="hidden" name="H1" value="{{$a->email}}">
                    <input type="submit" name="B1" value="Delete">
                </form>

            </p>
            <hr>
        @endforeach
    @else
        <h3>No data found</h3>
    @endif
@endsection
