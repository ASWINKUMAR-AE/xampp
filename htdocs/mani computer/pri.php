<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>Mani Computer</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/responsive.css">
      <style>
         body {
            color: #666666;
            background-color: rgb(41, 40, 40) !important;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            line-height: 1.80857;
            font-weight: normal;
         }
         .serimg:hover {
            transform: scale(1.2) !important;
         }
         .btn {
            transition: all 2s !important;
            background-color: #0077ff !important;
         }
         .btn:hover {
            background-color: orange !important;
         }
         .cta {
            position: relative;
            margin: auto;
            transition: all 0.2s ease;
            border: none;
            background: none;
            cursor: pointer;
         }
         .cta:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            border-radius: 50px;
            background: #166dd1;
            width: 45px;
            height: 45px;
            transition: all 0.3s ease;
         }
         .cta span {
            position: relative;
            font-family: "Ubuntu", sans-serif;
            font-size: 18px;
            font-weight: 300;
            color: orange !important;
         }
         .cta svg {
            position: relative;
            top: 0;
            margin-left: 10px;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke: #234567;
            stroke-width: 2;
            transform: translateX(-5px);
            transition: all 0.3s ease;
         }
         .cta:hover:before {
            width: 100%;
            background: rgb(41, 40, 40);
         }
         .cta:hover svg {
            transform: translateX(0);
         }
         .cta:active {
            transform: scale(0.95);
         }
      </style>
   </head>
   <body class="main-layout">
      <?php include 'header2.php'; ?>
      <div class="container-fluid hbg page-header mb-5 wow fadeIn" style="background-image:url(images/ser.jpg); border-bottom: 1px solid orange !important; background-position-x:40%; border-radius:0px !important;" data-wow-delay="0.1s">
         <div class="container text-center">
            <h1 class="display-5 text-white animated slideInDown mb-4" style="float:right; margin-top:-25px;text-align: right;">
               <span style="color:#0077ff;">Printer</span>  
               <span  style="color:#2166b6;">Repair</span>
               <br>
            </h1>
         </div>
      </div>
      <div class="container-fluid donate my-5 py-5" data-parallax="scroll" data-image-src="img/carousel-2.jpg" style="background-color:black !important;">
         <div style="float:right;" class="col-5 text-secondary">
            <h2 class="text-white" style="font-size: 1.5rem;">
               <span style="color:orange;">12+ Years</span> Of
               Working Experience In
               Printer Repair Services
               <br> <br>
               <h4 class="text-secondary des" style="font-size: 1.1rem;">
                  We have been in the repair and service business since 2014. We have 
                  experienced service department ready to handle all of your repair tasks. 
                  Whether you need a fixing or customization, our team will get your device 
                  with guarantee.
               </h4>
            </h2>
         </div>
         <div class="container py-5">
            <div class="row g-5 align-items-center">
               <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                  <h1 class="display-6 text-white mb-5" style="font-size: 2rem;">
                     Service <span style="color:gray; font-family:Brush Script MT; font-size: 1.5rem;">Your</span> 
                     <span style='color:orange !important;font-family:sans-serif !important; font-size: 2rem;'>Printer</span>
                  </h1>
                  <button class="cta" style="height:50px; font-size: 1.5rem;" onclick="document.getElementById('myModal').style.display='block'">
                     <span style="font-size: 1.5rem;">Click here!!!</span>
                     <svg width="15px" height="10px" viewBox="0 0 13 10" style="font-size: 1.5rem;">
                        <path d="M1,5 L11,5"></path>
                        <polyline points="8 1 12 5 8 9"></polyline>
                     </svg>
                  </button>
                  <!-- The Modal -->
                  <div id="myModal" class="modal">
                     <!-- Modal content -->
                     <div class="modal-content" style="background-color: #212529; color: white;">
                        <div class="modal-header">
                           <h5 class="modal-title text-white">Contact Us</h5>
                           <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close" style="border: none !important;">
                           <span aria-hidden="true" style="color: red;">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <p style="width:80%;">Phone : <a href="https://api.whatsapp.com/send?phone=919943564634&text=Need%20Printer%20service" style="text-decoration:none; color: white;" target="_blank"><span class="text-muted phonenumber">+91 999 436 4634 </span> </a>
                              <button type="button" class="btn btn-secondary phonenumber-btn ml-2" style="width:50px; height:25px; display:inline-flex; justify-content:center; align-items:center;" onclick="copyToClipboard('+91 999 436 4634')">Copy </button>
                           </p>
                           <p style="width:80%;">Email : <span class="text-muted emailid">support@manicomputer.in</span> 
                              <button type="button" class="btn btn-secondary emailid-btn ml-2" style="width:50px; height:25px; display:inline-flex; justify-content:center; align-items:center;" onclick="copyToClipboard('support@manicomputer.in')">Copy </button>
                           </p>
                           <p style="width:80%;">Address :<a href="https://maps.app.goo.gl/Kc3S2KRoRF3qqYMj9" target="_blank"><span class="text-muted address">Bus Stand, Friend Mahal Koodal Alagar Perumal Kovil, Sannathi St, near Periyar, Madurai, Tamil Nadu 625001</span></a> 
                           </p>
                        </div>
                     </div>
                  </div>
                  <script>
                     // Get the modal
                     var modal = document.getElementById("myModal");

                     // Get the button that opens the modal
                     var btn = document.querySelector("button.cta");

                     // Get the <span> element that closes the modal
                     var span = document.getElementsByClassName("close")[0];

                     // When the user clicks the button, open the modal 
                     btn.onclick = function() {
                       modal.style.display = "block";
                     }

                     // When the user clicks on <span> (x), close the modal
                     span.onclick = function() {
                       modal.style.display = "none";
                     }

                     // When the user clicks anywhere outside of the modal, close it
                     window.onclick = function(event) {
                       if (event.target == modal) {
                         modal.style.display = "none";
                       }
                     }
                     
                     function copyToClipboard(text) {
                       navigator.clipboard.writeText(text);
                       alert("Copied the text: " + text);
                     }
                  </script>
                  <p style="color: #0077ff; font-size: 2rem;">"Your Safety, Our Priority"</p>
               </div>
               <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                  <div class="position-relative h-100">
                     <img class="img-fluid position-absolute " src="images/5.jpg" alt="" width="100" style="object-fit: cover;">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="container my-5 py-5">
         <div class="row">
            <div class="col-lg-6">
               <h3 class="text-white">A printer repair service involves the diagnosis, maintenance, and fixing of issues related to various types of printers.</h3>
               <img src="images/pri.jpg" >
            </div>
            <div class="col-lg-6" style="border-left:1px solid orange">
               <p class="text-secondary">
               <ul class="list-unstyled">
                  <li><h4 class="text-white">Diagnosis and Troubleshooting:</h4> Technicians will thoroughly inspect the printer to identify the root cause of the problem.</li>
                 <br> <li><h4 class="text-white">Ink and Toner Replacement:</h4> If the printer's ink or toner is depleted or malfunctioning, it may need to be replaced.</li>
                 <br> <li><h4 class="text-white">Paper Jam Fixing:</h4> Resolving issues caused by paper jams that disrupt the printer's operation.</li>
                 <br> <li><h4 class="text-white">Printer Head Cleaning:</h4> Cleaning the printer head to ensure smooth and clear printing.</li>
                 <br> <li><h4 class="text-white">Hardware Repair:</h4> Fixing or replacing faulty hardware components.</li>
                 <br> <li><h4 class="text-white">Software Updates and Configuration:</h4> Updating and configuring the software that manages the printer system is crucial.</li>
                 <br> <li><h4 class="text-white">Network Connectivity Issues:</h4> Ensuring the printer can connect to the network and function properly.</li>
                 <br> <li><h4 class="text-white">Preventive Maintenance:</h4> Regular maintenance to prevent future issues.</li>
               </ul>
               </p>
            </div>
         </div>
      </div>
      <?php include 'footer.php'; ?>
      <!-- Javascript files-->
   
   </body>
</html>
