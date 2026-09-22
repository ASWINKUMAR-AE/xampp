<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/responsive.css">
      
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRAWING WITH ASWIN</title>
    <style>
body{
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
}
#algn{
    height: 92vh;
    min-height: 500px;
    display: flex;
    justify-content: center;
    align-items: center;
}

#card{
    width: 370px;
    height: 435px;
    border: none;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 8px 0 black, 0 6px 20px 0 black;
}

#upper-bg{
    width: 100%;
    height: 35%;
    background-color: #2166b6;
    display: flex;
    justify-content: center;
    position: relative;
}

.profile-pic{
    width: 35%;
    background-color: white;
    border: 3px solid #2166b6;
    border-radius: 50%;
    padding: 3px;
    position: absolute;
    top: 40px;
}

#lower-bg{
    width: 100%;
    height: 65%;
}

.text{
    text-align: center;
    padding-top: 35px;
}

.text .name{
    font-weight: 600;
    font-size: large;
    padding: 0;
    margin: 5px;
}

.text .title{
    padding: 0;
    margin: 0;
    font-size: 15px;
}

#icons{
    display: flex;
    justify-content: center;
    margin: 15px;
}

#icons img{
    width: 80%;
    height: 90%;
}

.ico{
    display: flex;
    justify-content: center;
    align-items: center;
}

#btn{
    display: flex;
    justify-content: center;
    margin: 15px;
}

#btn button{
    margin: 0 20px;
    padding: 10px 15px;
    background-color: #2166b6;
    border: none;
    color:white;
    border-radius: 50px;
    font-weight: 700;
}

#btn button:hover{
    box-shadow: 0 4px 8px 0 black, 0 6px 20px 0 black;
    transition:2s;
    transform:scale(1.1);
    background-color: blue;
}

#l-c-s{
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    margin: 20px 10px;
}

#l-c-s .num{
    display: flex;
}

#l-c-s .dvr{
    width: 2px;
    height: 25px;
    background-color: gray;
}

#l-c-s img{
    width: 24px;
    height: 24px;
}

.license{
    font-size: 12px;
    text-align: center;
}

.license .ll{
    padding: 0 10px;
    display: inline;
}
    </style>
</head>
<body>
<?php  include 'header.php'; ?>
<br><br><br><br>
    <div id="algn">
        <div id="card">
            <div id="upper-bg">
                <img src="images/logo.png" alt="profile-pic" class="profile-pic">
            </div>
            <div id="lower-bg">
              <div class="text">
                <p class="name">MANI</p>
                <p class="title">computer services & <br> billing software</p>
              </div>
              <div id="icons">
                <a href="#" class="ico"><img width="48" height="48" src="https://img.icons8.com/color/48/gmail-new.png" alt="gmail-new"/></a>
                <a href="#" class="ico">
                  <img width="48" height="48" src="https://img.icons8.com/fluency/48/github.png" alt="instagram"/>
                </a>
                <a href="#" class="ico">
                  <img width="48" height="48" src="https://images.app.goo.gl/xqh9LvAdTCq1S9hu6" alt="linkedin"/>
                </a>
                <a href="#" class="ico">
                  <img width="48" height="48" src="https://img.icons8.com/color/48/facebook-new.png" alt="facebook-new"/>
                </a>
              </div>
              <div id="btn">
                <button class="msg">Subscribe</button>
                <a href=""><button class="msg" >Message</button></a>
              </div>
              
              </div>
            </div>
        </div>
        </div>
        <?php include 'footer.php'; ?>

</body>
</html>