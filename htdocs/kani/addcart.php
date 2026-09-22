<?php
    $servername = "localhost";
    $db_username = "root";
    $db_password = "rdbms";
    $database = "KANI";

    $conn=new mysqli($servername, $db_username, $db_password, $database);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kani</title>

    <link rel="website icon" type="png"  href="img/logo.png"  >
    <link href="css/bootstrap.min.css" rel="stylesheet">

   <style>
     body{
       overflow-x: hidden !important;
     }
     @media (min-width: 500px){
   body{
     overflow-x: hidden !important;
   }
} 

   </style>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
     <!--   --------------------------------------------------------------------------------- -->

     <div class="container-fluid fixed-top" style="background-color: orange;">
          
          <div class="container px-0">
              <nav class="navbar navbar-light  navbar-expand-xl">
                  <a href="index.html" class="navbar-brand"><h1 class="display-3 kani">kani<span class="h5 text-white subtitle" > Organic Fruits</span> <img width="150" height="150" class="img-fluid  logo" alt="Responsive image" style="position: absolute;left: 50px; top:3px; " src="img/logo.png" alt=""></h1></a>
                
                
                
                      <div class="navbar-nav mx-auto" style="position: absolute; right: 20px;">
                          <a href="index.html" class="nav-item nav-link active">Home</a>
                          <a href="shop.html" class="nav-item nav-link">Shop</a>
                        
                       
                          <a href="addcart.php" class="nav-item nav-link"><img src="img/buy.png" width="50" height="50"></a>
                      </div>
                 
                
              </nav>
          </div>
      </div>
           <!--   --------------------------------------------------------------------------------- -->
    
    <br><br> <br><br> <br><br>  <br><br>  <br><br> 
    
    
           <!--   --------------------------------------------------------------------------------- -->

           <table class="table align-middle mb-0 bg-dark  "  id="table" >
            <thead class="bg-dark">
              <tr>
                <th>Products</th>
                <th>Price / <span style="font-size: 10px; color: white;">kg</span></th>
             
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody >
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="img/a.jpg" 
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                    <div class="ms-3">
                      <p class="fw-bold mb-1 n1" id="named1">Apple</p>
                 
                    </div>
                  </div>
                </td>
                <td>
                  &#8360; <p class="fw-normal mb-1 1" id="numb1">100/-</p>
               
                </td>
          
                <td><button onclick="vis2()" style="background-color: orange;" type="button" class="btn btn-link btn-sm btn-rounded buy">
                    Buy now!!
                  </button></td>
                <td>
                <div id="incdec1">
                  <input type="button" onclick="decrementValue()" value="-" />
                  <input type="text" name="quantity" value="1" maxlength="2" max="10" size="1" id="number" />
                  <input type="button" onclick="incrementValue()" value="+" />
                </div>
                </td>
              </tr>



              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="img/o.jpg" 
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                    <div class="ms-3">
                      <p class="fw-bold mb-1 2" id="named2">Orange</p>
                 
                    </div>
                  </div>
                </td>
                <td>
                  &#8360;<p class="fw-normal mb-1 2"  id="numb2">200/-</p>
               
                </td>
            
                <td><button onclick="vis()" style="background-color: orange;" type="button" class="btn btn-link btn-sm btn-rounded buy">
                    Buy now!!
                  </button></td>
                <td>
                  <div id="incdec2">
                    <input type="button" onclick="decrementValue2()" value="-" />
                    <input type="text" name="quantity" value="1" maxlength="2" max="10" size="1" id="number2" />
                    <input type="button" onclick="incrementValue2()" value="+" />
                  </div>                </td>
              </tr>


              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="img/b.jpg" 
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                    <div class="ms-3">
                      <p class="fw-bold mb-1 3" id="named3">Banana</p>
                 
                    </div>
                  </div>
                </td>
                <td>
                  &#8360; <p class="fw-normal mb-1 3" id="numb3">50/-</p>
               
                </td>
            
                <td><button onclick="vis3()" style="background-color: orange;" type="button" class="btn btn-link btn-sm btn-rounded buy">
                    Buy now!!
                  </button></td>
                <td>
                  <div id="incdec3">
                    <input type="button" onclick="decrementValue3()" value="-" />
                    <input type="text" name="quantity" value="1" maxlength="2" max="10" size="1" id="number3" />
                    <input type="button" onclick="incrementValue3()" value="+" />
                  </div>
                </td>
              </tr>



              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="img/mo.jpg" 
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                    <div class="ms-3">
                      <p class="fw-bold mb-1 4" id="named4">
                        Mango</p>
                 
                    </div>
                  </div>
                </td>
                <td>
                  &#8360;  <p class="fw-normal mb-1 4" id="numb4">150/-</p>
               
                </td>
                
                <td><button onclick="vis4()" style="background-color: orange;" type="button" class="btn btn-link btn-sm btn-rounded buy">
                    Buy now!!
                  </button></td>
                <td>
                  <div id="incdec4">
                    <input type="button" onclick="decrementValue4()" value="-" />
                    <input type="text" name="quantity" value="1" maxlength="2" max="10" size="1" id="number4" />
                    <input type="button" onclick="incrementValue4()" value="+" />
                  </div>
                </td>
              </tr>


              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="img/p.jpg" 
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                    <div class="ms-3">
                      <p class="fw-bold mb-1 5" id="named5">
                        
                      Papaya</p>
                 
                    </div>
                  </div>
                </td>
                <td>
                  &#8360;  <p class="fw-normal mb-1 5" id="numb5">100/-</p>
               
                </td>
               
                <td><button onclick="vis5()" style="background-color: orange;" type="button" class="btn btn-link btn-sm btn-rounded buy">
                    Buy now!!
                  </button></td>
                <td>
                  <div id="incdec5">
                    <input type="button" onclick="decrementValue5()" value="-" />
                    <input type="text" name="quantity" value="1" maxlength="2" max="10" size="1" id="number5" />
                    <input type="button" onclick="incrementValue5()" value="+" />
                  </div>
                </td>
              </tr>



              

              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="img/wt.jpg" 
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                    <div class="ms-3">
                      <p class="fw-bold mb-1 6">
                       
                      Watermelon</p>
                 
                    </div>
                  </div>
                </td>
                <td>
                  &#8360;  <p class="fw-normal mb-1 6" id="numb6">300/-</p>
               
                </td>
             
                <td><button onclick="vis6()" style="background-color: orange;" type="button" class="btn btn-link btn-sm btn-rounded buy">
                    Buy now!!
                  </button></td>
                <td>
                  <div id="incdec6">
                    <input type="button" onclick="decrementValue6()" value="-" />
                    <input type="text" name="quantity" value="1" maxlength="2" max="10" size="1" id="number6" />
                    <input type="button" onclick="incrementValue6()" value="+" />
                  </div>
                </td>
              </tr>


              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="img/ga.jpg" 
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                    <div class="ms-3">
                      <p class="fw-bold mb-1 7">
                       
                      
                    Greenapple</p>
                 
                    </div>
                  </div>
                </td>
                <td>
                  &#8360;  <p class="fw-normal mb-1 7" id="numb7">200/-</p>
               
                </td>
         
                <td><button onclick="vis7()" style="background-color: orange;" type="button" class="btn btn-link btn-sm btn-rounded buy">
                    Buy now!!
                  </button></td>
                <td>
                  <div id="incdec7">
                    <input type="button" onclick="decrementValue7()" value="-" />
                    <input type="text" name="quantity" value="1" maxlength="2" max="10" size="1" id="number7" />
                    <input type="button" onclick="incrementValue7()" value="+" />
                  </div>
                </td>
              </tr>


              
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="img/gr.jpg" 
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                    <div class="ms-3">
                      <p class="fw-bold mb-1 8">
                       
                      
                    
Grapes</p>
                 
                    </div>
                  </div>
                </td>
                <td>
                  &#8360;  <p class="fw-normal mb-1 8" id="numb8">60/-</p>
               
                </td>
               
                <td><button onclick="vis8()" style="background-color: orange;" type="button" class="btn btn-link btn-sm btn-rounded buy">
                    Buy now!!
                  </button></td>
                <td>
                  <div id="incdec8">
                    <input type="button" onclick="decrementValue8()" value="-" />
                    <input type="text" name="quantity" value="1" maxlength="2" max="10" size="1" id="number8" />
                    <input type="button" onclick="incrementValue8()" value="+" />
                  </div>
                </td>
              </tr>



              
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="img/pa.jpg" 
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                    <div class="ms-3">
                      <p class="fw-bold mb-1 9">
                       
                      
                    

                        
Pineapple</p>
                 
                    </div>
                  </div>
                </td>
                <td>
                  &#8360;  <p class="fw-normal mb-1 9" id="numb9">100/-</p>
               
                </td>
             
                <td><button onclick="vis9()" style="background-color: orange;" type="button" class="btn btn-link btn-sm btn-rounded buy">
                    Buy now!!
                  </button></td>
                <td>
                  <div id="incdec9">
                    <input type="button" onclick="decrementValue9()" value="-" />
                    <input type="text" name="quantity" value="1" maxlength="2" max="10" size="1" id="number9" />
                    <input type="button" onclick="incrementValue9()" value="+" />
                  </div>
                </td>
              </tr>


              

              
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="img/m.jpg" 
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                    <div class="ms-3">
                      <p class="fw-bold mb-1 10">
                       
                      
                    

                        Pomegranate</p>
                 
                    </div>
                  </div>
                </td>
                <td>
                  &#8360; <p class="fw-normal mb-1 10" id="numb10">200/-</p>
               
                </td>
               
                <td><button onclick="vis10()" style="background-color: orange;" type="button" class="btn btn-link btn-sm btn-rounded buy">
                    Buy now!!
                  </button></td>
                <td>
                  <div id="incdec10">
                    <input type="button" onclick="decrementValue10()" value="-" />
                    <input type="text" name="quantity" value="1" maxlength="2" max="10" size="1" id="number10" />
                    <input type="button" onclick="incrementValue10()" value="+" />
                  </div>
                </td>
              </tr>




              
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="img/ko.jpg" 
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                    <div class="ms-3">
                      <p class="fw-bold mb-1  11">
          
                      Guava</p>
                 
                    </div>
                  </div>
                </td>
                <td>
                  &#8360;  <p class="fw-normal mb-1 11" id="numb11">120/-</p>
               
                </td>
             
                <td><button onclick="vis11()" style="background-color: orange;" type="button" class="btn btn-link btn-sm btn-rounded buy">
                    Buy now!!
                  </button></td>
                <td>
                  <div id="incdec11">
                    <input type="button" onclick="decrementValue11()" value="-" />
                    <input type="text" name="quantity" value="1" maxlength="2" max="10" size="1" id="number11" />
                    <input type="button" onclick="incrementValue11()" value="+" />
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="img/jk.jpg" 
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                    <div class="ms-3">
                       
               
                      <p class="fw-bold mb-1 12">
          
                        Jackfruit</p>
                        
                 
                    </div>
                   
                  </div>
                 
                </td>
                <td>
                  &#8360;  <p class="fw-normal mb-1 12" id="numb12">200/-</p>
               
                </td>
            
                <td><button onclick="vis12()" style="background-color: orange;" type="button" class="btn btn-link btn-sm btn-rounded buy">
                    Buy now!!
                  </button></td>
                <td>
                  <div id="incdec12">
                    <input type="button" onclick="decrementValue12()" value="-" />
                    <input type="text" name="quantity" value="1" maxlength="2" max="10" size="1" id="number12" />
                    <input type="button" onclick="incrementValue12()" value="+" />
                  </div>
                </td>
              </tr>


              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="img/c.jpg" 
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                    <div class="ms-3">
                       
               
                      <p class="fw-bold mb-1 12">
          
                        Cherries</p>
                        
                 
                    </div>
                   
                  </div>
                 
                </td>
                <td>
                  &#8360;  <p class="fw-normal mb-1 13" id="numb13">220/-</p>
               
                </td>
            
                <td><button onclick="vis13()" style="background-color: orange;" type="button" class="btn btn-link btn-sm btn-rounded buy">
                    Buy now!!
                  </button></td>
                <td>
                  <div id="incdec13">
                    <input type="button" onclick="decrementValue13()" value="-" />
                    <input type="text" name="quantity" value="1" maxlength="2" max="10" size="1" id="number13" />
                    <input type="button" onclick="incrementValue13()" value="+" />
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="img/r.jpg" 
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                    <div class="ms-3">
                       
               
                      <p class="fw-bold mb-1 12">
          
                        Raspberries</p>
                        
                 
                    </div>
                   
                  </div>
                 
                </td>
                <td>
                  &#8360;  <p class="fw-normal mb-1 13" id="numb14">170/-</p>
               
                </td>
            
                <td><button onclick="vis14()" style="background-color: orange;" type="button" class="btn btn-link btn-sm btn-rounded buy">
                    Buy now!!
                  </button></td>
                <td>
                  <div id="incdec14">
                    <input type="button" onclick="decrementValue14()" value="-" />
                    <input type="text" name="quantity" value="1" maxlength="2" max="10" size="1" id="number14" />
                    <input type="button" onclick="incrementValue14()" value="+" />
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="img/st.jpg" 
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                    <div class="ms-3">
                       
               
                      <p class="fw-bold mb-1 12">
          
                        strawberry</p>
                        
                 
                    </div>
                   
                  </div>
                 
                </td>
                <td>
                  &#8360;  <p class="fw-normal mb-1 13" id="numb15">240/-</p>
               
                </td>
            
                <td><button onclick="vis15()" style="background-color: orange;" type="button" class="btn btn-link btn-sm btn-rounded buy">
                    Buy now!!
                  </button></td>
                <td>
                  <div id="incdec15">
                    <input type="button" onclick="decrementValue15()" value="-" />
                    <input type="text" name="quantity" value="1" maxlength="2" max="10" size="1" id="number15" />
                    <input type="button" onclick="incrementValue15()" value="+" />
                  </div>
                </td>
              </tr>



            </tbody>
          </table>

      <!--   --------------------------------------------------------------------------------- -->
     <br><br>
     
     <center id="login">
  <div class="card-body col-md-6">
      
      <h2>Shopping  Details</h2>
      <br>
      <form id="detailsForm" action="" method="post">
          <label for="name" class="in" >Name:</label>
          <input type="text" id="name" name="name" placeholder="Enter your name...">
          <div class="error" id="nameError"></div>
          <br><br>
          <label for="email" class="in" >Email:</label>
          <input type="email" id="email" name="email" placeholder="Enter your email...">
          <div class="error" id="emailError"></div>
          <br><br>
          <label for="age" class="in" >Phone number</label>
          <input type="number" id="phn" name="phn" placeholder="Enter your phone number...">
          <div class="error" id="phnError"></div>
          <br><br>
          <label for="state">State:</label>
          <input type="text"  id="state" name="state" placeholder=" Enter state" required>
          <div class="error" id="stError"></div>
          <br>
          <label for="city">City:</label>
         <input type="text"  id="city" name="city" placeholder="Enter city" required>
         <div class="error" id="ciError"></div>
          <br>
          <label for="area" class="in"> Address</label>
          <input type="text" id="addr" name="addr" placeholder="Enter your Address" required>
          <div class="error" id="addError"></div>
          <br>
          <br>

          <div id="date" name="date" style="color:gray;">
            <?php
            $date=date("Y/m/d");
            echo "Date: " . $date . "<br>";
            ?>
          </div>
          <div id="date" name="time" style="color:gray;">
            <?php
            $time=date('H:i:s');
            echo "Time: " . $time . "<br>";
            ?>
          </div>
          <br>
          <br>
       <a href="index.html">  <button type="submit" onclick="validateForm()"  name="submitform">Submit</button></a> 
      </form>
      <?php
      if(isset($_POST['submitform'])){
        $U_Name=$_POST['name'];
        $U_Email=$_POST['email'];
        $U_Phone=$_POST['phn'];
        $U_State=$_POST['state'];
        $U_City=$_POST['city'];
  $U_Address=$_POST['addr'];
  $U_Date=date("Y/m/d");
  $U_Time=date('H:i:s');


  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

 
  $query = $conn->prepare("INSERT INTO list_user (u_name, u_email, u_phone_no, u_state, u_city, u_address, p_date, p_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  $query->bind_param("ssisssss", $U_Name, $U_Email, $U_Phone, $U_State, $U_City, $U_Address, $U_Date, $U_Time);

 
  $result = $query->execute();

 
  if (!$result) {
    echo "Error: " . $conn->error;
  } 
else{
  echo '<br><a href="Ex10.php">View details</a>';
}

  $conn->close();
}
?>


      
  </div>
</center>
<br>



</div>

<!--
<div id="show">
  <div class="bg-white container be col-md-6">

    <div>
      <img src="img/logo2.png" class="img-fluid" width="100" height="100" alt="">
        <h1>Order Deteils</h1><hr>
    </div>
    <div class="form-group">
        <label for="NAME" class="small  text-dark mb-1">NAME:</label><span id="na" class="shbe"  ></span>
       
<br><br>
      </div>
 <div class="form-group">
        <label for="NAME"  class="small text-muted mb-1">PHONE NUMBER:</label><span id="phnum"  class="shbe"   ></span>
       
    
      </div>
      <br><br>
      <div class="form-group">
        <label for="NAME" class="small text-muted mb-1">Eamil:</label><span id="ema"  class="shbe"  ></span>
      </div><br><br>


      <div class="row no-gutters">
        <div class="col-sm-6 pr-sm-2">
            <div class="form-group">
                <label for="NAME" class="small text-muted mb-1">STATE:</label><span id="sta" class="shbe"   ></span>
            </div>
        </div><br><br>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="NAME" class="small text-muted mb-1">CITY:</label><span id="cit"  class="shbe"   ></span>
            </div>
        </div><br><br>
        <div class="col-sm-6">
          <div class="form-group">
              <label for="NAME" c  lass="small text-muted mb-1">ADDRESS:</label><span id="ad"  class="shbe"   ></span>
          </div>



          <div id="date" style="color:black;">
        <?php
        echo "Date: " . date("Y/m/d") . "<br>";
        
        ?>
        </div>

        <div id="date" style="color:black;">
        <?php
        echo "Time: " . date('H:i:s') . "<br>";
      
        ?>
        </div>
        <?php
          if(isset($_POST['submtform'])){
          $name = $_POST['name'];
          echo "Hi". $name;
          }
      ?>

      </div><br><br>         <a href="index.html" class="container  success" style="text-decoration: none !important; "><button type="button" style="height: 100px; width: 508px; margin-left: -15px; background-color: orange !important; border-radius: 10px !important;" >Order Successfully!!</button></a>
    
    
    
     -->


    </div>
   <script src="js/php.js"></script>
</div>




</div>
<div class="container bg-white " id="vipr">
  <div  class="container" id="name1">Apple <div id="n1"></div><span>Kg.</span></div>
  <div  class="container" id="name2">orange <div id="n2"></div><span>Kg.</span></div>
  <div  class="container" id="name3">Apple <div id="n3"></div><span>Kg.</span></div>
  <div  class="container" id="name4">Apple <div id="n4"></div><span>Kg.</span></div>
  <div  class="container" id="name5">Apple <div id="n5"></div><span>Kg.</span></div>
 

</div>


                <!--   --------------------------------------------------------------------------------- -->
         
               
                <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
                  <div class="container py-5">
                      <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(245, 185, 4, 0.5) ;">
                          <div class="row g-4">
                              <div class="col-lg-3">
                                  <a href="#">
                                      <h1 class="text-primary mb-0"><img src="img/logo2.png" class="img-fluid" width="250" height="250" alt=""></h1>
                                 
                                  </a>
                              </div>
                              <div style="background-color: rgb(43, 42, 42); padding: 10px; border-radius: 15px;">
                        <img src="img/05.jpg" style="width: 50px; height: 50px;" alt=""><a href="Ex10.php" style="padding: 10px;color: white;">View Your details</a>
                       </div>
                             
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-6 col-md-6">
                              <div class="footer-item">
                                  <h4 class="text-light ">Why People Like us!</h4>
                                  <p class="mb-4">As you step through the doors of Sunshine Fruits, you're greeted by a symphony of colors, an array of fruits meticulously arranged like pieces of a living artwork. From the radiant hues of ripe strawberries to the verdant green of crisp apples, each fruit seems to whisper tales of the sun-kissed orchards from which they were plucked.</p>
      
                              </div>
                          </div>
                 
                          <div class="col-lg-3 col-md-6">
                              <div class="d-flex flex-column text-start footer-item">
                                  <h4 class="text-light mb-3">Create by  <span class="h6">  <br>Web Designing</span> </h4>
                                  <a class="btn-link" target="_blank" href="https://www.instagram.com/drawing_with_aswin/"> ASWIN KUMAR</a>
                                  <a class="btn-link"  target="_blank" href="https://www.instagram.com/havoc___gokul/">MUTHU GOKUL </a>          
                                  <a class="btn-link"  target="_blank" href="https://www.instagram.com/devilboy_.06._/">KISHOREKANNAN </a>
                                  <a class="btn-link"  target="_blank" href="https://www.instagram.com/sarathin13/">SARATHI </a>
                                  <a class="btn-link"  target="_blank" href="https://www.instagram.com/lakshminarayanan159/">BALAMURUGAN</a>
                                                  
                            
                              </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                              <div class="footer-item">
                                  <h4 class="text-light mb-3">Contact</h4>
                                  <p>Address: Tamilnadu Government Polytechnic College,
                                      T.P.K Main Road,
                                      Madurai - 625011 </p>
                                  <p>Email: <span class="" style="font-size: 12px;">web_design@gmail.com</span></p>
                                  <p>Phone: 91+ 9361109518</p>
                         
                        
                              </div>
                          </div>
                      </div>
      
      
                      </div>
                  </div>
      
              </div>
                      <!--   --------------------------------------------------------------------------------- -->
        
        
   
 
             
           <script src="js/script.js"></script> <script src="js/cart.js"></script>  <script src="js/click.js"></script>   <script src="js/incdec.js"></script>
</body>
</html>