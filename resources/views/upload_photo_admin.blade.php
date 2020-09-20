@extends('layouts/adminmaster')
@section('m1')
        <a style="margin-left: -681px;"  href="admin_home"><img src="../../../p/public/css/images/back.jfif"style="height: 50px;"></a>


    <body style="text-align: center">
    <h1>Upload Photo</h1>
    <form method="post" action="upload_photo" enctype="multipart/form-data">
        @csrf
        <p><input type="file" name="F1" /> </p>
        <p><input type="submit" name="B1" value="Upload Photo" /> </p>
    </form>

    @if($msg)
        <h2>{{$msg}}</h2>
    @endif
    </body>
@endsection