<html>
<head>
    <link rel="stylesheet" a href="public/css/main.css" type="text/css">
    <style>
        #menu{
            height: 60px;
            z-index:5;
            position:relative;
        }
        #u2
        {
            list-style: none;
            margin-left:-49px;
            display:none;
        }
        #u2 li
        {
            background:#000;
        }
        #u1:hover #u2
        {
            display:block;
        }

    </style>
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
                <li><a href="admin_home">Home</a></li>
                <li><a href="adminprofile">Profile</a></li>
                <li><a href="change">Change Password</a></li>
                <li id="u1"><a href="#">New</a>
                    <ul id="u2">
                        <li><a href="admin_reg">Admin</a></li>
                        <li><a href="medreg">Medical</a></li>
                    </ul>
                </li>
                <li id="u1"><a href="#">Show</a>
                    <ul id="u2">
                        <li><a href="show">Admin</a></li>
                        <li><a href="showmed">Medical</a></li>
                    </ul>
                </li>
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