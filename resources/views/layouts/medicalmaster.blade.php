<html>
<head>
    <link rel="stylesheet" a href="public/css/main.css" type="text/css">

</head>
<body>
<div id="main">
    <div id="wrapper">
        <div id="header">
            <img src="../../../../p/public/css/images/medimg.png" style="height: 150px; width: 500px;" >
            <img src="../../../../p/public/css/images/10.jfif" style="height: 150px; width: 450px; margin-left: 40px" >


        </div>
        <div id="menu">
            <ul id="list">
                <li><a href="medhome">Home</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="medpass">Change Password</a></li>
                <li><a href="medireg">Add Medicine</a></li>
                <li><a href="manage">Manage Medicine</a></li>
                <li><a href="index">Logout</a></li>
            </ul>

        </div>
        <div id="middle">
            <div id="content">
                @yield('m1')


            </div>

            <div id="ad">
                <!-- <img src="../../../../p3/public/css/images/ball.jpg" height="500px" width="280px" STYLE="border-radius: 30px">-->

            </div>
        </div>

        <div id="bottom">
            Copyright &copy; 2019, All right reserved Sheenam.

        </div>
    </div>
</div>
</body>