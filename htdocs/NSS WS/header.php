<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Volunteer</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="bootstrap.min.css">
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

        .image button{
            width: 1px !important;
            padding: 0px !important;
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
            width: 270px;
            overflow: hidden;
            left: -270px;
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
            padding-left: 0px ;
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

        .dash,
        .dash2 {
            position: relative;
            left: 200px;
            bottom: 120px;
            margin-right: 20px;
        }

        #count1 {
            position: relative;
            left: 200px
        }

        /* For small devices (phones, less than 768px) */
        @media only screen and (max-width: 767px) {
            .wrapper {
                margin-top: -75px !important;
            }

            /* Styles for small devices */
            .tit {
                display: block !important;
            }

            .dash {
                position: absolute !important;
                left: 100px !important;
                top: -380px !important;
            }

            .dash2 {
                position: absolute !important;
                left: 100px !important;
                top: -100px !important;
            }

            .dash,
            .dash2 {
                width: 250px;
                height: 200px;
            }

            #count1 {
                position: relative !important;
                left: 10px !important;
            }

            #count2 {
                position: relative !important;
                left: 10px !important;
            }
        }
    </style>