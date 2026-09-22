<link rel="stylesheet" href="plugins/table/jquery.dataTables.min.css">
<link rel="stylesheet" href="plugins/table/buttons.dataTables.min.css">
<?php
include("connection/config.php"); 
      
    $output = '';
    if($_POST["to_date"]!="" && $_POST["from_date"]!="" && $_POST["empids"])
    {
      $query = "SELECT * FROM `stud_att` WHERE date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND att_id='".$_POST["empids"]."'";
    }
    elseif($_POST["to_date"]!="" && $_POST["from_date"]!="")
    {
      $query = "SELECT * FROM `stud_att` WHERE date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' ";         
    }else
    {
    $query = "SELECT * FROM `stud_att` WHERE att_id='".$_POST["empids"]."'"; 
    }
      $ad_req = mysqli_query($db, $query);
     
      $output .= '<div class="box-body table-responsive">
          <table id="example1" class="display nowrap dataTable dtr-inline collapsed table table-bordered table-striped table-hover  display nowrap"><tbody>';
            if(mysqli_num_rows($ad_req) > 0)  
            { 
            $i=1;
            while($rowsval=mysqli_fetch_array($ad_req)) 
            { 
            $reg_id=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM `attedance` WHERE id='".$rowsval['att_id']."'")); 
              $output .= '<tr>
              <td>'.$i.'</td>
              <td>'.$rowsval['date'].'</td>
              <td>'.$reg_id['regno'].'</td>
              <td>'.$reg_id['sname'].'</td>
              <td>'.$reg_id['cname'].'</td>
              <td>'.$rowsval['present'].'</td>
              <td>'.$rowsval['absent'].'</td>
              <td>'.$rowsval['halfday'].'</td>
            </tr>';
          $i++; } 
        }
      else  
      {  
           $output .= '<tr>
           <td colspan="8">No Order Found</td>
           </tr>';  
      }  
      $output .= '</table>';  
      echo $output;  
 //}   
 ?>

 
 <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
 <script type="text/javascript" src="js/jquery.min.js"></script>
 <script> $j18=jQuery.noConflict();</script>
 <script type="text/javascript">
   $j18(document).ready( function () {
    $('#example1').DataTable(
{
  dom: 'Bfrtip',
        buttons: [
            'excel'
        ]
}

      );
} );
 </script>

<script type="text/javascript" src="plugins/table/dataTables.buttons.min.js"></script>

 <script type="text/javascript" src="plugins/table/buttons.flash.min.js"></script>

 <script type="text/javascript" src="plugins/table/jszip.min.js"></script>

 <script type="text/javascript" src="plugins/table/pdfmake.min.js"></script>

 <script type="text/javascript" src="plugins/table/vfs_fonts.js"></script>

<script type="text/javascript" src="plugins/table/buttons.html5.min.js"></script>

<script type="text/javascript" src="plugins/table/buttons.print.min.js"></script>
  