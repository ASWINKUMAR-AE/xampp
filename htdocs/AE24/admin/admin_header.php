  <!-- Header -->
  <header class="flex items-center justify-between " style="padding-right:10px;          background-image:url(images/header.png) !important; background-position-x:73%;">
  <a href="index.html"><img src="images/logo.png" width="120">
</a>
    <div class="flex space-x-5 items-center justify-center" >
    
      <div>
        <a href="#" onclick="toggleMode()">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cursor-pointer hover:text-gray-300">
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
            <path stroke="none" d="M15 12c0-.29-.19-.53-.5-.69L4 7.84a1.5 1.5 0 0 1 .5-1.5v5a1.5 1.5 0 0 1-3 0v-5a1.5 1.5 0 0 1 .5-1.5l8.5-3.5c.26-.1.5 0 .5.1z"/>
          </svg>

        </a>
    
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
 