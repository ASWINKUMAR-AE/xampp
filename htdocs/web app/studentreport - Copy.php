<?php 
    error_reporting(0);
		session_start(); 
  	include("header1.php"); 
    include("connection/config.php"); 
    include("slide.php");
 if(count($_POST) > 0)
  {   
    $serialno=$_POST['serialno'];
    $sname=$_POST['sname'];

         
    $date1=$_POST['date'];
    $attendence=$_POST['attendence'];
    $speed_write=$_POST['speed_write'];
    $speed_write1=$_POST['speed_write1'];
    $speed_write2=$_POST['speed_write2'];

    $work_in_class=$_POST['work_in_class'];
    $work_in_class1=$_POST['work_in_class1'];

    $homework=$_POST['homework'];
    $homework1=$_POST['homework1'];

    $handw1=$_POST['handw1'];
    $handw2=$_POST['handw2'];

    $notes=$_POST['notes'];
    $fingering=$_POST['fingering'];
    $today_activity=$_POST['today_activity'];




    for($count=0; $count<count($serialno); $count++)
    {  
        mysqli_query($db,"INSERT INTO `stud_attendance` SET 
        `serialno`='".$serialno[$count]."',
        `sname`='".$sname[$count]."',
        `date1`='".$date1[$count]."',
        `attendence`='".$attendence[$count]."',
        `speed_write`='".$speed_write[$count]."',
        `speed_write1`='".$speed_write1[$count]."',
        `speed_write2`='".$speed_write2[$count]."',
        `work_in_class`='".$work_in_class[$count]."',
        `work_in_class1`='".$work_in_class1[$count]."',
        `homework`='".$homework[$count]."',
        `homework1`='".$homework1[$count]."',
        `handw1`='".$handw1[$count]."',
        `handw2`='".$handw2[$count]."',
        `notes`='".$notes[$count]."',                           
        `fingering`='".$fingering[$count]."',
        `today_activity`='".$today_activity[$count]."'");  

        
    } 
   header("Location: examplestdentreport.php");
  }
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->   
    <!-- Main content -->
    <section class="content">	
			<div class="row">
						
	<form id="attval" name="att_val" method="post" enctype="multipart/form-data">

    <!--<div class="form-group col-md-3">
      <label for="pwd">From:</label>
      <input type="text" name="from_date" id="datepicker5" class="form-control" placeholder="From Date"/>
    </div>
    <div class="form-group col-md-3">
     <label for="pwd">To:</label> 
      <input type="text" name="to_date" id="datepicker6" class="form-control" placeholder="To Date" />
    </div>

    <div class="form-group col-md-3">
     <label for="pwd">To:</label> 
     <?php
   
    $query = mysqli_query($db, "SELECT * FROM `register`") ;
    
    //Count total number of rows
    //$rowCount = $query->num_rows;
    $rowCount = mysqli_num_rows($query);
    ?>
     <select name="emp_id_s" id="emp_id_s" class="form-control" style="width: 100%;">
       <option value="">---SELECT---</option>
        <?php
        if($rowCount > 0){
            while($row = mysqli_fetch_array($query)){ 
                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
            }
        }else{
            echo '<option value="">Not available</option>';
        }
        ?>
    </select>
    </div>-->


 
	 <div class="form-group col-md-3">
    </div> 
  
	  </div>
	
      <div class="row">
        <div class="col-xs-12">      

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Student Report(Center)</h3>
			  				<div class="text-right">
                     <a  href="amaster.php" class="btn btn-primary">Back </a>
			  </div>
            </div>

         <div class="box-body table-responsive">

          <table id="example1" class="table datatable_full table-bordered table-striped">
        <thead>

              <tr>

                <th>SNo</th>


				
   <th>Name</th>
               
<th>Register No</th>
            
	<th>Date</th>	
<th>Attendence</th>		
<th>Direct View</th>	
<th></th>
         <th>InDirect View</th>	
		 <th></th>
<th>Left/Right H/W</th>		
<th></th>
<th>Book A</th>	

<th>Book B</th>	
<th>Book A</th>	

<th>Book B</th>	
<th>PageNo</th>	
	<th>PageNo</th>	
<th>Fingering</th>	
<th>Today Activity</th>	
<th>Notes</th>	 

              </tr>

            </thead>

          <?php 
          $i=1;
          $studentval=mysqli_query($db, "SELECT * FROM `student`");
          while($stud_val=mysqli_fetch_array($studentval))
          {
            echo ' <tr>
              <td >'.$i.'</td>
              <td >'.$stud_val['sname'].'<input type="hidden" name="sname[]" value="'.$stud_val['sname'].'"></td>
              <td >'.$stud_val['srno'].'<input type="hidden" name="serialno[]" value="'.$stud_val['srno'].'"></td>
              <td >'.$today = date("Y-m-d").'<input type="hidden" name="date[]" value="'.date("Y-m-d").'"></td>              
              <td > <div style="float: left;">P<input type="checkbox"  class="table datatable_full table-bordered table-striped" name="attendence[]" value="1"  /></div> 
              <div style="float: left;">A<input type="checkbox"  class="table datatable_full table-bordered table-striped" name="attendence[]" value="0"  /></div></td>

              <td ><select name="speed_write[]" class="form-control">';
              for($j=1; $j<=20; $j++)
              {
                echo '<option value="'.$j.'">'.$j.'</option>';
              }              
              echo '</select>
			  
			  </td>
			   <td ><select name="speed_write[]" class="form-control">';
              for($j=1; $j<=9; $j++)
              {
                echo '<option value="'.$j.'">'.$j.'</option>';
              }              
              echo '</select>
			  
			  </td>

              <td ><select name="speed_write1[]" class="form-control">';
              for($m=1; $m<=20; $m++)
              {
                echo '<option value="'.$m.'">'.$m.'</option>';
              }              
              echo '</select></td>
			   <td ><select name="speed_write[]" class="form-control">';
              for($j=1; $j<=9; $j++)
              {
                echo '<option value="'.$j.'">'.$j.'</option>';
              }              
              echo '</select>
			  
			  </td>

              <td ><select name="speed_write2[]" class="form-control">';
              for($n=1; $n<=20; $n++)
              {
                echo '<option value="'.$n.'">'.$n.'</option>';
              }              
              echo '</select>
              </td>
			   <td ><select name="speed_write[]" class="form-control">';
              for($j=1; $j<=9; $j++)
              {
                echo '<option value="'.$j.'">'.$j.'</option>';
              }              
              echo '</select>
			  
			  </td>

              <td ><select name="work_in_class[]" class="form-control">';
              for($k=1; $k<=20; $k++)
              {
                echo '<option value="'.$k.'">'.$k.'</option>';
              }   
              echo '</select></td>

              <td ><select name="work_in_class1[]" class="form-control">';
              for($r=1; $r<=20; $r++)
              {
                echo '<option value="'.$r.'">'.$r.'</option>';
              }   
              echo '</select></td>
              <td ><select name="homework[]" class="form-control">';
              for($l=1; $l<=20; $l++)
              {
                echo '<option value="'.$l.'">'.$l.'</option>';
              }  
              echo '</select>
              </td>
              <td ><select name="homework1[]" class="form-control">';
              for($s=1; $s<=20; $s++)
              {
                echo '<option value="'.$s.'">'.$s.'</option>';
              }  
              echo '</select>
              </td>
              <td ><input type="text" name="handw1" value="" class="form-control"></td>
              <td ><input type="text" name="handw2" value="" class="form-control"></td>
             
			  <td ><select name="fingering[]" class="form-control">
                            <option value="">---Select---</option>
                                                    <option value="Movers">Movers</option>
                                                    <option value="Raiders">Raiders</option>
                                                    <option value="Flyers">Flyers</option>
                                                    <option value="Endeavfiours">Endeavfiours</option>
                                                    <option value="Archives">Archives</option>
                                                    <option value="Starts">Starts</option>
                                                    <option value="others">others</option>
                                                    
              </select>
              </td>
			  
              <td ><textarea rows="1" cols="3" class="form-control" name="today_activity[]"></textarea> </td>
              <td ><textarea rows="1" cols="3" class="form-control" name="notes[]"></textarea></td>
            </tr>';
            $i++;
          }
           ?>

           
</table>



          
        </div> 
            </div>
            <!-- /.box-header -->            
            <div class="box-body">
              <div class="card-footer">
                  <input type="submit" class="btn btn-info" value="Submit">
                  <input type="submit" class="btn btn-default float-right" value="Cancel">
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 </form>
  <!-- /.content-wrapper -->
    <?php include("footer.php"); ?>
 
<script type="text/javascript">
 $(document).ready(function(){         
          /*$.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           }); */

           $(function(){ 

                $("#datepicker5").datepicker();
                $("#datepicker6").datepicker();
                $("#emp_id_s").datepicker();                 
           });  
          /* $('#filter').click(function(){ */
           $("input").change(function(){ 
            
                var from_date = $('#datepicker5').val();               
                var to_date = $('#datepicker6').val(); 
                var empids = $('#emp_id_s').val(); 
                  
                     $.ajax({  
                          url:"datefilter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date, empids:empids},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                
           });  
           
           $("#emp_id_s").change(function(){ 
            
                var from_date = $('#datepicker5').val();  
                var to_date = $('#datepicker6').val();
                var empids = $('#emp_id_s').val(); 
                  
                     $.ajax({  
                          url:"datefilter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date, empids:empids},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                
           });    

      });  
 </script>



    
     
   