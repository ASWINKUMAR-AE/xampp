<?php
error_reporting(0);
include ('dbcon.php'); 
include ('header.php'); 
$ID=$_GET['del'];
if (isset($ID))
{   

$result = mysql_query("DELETE FROM ads where ad_id='$ID'") or die(mysql_error());
if(($result))
{
         echo "Record Deleted Successfully";

         echo '<script>window.location="ads.php"</script>';
      }
      else
      {
//if($result) 
//    { 
             echo "No Record Found";
    echo '<script>window.location="ads.php"</script>';
          } 
    
}

?>

              <div class="right_col" role="main" style="min-height: 600px;"> 

 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Ad Details</h2>
                        <ul class="nav navbar-right panel_toolbox">

                            <li>
							<a href="addads.php" style="background:none;">
							<button class="btn btn-primary"><i class="fa fa-plus"></i> Add Ads</button>
							</a>
							</li>
				
                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr>
									<th>AD</th>
									<th>AD Url</th>
								<!---	<th>User Type</th>	-->
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
							$result= mysql_query("select * from ads order by ad_id ASC") or die (mysql_error());
							while ($row= mysql_fetch_array ($result) ){
							$id=$row['ad_id'];
							?>
							<tr>
								<td>
									<?php if($row['ad'] != ""): ?>
									<img src="ads/<?php echo $row['ad']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
									<?php else: ?>
									<img src="images/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
									<?php endif; ?>	
								</td> 
								<td style="word-wrap: break-word; width: 10em;"><?php echo $row['ad_url']; ?></td>
								<td>
									
									<a class="btn btn-warning" for="ViewAd" href="edit_ad.php<?php echo '?ad_id='.$id; ?>">
										<i class="fa fa-edit"></i>
									</a>
									<a class="btn btn-danger" for="DeleteAd" href="ads.php<?php echo '?del='.$id; ?>">
										<i class="glyphicon glyphicon-trash icon-white"></i>
									</a>
			
									
								</td> 
							</tr>
							<?php } ?>
							</tbody>
							</table>
						</div>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

</div>