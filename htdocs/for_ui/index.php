<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link href="assets/style.css" rel="stylesheet">
  <style>
  
  </style>
</head>
<body class="dark-mode">
  <button id="toggleSidebar">☰</button>
  <!-- Include Sidebar -->
  <div id="sidebar">
    <?php include 'components/sidebar.php'; ?>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <!-- Include Header -->
    <?php include 'components/header.php'; ?>

    <div id="main-content">
      <!-- Dashboard Content -->
      <div class="container-fluid">
        <div class="row g-3">
          <div class="col-12 col-sm-6 col-md-3" data-aos="fade-up">
            <div class="card bg-primary text-white">
              <div class="card-body">
                <h5>Total Users</h5>
                <h2>1,230</h2>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3" data-aos="fade-up" data-aos-delay="100">
            <div class="card bg-success text-white">
              <div class="card-body">
                <h5>Total Sales</h5>
                <h2>$45,300</h2>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3" data-aos="fade-up" data-aos-delay="200">
            <div class="card bg-warning text-white">
              <div class="card-body">
                <h5>Pending Orders</h5>
                <h2>78</h2>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3" data-aos="fade-up" data-aos-delay="300">
            <div class="card bg-danger text-white">
              <div class="card-body">
                <h5>New Messages</h5>
                <h2>14</h2>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Include Chart -->
      <?php include 'components/char.php'; ?>

      <!-- Include Footer -->
      <?php include 'components/footer.php'; ?>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    // Initialize AOS
    AOS.init();

   
  </script>
</body>
</html>
