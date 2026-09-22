
<?php
session_start();
?>

<?php
include 'connect.php'; ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/svg+xml" href="/vite.svg" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DRAWING WITH ASWIN</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-RxxJP3B5f/8Iu6hR7Rb+wvulv2Ibh3KxEm9Hl/5ldJCh7cxnYZjZBFH1MvYOmeIogI68HZQFlHVDdRxbK0ymWA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-KyZXEAg3QhqLMpG8r+Knujsl5/5UbO9iYwD4RBBcrC5+9xYw18zZmZ5kH7/6U8D4G8nKkT8m6h3B/zP1G0f+ZyQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <link rel="stylesheet" href="css/main.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<style>
  .relative{
    margin-left: 20px !important;
  }

.carousel {
    /* width: 100%; */
}

.slide {
    display: flex;
    align-items: center;
    background-color: rgb(34, 33, 33);
    color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.icon {
    width: 100px;
    height: 0px;
    margin-right: 20px;
}

.watch-details {
    text-align: left;
}

.watch-details h2 {
    margin: 0;
    font-size: 1.5em;
}

.watch-details p {
    margin: 5px 0 0 0;
    color: #ccc;
}

.carousel-indicators li {
    background-color: #717171;
}

.carousel-indicators .active {
    background-color: #000;
}


.carousel-control-prev-icon,
.carousel-control-next-icon {
    color: orange;

    border-radius: 50%;
    padding: 20px;
}
.kk{height:100px !important;

}


@media only screen and (max-width: 800px) {
    .kk,    .search {
        display: none !important;
    }

}
</style>

</head>

<body class="  mx-auto">
<header class="flex items-center justify-between p-1" style="background-image:url(images/header.png) !important; background-position-x:73%;" data-aos="fade-down" data-aos-duration="1000">
  <a href="index.php"><img src="images/logo.png" width="120" data-aos="fade-right" data-aos-duration="1000"></a>
  <div class="flex space-x-5 items-center justify-center" data-aos="fade-up" data-aos-duration="1000">
    <!-- Add other icons here -->
    <div class="item">
      <a href="#" onclick="document.getElementById('searchDialog').showModal();" data-aos="zoom-in" data-aos-duration="1000">
        <svg aria-label="Explore" class="cursor-pointer hover:text-gray-400" fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24">
          <title>Search</title>
          <path d="M19 10.5A8.5 8.5 0 1 1 10.5 2a8.5 8.5 0 0 1 8.5 8.5Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
          <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="16.511" x2="22" y1="16.511" y2="22"></line>
        </svg>
      </a>
      <!-- Dialog Box -->
      <dialog id="searchDialog" style="width: 300px;padding: 20px; border-radius: 10px;border: none;box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);text-align: center; background:rgba(0, 0, 0, 0.7);" data-aos="fade-up" data-aos-duration="1000">
        <form method="dialog">
          <button id='exit-btn' style='float: right; background:transparent; color:red; font-size:15px;' onclick="document.getElementById('searchDialog').close()">&times;</button>  <br>
          <label for="searchInput" style="color:white;">Search:</label>
          <input type="text" id="searchInput" name="searchInput">
          <br>
          <button type="submit" style="margin-top:10px;" class="btn btn-success">Search</button>
          <button type="button" style="margin-top:10px; " class="btn btn-danger" onclick="document.getElementById('searchDialog').close();">close</button>
        </form>
        <div id="searchResults" style="margin-top: 10px; text-align: left;"></div>
      </dialog>
    </div>
    <a href="#" onclick="toggleMode()" class="list" style="margin-left:10px;" data-aos="fade-left" data-aos-duration="1000">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cursor-pointer hover:text-gray-300">
        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
        <path stroke="none" d="M15 12c0-.29-.19-.53-.5-.69L4 7.84a1.5 1.5 0 0 1 .5-1.5v5a1.5 1.5 0 0 1-3 0v-5a1.5 1.5 0 0 1 .5-1.5l8.5-3.5c.26-.1.5 0 .5.1z"/>
      </svg>
    </a>
    <?php
      if(isset($_SESSION['user_name'])) {
        $name = $_SESSION['user_name'];       
        echo "<div style='background-color: rgb(44, 42, 42) !important; padding:5px; border-radius:50px; margin:10px; cursor:pointer;' id='user-details' onclick='showUserDetails()' data-aos='fade-up' data-aos-duration='1000'><a style='color:white;'> $name </a></div>";
      } else {
        echo '<a href="form.php" data-aos="fade-up" data-aos-duration="1000">
                <img src="images/login.png" width="60">
              </a>';
      }
    ?>
    <div class="relative" data-aos="fade-up" data-aos-duration="1000"></div>
  </div>
</header>



  <style>
  .dark {
    background-color: rgb(44, 42, 42) !important;
    color: white; /* Example: Adjust text color for dark mode */
  }

  .light {
    background-color: white !important;
    color: black; /* Example: Adjust text color for light mode */
  }
  
</style>

        <script>
                  document.body.classList.add('dark');

          function toggleMode() {
            var bodyClassList = document.body.classList;
            if (bodyClassList.contains('dark')) {
              bodyClassList.remove('dark');
              bodyClassList.add('light');
            } else {
              bodyClassList.remove('light');
              bodyClassList.add('dark');
            }
          }
        </script>

<script>
              function showUserDetails() {
                var userDetails = document.getElementById('user-details');
                var logoutDialog = document.createElement('div');
                logoutDialog.id = 'logout-dialog';
                logoutDialog.style.position = 'fixed';
                logoutDialog.style.zIndex = '999';
                logoutDialog.style.top = '50%';
                logoutDialog.style.right = '50%';
                logoutDialog.style.transform = 'translate(50%, -50%)';
                logoutDialog.style.backgroundColor = 'rgba(0, 0, 0, 0.7)';
                logoutDialog.style.borderRadius = '10px';
                logoutDialog.style.padding = '20px';
                logoutDialog.style.width = '300px';
                logoutDialog.style.boxShadow = '0 0 25px 10px black'; /* Added box shadow */
                logoutDialog.innerHTML = "<button id='exit-btn' style='float: right; background:transparent; color:red; font-size:15px;'>&times;</button>  <br><a href='form.php' class='btn  btn-danger'> Logout </a> <a href='user_profile.php' class='btn  btn-success'style='float:right;'> View Profile </a>";
                document.body.appendChild(logoutDialog);
                var exitBtn = document.getElementById('exit-btn');
                var logoutBtn = document.getElementById('logout-btn');
                exitBtn.addEventListener('click', function() {
                  logoutDialog.remove();
                });
                logoutBtn.addEventListener('click', function() {
                  logoutDialog.remove();
                  window.location.href = 'form.php?action=logout';
                });
              }
            </script>

