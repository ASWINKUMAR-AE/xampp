
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    
</head>
<body>
    <div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
       
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="../data_fetch/img/logo_bg.jpg"
            alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name">
            <strong><?php echo $_SESSION['username']; ?></strong>
          </span>
          <span class="user-role">Chatbot | TNPT</span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
     
     
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>Home</span>
          </li>
          <li class="sidebar-dropdown">
            <a href="admin_dash.php">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
           
          </li>




           <li class="header-menu">
            <span>Chatbot Management</span>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-robot"></i>
              <span>Manage Q/A</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="manage_ques.php">Q/A CRUD Operations</a>
                </li>
                  <li>
                  <a href="user_details.php">Form Details</a>
                </li>
                
               
              </ul>
            </div>
          </li>


          <li class="header-menu">
            <span>User Management</span>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Manage</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
               
               
                
                <li>
                  <a href="manage_users.php">Manage Users</a>
                </li>
                 <li>
                  <a href="activity_log.php">Activity Logs</a>
                </li>
              </ul>
            </div>
          </li>

         
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <!-- <a href="#">
        <i class="fa fa-bell"></i>
        <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a href="#">
        <i class="fa fa-envelope"></i>
        <span class="badge badge-pill badge-success notification">7</span>
      </a>
      <a href="#">
        <i class="fa fa-cog"></i>
        <span class="badge-sonar"></span>
      </a> -->
      <a href="../data_proccessing/logout.php" style="text-decoration:none;">
        <i class="fa fa-power-off"></i>
        <span>Logout</span>
      </a>
    </div>
  </nav>
  <!-- sidebar-wrapper  -->
  <!-- <main class="page-content">
    <div class="container-fluid"> -->
      
  <!-- page-content" -->

<!-- page-wrapper -->
</body>
<script>
    $(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
    $(this)
      .parent()
      .addClass("active");
  }
});

$("#close-sidebar").click(function() {
  $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
  $(".page-wrapper").addClass("toggled");
});
</script>
</html>
