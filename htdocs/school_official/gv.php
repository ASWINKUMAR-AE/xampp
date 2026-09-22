
<?php include("header.php")?>

		
		
<!-- Back-To-Top -->
<div class="container"> <a href="#" class="back-to-top text-center" style="display: inline;"> <i class="fa fa-angle-up"></i> </a> </div>
<!--/#Back-To-Top--> 

<!--header-->
<?php include("menu.php")?>
  <?php include ('dbcon.php');?>

    <!-- /. header-section-->
   <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-6 col-xs-12">
                    <div class="page-caption">
                        
                        
                        <div class="page-caption-line"></div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
<!--	<div class="container">
           
			<div class="row">
            
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 m20">
					<img src="images/PC-World.jpg" alt=""/>
				</div>
                
               </div>
			   </div>-->
			    <div class="container">
			 
				   	<?php
					$fol=$_GET['type'];
							$result= mysql_query("select admin_id,img_title,img_type,admin_image from slider where img_type='".$fol."' order by admin_id ASC") or die (mysql_error());
							while ($row= mysql_fetch_array ($result) ){ ?>
							  <a class="zoombox zgallery1" title="<?php echo $row['img_title']; ?>" href="admin/<?php echo $row['img_type']; ?>/<?php echo $row['admin_image']; ?>"><img src="admin/<?php echo $row['img_type']; ?>/<?php echo $row['admin_image']; ?>" class="thumb" /></a>
							<?php } ?>
   <!-- <a class="zoombox zgallery1" title="This is an image" href="admin/t/1.jpg"><img src="admin/t/1.jpg" class="thumb" /></a>
    <a class="zoombox zgallery1" title="This is an image" href="admin/t/2.jpg"><img src="admin/t/2.jpg" class="thumb" /></a>
    <a class="zoombox zgallery1" title="This is an image" href="admin/t/3.jpg"><img src="admin/t/3.jpg" class="thumb" /></a>-->
   </div><script src="lightbox/jquery.min.js" type="text/javascript"></script>
<script src="zoombox.js"></script>
<script>
  $('a.zoombox').zoombox();
</script>


	<!-- footer -->
    <?php include("footer.php")?>
