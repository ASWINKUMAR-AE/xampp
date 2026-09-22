<section id="partner">
  <div class="container">
   
    <div class="row">
      <div class="col-md-12">
        <div id="logo-slider" class="owl-carousel">
		<?php
							$result= mysqli_query($con,"select * from ads order by ad_id ASC") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['ad_id'];
							?>
							<div class="item">
                        <?php if($row['ad'] != ""): ?>
						         <img src="admin/ads/<?php echo $row['ad']; ?>" alt="partner1"> 

                        <?php else: ?>
									<img src="admin/upload/user.png" alt="damage" class="partner1" /> 
									<?php endif; ?>
									</div>
       <!--   <div class="item"><img src="images/log1.png" alt="partner1"></div> -->
							<?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>