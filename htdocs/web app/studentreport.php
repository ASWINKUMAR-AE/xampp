<style type="text/css">
.table td, .table th {
    min-width: 100px;
}
</style>
<?php 
    error_reporting(0);
		session_start(); 
  	include("header.php"); 
    include("connection/config.php"); 
    include("slide.php");
    include("slide1.php");
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
    $homework2=$_POST['homework2'];

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
        `homework2`='".$homework2[$count]."',
        `handw1`='".$handw1[$count]."',
        `handw2`='".$handw2[$count]."',
        `notes`='".$notes[$count]."',                           
        `fingering`='".$fingering[$count]."',
        `today_activity`='".$today_activity[$count]."'");  

        
    } 
  echo "<script>alert('Record Save Sucessfully!');window.location.href='studentreport.php';</script>";
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
                     <a  href="master1.php" class="btn btn-primary">Back </a>
			  </div>
            </div>

        <div class="box-body table-responsive">
          <table border="1" align="center" id="example1" class="table table-bordered table-striped table-hover">
          
            <tr>
              <td colspan="5"></td>              
              <td colspan="6" style="color:#84288B"><center>
                <strong>Speed Writing</strong>
              </center></td>              
              <td colspan="2" style="color:#84288B"><center>
                <strong>Page Work in Class</strong>
              </center></td>
              <td colspan="2" style="color:#84288B"><center>
                <strong>Today Home Work </strong>
              </center></td>  
			  <td colspan="3"></td> 
            </tr>

          <tr>
              <td><strong>S.no</strong></td>
          	  <td><strong>Name</strong></td>
              <td><strong>Reg.No</strong></td>
              <td><strong>Date</strong></td>
              <td><strong>Attendance</strong></td>
              <td><div align="center"><strong>Direct View </strong></div></td> 
			    <td> </td> 
		      <td colspan="2"><div align="center"><strong>In Direct View</strong></div></td>
              <td colspan="2"><div align="center"><strong>Left/Right H/W </strong></div></td>
              <td colspan="2"><div align="center"><strong>Book/PageNo</strong></div></td>
              <td><div align="center"><strong>Book/Page No</strong></div></td>
			      <td><strong></strong></td>
		      <td><div align="center"><strong>Fingering</strong></div></td>
			  
              <td><div align="center"><strong>Today Activity </strong></div></td>
              <td><div align="center"><strong>Notes</strong></div></td>
          </tr>

          <?php 
          $i=1;
          $studentval=mysqli_query($db, "SELECT * FROM `student`");
          while($stud_val=mysqli_fetch_array($studentval))
          {
            echo ' <tr>
              <td>'.$i.'</td>
              <td>'.$stud_val['sname'].'<input type="hidden" name="sname[]" value="'.$stud_val['sname'].'"></td>
              <td>'.$stud_val['srno'].'<input type="hidden" name="serialno[]" value="'.$stud_val['srno'].'"></td>
              <td>'.$today = date("Y-m-d").'<input type="hidden" name="date[]" value="'.date("Y-m-d").'"></td>              
              <td> <div style="float: left;">P<input type="checkbox"  class="table datatable_full table-bordered table-striped" name="attendence[]" value="1"  /></div> 
              <div style="float: left;">A<input type="checkbox"  class="table datatable_full table-bordered table-striped" name="attendence[]" value="0"  /></div></td>

              <td ><select name="speed_write[]" class="form-control" style="width:100% !important;">';
              for($j=1; $j<=20; $j++)
              {
                echo '<option value="'.$j.'">'.$j.'</option>';
              }              
              echo '</select></td>

       <td ><select name="speed_write1[]" class="form-control" style="width:100% !important;">';
              for($m=1; $m<=9; $m++)
              {
                echo '<option value="'.$m.'">'.$m.'</option>';
              }              
              echo '</select></td>

              <td><select name="speed_write2[]" class="form-control" style="width:100% !important;">';
              for($n=1; $n<=20; $n++)
              {
                echo '<option value="'.$n.'">'.$n.'</option>';
              }              
              echo '</select>
              </td>

              <td><select name="work_in_class[]" class="form-control" style="width:100% !important;">';
              for($k=1; $k<=9; $k++)
              {
                echo '<option value="'.$k.'">'.$k.'</option>';
              }   
              echo '</select></td>

              <td><select name="work_in_class1[]" class="form-control" style="width:100% !important;">';
              for($r=1; $r<=20; $r++)
              {
                echo '<option value="'.$r.'">'.$r.'</option>';
              }   
              echo '</select></td>

              
             
              <td><select name="homework1[]" class="form-control" style="width:100% !important;">';
              for($s=1; $s<=9; $s++)
              {
                echo '<option value="'.$s.'">'.$s.'</option>';
              }  
              echo '</select>
              </td>
			   <td><select name="homework[]" class="form-control" style="width:100% !important;">
              <option value="Book A">Book A</option>
              <option value="Book B">Book B</option></select>
              </td>

              <td><select name="homework2[]" class="form-control" style="width:100% !important;">';
              for($v=1; $v<=20; $v++)
              {
                echo '<option value="'.$v.'">'.$v.'</option>';
              }   
              echo '</select></td>

              <td><select name="handw1[]" class="form-control" style="width:100% !important;">
              <option value="Book A">Book A</option>
              <option value="Book B">Book B</option>
              </select></td>
              
              <td><select name="handw2[]" class="form-control">';
              for($p=1; $p<=20; $p++)
              {
                echo '<option value="'.$p.'">'.$p.'</option>';
              }              
              echo '</select></td>
             
              <td><textarea class="form-control" name="fingering[]"></textarea></td>
              <td><textarea  class="form-control" name="today_activity[]"></textarea> </td>
              <td><textarea class="form-control" name="notes[]"></textarea></td>
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



    
     
     