<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            position: relative;
            min-height: 100vh;
            width: 100%;
            background-color: #aeaeae;
        }
        .sidebar {
            position: fixed;
            width: 280px;
            border-radius: 10px;
            top: 10px;
            margin-left: 10px;
            bottom: 20px;
            left: 10px;
            margin-bottom: 20px;
            background: #fff;
            opacity: 1;
            padding: 6px 16px;
            height: 97%;
            transition: all .3s ease-out;
        }
        .sidebar .logo_content .logo {
            display: flex;
            color: blue;
            height: 50px;
            width: 100%;
            line-height: 50px;
            text-align: center;
            font-size: 30px;
            font-weight: bold ;
            pointer-events: none;
            opacity: 1;
        }
        .sidebar .logo_content .logo .logo_name{
            font-size: 23px;
            font-size: 600;
            margin: 0 10px;
            transition: all .1s ease-out;
        }
        .sidebar #togle_nav {
            z-index: 999;
            position: absolute;
            color: black;
            left: 85%;
            font-size: 35px;
            height: 50px;
            text-align: center;
            line-height: 50px;
            transform: translate(45px, -75px);
            transition: all .2s ease-out;
        }
        .active {
            position: absolute;
            border-left: 3px solid black;
            right: 16px;
        }

        .sidebar i {
            height: 40px;
            min-width: 40px;
            border-radius: 8px ;
            line-height: 40px;
            text-align: center;
            font-size: 25px;
        }
        .sidebar.log_out {
            margin-top: 100px;
        }
        .sidebar ul {
            margin-top: 20px ;
        }
        .sidebar ul li {
            position: relative;
            height: 40px;
            width: 100%;
            margin: 0;
            list-style: none;
            line-height: 40px;
        }
        .sidebar ul li a{
            text-decoration: none;
            display: flex;
            color: #aeaeae;
        }
        .sidebar ul li a:hover{
            color: black;
        }
        .sidebar ul li .link {
            position: absolute;
            left: 100px;
            top :0;
            transform: translate(-45px, -10px);
            border-radius :15px 15px 15px 0;
            height: 40px;
            line-height: 40px;
            width: 130px;
            background: #fff;
            font-size :13px;
            display: block;
            text-align: center;
            color: black;
            box-shadow: 0 5px 10px black;
            box-sizing: border-box;
            pointer-events: none;
            opacity: 0;
            transition: all 0.5s ease-in-out;
        }
        .sidebar.nav_active ul li:hover .link {
            opacity: .5;
            top :-50%;
        }

        /* homeburger */
        .sidebar.nav_active  {
            width: 70px;
            transform: all translate;
            transition: all .3s ease-in;
        }
        .sidebar.nav_active .logo_content .logo{
            opacity: 1;
        }
        .sidebar.nav_active #togle_nav{
            left: 40%;
            transition: all .4s ease-in;
        }
        .sidebar.link_name {
            opacity: 1;
            pointer-events: none;
        }
        .sidebar.nav_active .link_name {
            opacity: 0;
            pointer-events: auto;
        }
        .sidebar.nav_active .logo_name {
            opacity: 0;
            transform: translate(-20px);
            position: absolute;
            pointer-events: auto;
            transition: all 1s ease-in;
        }

        .sidebar .link_log {
            opacity: 1;
        }
        .sidebar.nav_active .link_log {
            opacity: 0;
        }

        .content {
            position: absolute;
            height: 100%;
            width: calc(100% = 350px);
            left: 350px;
        }
        .content.nav_active{
            position: absolute;
            height: 100%;
            width: calc(100% = 350px);
            left: 0; 
        }

    </style>
  </head>
  <body>
    <div class="sidebar shadow">
        <!-- logo web -->
        <div class="logo_content">
            <div class="logo">
                <i class='bx bxs-dashboard'></i>
                <div class="logo_name"> ICT TIKET</div>
            </div>
        </div><hr>
        <i class='bx bx-menu-alt-right' id="togle_nav"></i>
        <!-- sidebar menu -->
        <ul class="nav">
            <li class="">
                <a href="">
                    <i class='shadow bx bxs-dashboard'></i>
                    <span class="link_name"> dashboard</span>
                </a>
                <span class="link"> Dashboard</span>
            </li>
            <li>
                <a href="">
                    <i class='shadow bx bx-import' ></i>
                    <span class="link_name">Tiket</span>
                </a>
                <span class="link">Tiket</span>
            </li>
            <li>
                <a href="">
                    <i class='shadow bx bx-user' ></i>
                    <span class="link_name"> Magang</span>
                </a>
                <span class="link"> Magang</span>
            </li>
            <br><br><br><br><br><br>

            <!-- footer -->
            <!-- <span class="link_name">
                <footer>by:pmy editz</footer>
            </span> -->
            <p style="width:100%; border-top:1px solid black;"></p>

            <li>
                <a href="">
                    <i class='bx bx-user' ></i>
                    <span class="link_name">Magang</span>
                </a>
            </li>
        </ul>


    </div>

    <div class="content mt-4">
        <h1>Halaman content</h1>
    </div>
    <script>
        const togle_nav = document.querySelector('#togle_nav');
        const sidebar = document.querySelector('.sidebar')
        togle_nav.onclick = function (){
            sidebar.classList.toggle('nav_active')
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>