
  <div id="sidebar" class="sidebar">
<style>
.sidebar.active {
  display: none;
}
@media (max-width: 768px) {
  .sidebar {
    position: absolute;
    z-index: 1000;
  }

  .main-content {
    margin-left: 0;
  }
}
.sidebar {
  background-color: #333;
  color: #fff;
  width: 250px;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  padding: 20px;
}

.sidebar h3 {
  font-size: 1.5rem;
  margin-bottom: 1rem;
}

.sidebar .nav-link {
  color: #ccc;
  margin: 0.5rem 0;
  transition: color 0.3s;
}

.sidebar .nav-link:hover {
  color: #fff;
}


</style>
    <h3>Admin Dashboard</h3>
    <ul class="nav flex-column">
    <li class="nav-item mb-2" data-aos="fade-up" data-aos-duration="500">
      <a class="nav-link text-white d-flex align-items-center" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" fill="currentColor" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="20" height="20">
          <g>
            <path d="M85.333,0h64c47.128,0,85.333,38.205,85.333,85.333v64c0,47.128-38.205,85.333-85.333,85.333h-64 C38.205,234.667,0,196.462,0,149.333v-64C0,38.205,38.205,0,85.333,0z"/>
            <path d="M362.667,0h64C473.795,0,512,38.205,512,85.333v64c0,47.128-38.205,85.333-85.333,85.333h-64 c-47.128,0-85.333-38.205-85.333-85.333v-64C277.333,38.205,315.538,0,362.667,0z"/>
            <path d="M85.333,277.333h64c47.128,0,85.333,38.205,85.333,85.333v64c0,47.128-38.205,85.333-85.333,85.333h-64 C38.205,512,0,473.795,0,426.667v-64C0,315.538,38.205,277.333,85.333,277.333z"/>
            <path d="M362.667,277.333h64c47.128,0,85.333,38.205,85.333,85.333v64C512,473.795,473.795,512,426.667,512h-64 c-47.128,0-85.333-38.205-85.333-85.333v-64C277.333,315.538,315.538,277.333,362.667,277.333z"/>
          </g>
        </svg>
        Dashboard
      </a>
    </li>
    <li class="nav-item mb-2" data-aos="fade-up" data-aos-duration="500">
      <a class="nav-link text-white d-flex align-items-center" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20" fill="currentColor" height="20">
          <path d="M12,12A6,6,0,1,0,6,6,6.006,6.006,0,0,0,12,12ZM12,2A4,4,0,1,1,8,6,4,4,0,0,1,12,2Z"/>
          <path d="M12,14a9.01,9.01,0,0,0-9,9,1,1,0,0,0,2,0,7,7,0,0,1,14,0,1,1,0,0,0,2,0A9.01,9.01,0,0,0,12,14Z"/>
        </svg>
        Users
      </a>
    </li>
    <li class="nav-item mb-2" data-aos="fade-up" data-aos-duration="500">
      <a class="nav-link text-white d-flex align-items-center" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" id="Outline" fill="currentColor" viewBox="0 0 24 24" width="20" height="20">
          <path d="M23,22H3a1,1,0,0,1-1-1V1A1,1,0,0,0,0,1V21a3,3,0,0,0,3,3H23a1,1,0,0,0,0-2Z"/>
          <path d="M15,20a1,1,0,0,0,1-1V12a1,1,0,0,0-2,0v7A1,1,0,0,0,15,20Z"/>
          <path d="M7,20a1,1,0,0,0,1-1V12a1,1,0,0,0-2,0v7A1,1,0,0,0,7,20Z"/>
          <path d="M19,20a1,1,0,0,0,1-1V7a1,1,0,0,0-2,0V19A1,1,0,0,0,19,20Z"/>
          <path d="M11,20a1,1,0,0,0,1-1V7a1,1,0,0,0-2,0V19A1,1,0,0,0,11,20Z"/>
        </svg>
        Reports
      </a>
    </li>
    <li class="nav-item mb-2" data-aos="fade-up" data-aos-duration="500">
      <a class="nav-link text-white d-flex align-items-center" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20" height="20" fill="currentColor" style="color:white;">
          <path d="M12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/>
          <path d="M21.294,13.9l-.444-.256a9.1,9.1,0,0,0,0-3.29l.444-.256a3,3,0,1,0-3-5.2l-.445.257A8.977,8.977,0,0,0,15,3.513V3A3,3,0,0,0,9,3v.513A8.977,8.977,0,0,0,6.152,5.159L5.705,4.9a3,3,0,0,0-3,5.2l.444.256a9.1,9.1,0,0,0,0,3.29l-.444.256a3,3,0,1,0,3,5.2l.445-.257A8.977,8.977,0,0,0,9,20.487V21a3,3,0,0,0,6,0v-.513a8.977,8.977,0,0,0,2.848-1.646l.447.258a3,3,0,0,0,3-5.2Zm-2.548-3.776a7.048,7.048,0,0,1,0,3.75,1,1,0,0,0,.464,1.133l1.084.626a1,1,0,0,1-1,1.733l-1.086-.628a1,1,0,0,0-1.215.165,6.984,6.984,0,0,1-3.243,1.875,1,1,0,0,0-.96.94A6.988,6.988,0,0,1,12,17.9a7.038,7.038,0,0,1-3.484-.816,1,1,0,0,0-.96-.94,6.984,6.984,0,0,1-3.242-1.875,1,1,0,0,0-1.215-.165L2.55,10.8a1,1,0,0,1-.18-1.465,7.048,7.048,0,0,1,0-3.75A1,1,0,0,0,3.465,5.2L4.55,4.6a1,1,0,0,1,1,.165A6.99,6.99,0,0,1,12,6.1a7.044,7.044,0,0,1,3.484.816,1,1,0,0,0,1.215-.165l1.085-.626a1,1,0,0,0,.18-1.465Z"/>
        </svg>
        Settings
      </a>
    </li>
  </ul>
  </div>



  <!-- Scripts -->
  <script>
   document.getElementById('toggleSidebar').addEventListener('click', function () {
  const sidebar = document.getElementById('sidebar');
  sidebar.classList.toggle('active');
});

  </script>
</body>
</html>
