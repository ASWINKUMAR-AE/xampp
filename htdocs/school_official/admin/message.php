<?php 
	
	if(trim($_SESSION['successmessage']) != '')
	{
    echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>'.$_SESSION['successmessage'].'</h4>                
              </div>';
	unset($_SESSION['successmessage']);
	}
	if(trim($_SESSION['errormessage']) != '')
	{
	echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i>'.$_SESSION['errormessage'].'</h4>                           
              </div>';
	unset($_SESSION['errormessage']);
	}
?>