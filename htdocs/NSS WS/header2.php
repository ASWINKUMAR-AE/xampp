<div class="col-12">
    <h1 class="tit ">
      <span style="color: orange;">N</span>ational <span style="color: orange;">S</span>ervice <span style="color: orange;">S</span>cheme <span style="font-size:15px; color:orange;"> TNGPTC </span>
      <img src="img/nss.png" width="50" height="50" style="background-color:white; border-radius:50%; float:right; margin-right:20px;">
    </h1>
  </div>  <style> 
    .tit {
      color: white;
      position: relative;
      text-align: center;
      padding-top: 15px;
      padding-bottom: 20px;
      background-color: rgb(32, 32, 32) !important;
    }    * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        /* @media (max-width: 570px) {
    .container {
        margin-left: 10px !important;
        margin-right: 10px !important;
    }
    #sidebar{margin-top:-120px !important;}
}
.menu-btn{margin-top:-90px;}
#sidebar{margin-top:-90px;} */

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
      

    </style>