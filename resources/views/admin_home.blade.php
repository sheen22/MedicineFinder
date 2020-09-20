@extends('layouts/adminmaster')
@section('m1')
    <body style="text-align: center">
    <h2 align="center" style="text-shadow: 0 5px 10px indigo;font-size:42px; color:#000; font-style:italic; margin-top:130px;">Welcome Admin </h2>
    <!--<img src="../../../../p/public/css/images/med77.jpg" height="200" width="350" style="margin-left:215px; margin-top: -20px">-->

    @if($photo=='no')
        <p><a href="upload_photo" >Upload Photo</a></p>

    @else
        <img src="storage/app/{{$photo}}" width="130" height="140" style="border-radius: 50%;margin-top: -20px" />
        <form method="post" action="change_adminphoto">
        @csrf
            <input type="hidden" name="H1" value="{{$photo}}" />
            <input type="submit" name="B1" value="Change" style="margin-top: 5px" />
        </form>
    @endif
    </body>
@endsection