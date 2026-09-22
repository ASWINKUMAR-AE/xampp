  <!-- Charts and Graphs Section -->
  <div class="row mt-4">
      <div class="col-md-6" data-aos="fade-right">
        <div class="card">
          <div class="card-body">
            <h5>Revenue Chart</h5>
            <canvas id="revenueChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6" data-aos="fade-left">
        <div class="card">
          <div class="card-body">
            <h5>User Growth</h5>
            <canvas id="userChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // AOS Initialization
    AOS.init();

    // Charts Initialization
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    const userCtx = document.getElementById('userChart').getContext('2d');

    new Chart(revenueCtx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
        datasets: [{
          label: 'Revenue',
          data: [1200, 1900, 3000, 5000, 2000],
          borderColor: 'rgba(54, 162, 235, 1)',
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderWidth: 2
        }]
      }
    });

    new Chart(userCtx, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
        datasets: [{
          label: 'User Growth',
          data: [500, 700, 1200, 2000, 2400],
          backgroundColor: 'rgba(75, 192, 192, 0.5)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      }
    });
  </script>
</body>