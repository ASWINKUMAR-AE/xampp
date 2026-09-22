<!DOCTYPE html>
<html lang="en"> 
<head>
<title></title>
    
    <!-- Meta -->
    <meta charset="utf-8">
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/style.css">
<style>
   .hero {
      background-color: #f8f9fa;

      text-align: center;
	  border-radius: 10px;
	  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(5px);
-webkit-backdrop-filter: blur(5px);
padding: 10px  !important;
border: 1px solid rgba(216, 211, 211, 0.3);
    }
    .section-title {
      margin-top: 30px;
      margin-bottom: 15px;
      color: #343a40;
    }
    .code-block {
      background-color: #f8f9fa;
      padding: 15px;
      border-radius: 5px;
      font-family: monospace;
    }
h2{color:white !important;}
</style>
</head> 

<body class="app">   	
<?php include "element/sidebar.php" ?>
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="row g-3 mb-4 align-items-center justify-content-between ">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0"> Docs for the Bike Speedmeter </h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								
					                
							    </div><!--//col-->
							 
						
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
			    </div><!--//row-->
			    <br>
			    <div class="row g-4">
				    

				<div class="hero ">
  
	  
	    <?php include "element/doc_data.php" ?>
    </div><!--//app-wrapper-->    			
</div>		
<?php include "element/footer.php" ?>

    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 

</body>
</html> 

