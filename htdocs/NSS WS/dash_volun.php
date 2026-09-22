<?php
session_start(); // Start the session at the very beginning
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Volunteer</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #000000;
        }

        .wrapper {
            height: 100%;
            width: 300px !important;
            position: relative;
        }

        .menu-btn {
            position: absolute;
            left: 20px;
            top: 10px;
            background: #024950;
            color: #fff;
            height: 45px;
            width: 45px;
            z-index: 9999;
            border: 1px solid #0a4147;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        #btn:checked~.menu-btn {
            left: 247px;
        }

        .menu-btn i {
            position: absolute;
            font-size: 23px;
            transition: all 0.3s ease;
        }

        .menu-btn i.fa-times {
            opacity: 0;
        }

        #btn:checked~.menu-btn i.fa-times {
            opacity: 1;
            transform: rotate(-180deg);
        }

        #btn:checked~.menu-btn i.fa-bars {
            opacity: 0;
            transform: rotate(180deg);
        }

        #sidebar {
            position: fixed;
            background: #404040;
            height: 100%;
            width: 320px;
            overflow: hidden;
            left: -320px;
            transition: all 0.3s ease;
        }

        #btn:checked~#sidebar {
            left: 0;
        }

        #sidebar .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #024950;
            color: #fff;
            height: 45px;
            width: 45px;
            z-index: 10000;
            border: 1px solid #0a4147;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        #sidebar .title {
            line-height: 65px;
            text-align: center;
            background: #003135;
            font-size: 25px;
            font-weight: 600;
            color: #f2f2f2;
            border-bottom: 1px solid #222;
        }

        #sidebar .list-items {
            position: relative;
            background: #024950;
            width: 100%;
            height: 100%;
            list-style: none;
        }

        #sidebar .list-items li {
            line-height: 50px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            border-bottom: 1px solid #333;
            transition: all 0.3s ease;
        }

        #sidebar .list-items li:hover {
            border-top: 1px solid transparent;
            border-bottom: 1px solid transparent;
            box-shadow: 0 0px 10px 3px #222;
        }

        #sidebar .list-items li:first-child {
            border-top: none;
        }

        #sidebar .list-items li a {
            color: #f2f2f2;
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
            height: 100%;
            width: 100%;
            display: block;
        }

        #sidebar .list-items li a i {
            margin-right: 20px;
        }

        #sidebar .list-items .icons {
            width: 100%;
            height: 40px;
            text-align: center;
            position: absolute;
            bottom: 100px;
            line-height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #btn:checked~.menu-btn {
            display: none;
        }

        #sidebar .list-items .icons a {
            height: 100%;
            width: 40px;
            display: block;
            margin: 0 5px;
            font-size: 18px;
            color: #f2f2f2;
            background: #095b63;
            border-radius: 5px;
            border: 1px solid #09484f;
            transition: all 0.3s ease;
        }

        #sidebar .list-items .icons a:hover {
            background: #124045;
        }

        .list-items .icons a:first-child {
            margin-left: 0px;
        }

        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            z-index: -1;
            width: 100%;
            text-align: center;
        }

        .content .header {
            font-size: 45px;
            font-weight: 700;
        }

        .content p {
            font-size: 40px;
            font-weight: 700;
        }

        .img-sim {
            margin: 30px;
        }

        .org h3 {
            color: black;
            margin-bottom: -15px;
            margin-top: 50px;
            position: relative;
            top: 10px;
        }

        .org {
            width: 100%;
            height: 180px;
            background-color: white;
        }

        .dash {
            margin-top: 200px;

        }

        .dash2 {
            margin-top: 200px;
        }

        .dash,
        .dash2 {
            position: relative;
            left: 100px;
            bottom: 120px;
            margin-right: 20px;
            border-radius: 8px;
            border: 3px solid blue;
            background-color: #024950;
            width: 300px;
            height: 160px;
        }

        #count1 {
            position: relative;
            left: 200px
            color:orange !important;
        }

        .foot-ar {
            position: relative;
            left: -11px;
            top: 15px;
            width: 108%;
            border-radius: 0px 0px 3px 3px;
        }

        @media only screen and (min-width: 767px) and (max-width: 1200px) {
            .tit {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 767px) {
            .dash,
            .dash2 {
                width: 120px !important;
                height: 180px !important;
                margin-top: 20px;
                margin-bottom: 20px;
                left: 50%;
                transform: translateX(-50%);
            }

            .small-box h4 {
                font-size: 15px;
            }

            #count1 {
                position: relative !important;
                left: unset !important;
                text-align: center;
            }

            #count2 {
                position: relative !important;
                left: unset !important;
                text-align: center;
            }

            .org {
                height: 100px;
                position: relative;
                top: 100px;
                left: 0px;
                width: 100%;
                text-align: center;
            }

            .img-sim {
                width: 30px;
                height: 50px;
                display: inline-block;
                margin: 10px 5px;
            }

            .foot-ar {
                position: relative;
                left: -10px;
                top: 20px;
                width: 100%;
                text-align: center;
            }
            .row{
                margin-left:-150px !important;
                margin-top:250px;
            }
            .foot-ar{
                width: 122% !important;
                margin-top:20px !important; 
                height:35px;  
            }
            .ar2{
margin-top:-18px !important;            
}

#sidebar{
            margin-top:15px;
        }
        }
      
        @media (max-width: 570px) {
            .tit{font-size:25px !important;}
            .menu-btn{margin-top:-0px !important;}
            .container{
             
             overflow-x:hidden !important;
            }
            
            #sidebar{margin-top:-15px !important;}
    .text-success{margin-left:80px !important;}
        }
        .text-success{margin-left:10px !important;}
        .menu-btn{margin-top:15px !important;}

    </style>
</head>

<body>
<?php
    // To include navigations
    include 'header2.php';
    ?>
<?php
    // To include navigations
    include 'slide.php';
    ?>
    </div>

    <!-- Main content -->
    <section class="content" style="background:rgb(48, 47, 47); overflow-x:hidden !important;">
        <!-- Small boxes (Stat box) -->
        <div class="row" >
            <div class="col-lg-3 col-xs-6 dash" style="   background-color: rgb(32, 32, 32); border:1px solid orange !important;">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <h4 style="padding: 5px;margin-left:-5px; position:relative; top: 15px; ">No of Events Complted Successfully</h4>
                    <div class="inner">
                        <div class="col-md-4">
                            <span id="count1" style="position: relative; top: 15px; color:orange !important; " class="display-6 text-success"></span>
                        </div>
                        <div
                            style="font-size: larger;font-weight: bolder;color:orange !important;float:right;">
                        </div>
                    </div>
                    <div class="bg-black foot-ar">
                        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6 dash2" style="background-color: rgb(32, 32, 32);border:1px solid orange !important;">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <h4 style="padding: 5px;margin-left:-5px; margin-top: 2px; ">No of Volunteers in this Academic Year</h4>
                    <div class="inner">
                        <div class="col-md-4">
                            <span style="position: relative; top:-10px; color:orange !important;" id="count2" class="display-6 text-success"></span>
                        </div>
                        <div
                            style="font-size: larger;font-weight: bolder;color: rgb(244, 232, 255);float:right;">
                        </div>
                    </div>
                    <div class="bg-black foot-ar ar2">
                        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="org">
            <h3> Similar Organizations </h5>
            <img src="img/YRC1.png" width="130px" height="120px" class="img-sim">
            <img src="img/RRC.png" width="100px" height="100px" class="img-sim">
            <img src="img/NCC.png" width="100px" height="100px" class="img-sim">
        </div>
    </section>

    <!-- /.content -->
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qLknQowJiAIvOgBde05Z3lK5nrOl1s6HgCqKKhzz2D6rh7XjL5UUzKJ3PaDpT8C5"
        crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            function counter(id, start, end, duration) {
                let obj = document.getElementById(id),
                    current = start,
                    range = end - start,
                    increment = end > start ? 1 : -1,
                    step = Math.abs(Math.floor(duration / range)),
                    timer = setInterval(() => {
                        current += increment;
                        obj.textContent = current;
                        if (current == end) {
                            clearInterval(timer);
                        }
                    }, step);
            }
            counter("count1", 0, 400, 3000);
            counter("count2", 0, 50, 2500);
        });
    </script>

</body>

</html>
