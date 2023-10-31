<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Tiket | <?php echo $pageTitle; ?> </title>
    <link rel="shortcut icon" href="../assets/img/sp.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300&display=swap" rel="stylesheet">
    <!-- chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- chatt -->
        <!-- <script
        type="text/javascript">window.$crisp = []; window.CRISP_WEBSITE_ID = "cebb6914-4e18-4aff-8e2e-bfe91d6e881f"; (function () { d = document; s = d.createElement("script"); s.src = "https://client.crisp.chat/l.js"; s.async = 1; d.getElementsByTagName("head")[0].appendChild(s); })();</script> -->

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">    <style>
        .Sidebar {
          width: 261px;
          position: fixed;
          z-index: 1;
          top: 3px;
          left: 3px;
          bottom: 3px;
          overflow-x: hidden;
          padding-top: 20px;
        }
        * {
          font-family: 'Nunito Sans', sans-serif;
        }

        .warna {
            border-radius: 50%;
        }

        .sidebar {
            transition: right 0.3s ease-in-out;
        }


        span {
            width: 25px;
        }
        .tombol {
            position: absolute;
            margin-left: -73px;
            border-radius: 50%;
            bottom: 10px;
            width: 50px;
            height: 50px;
            padding: 6px 2px 2px 12px;
            font-size: 25px;
        }
        .rotate {
            display: inline-block;
            animation: spin 6s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }


        /* dark mode */
        .dark-mode {
            background-color: #333;
            color: white; 
            
        }
        .cardd {
            border-radius: 3px;
            color: black;
        }

        .bg-darkk {
            margin: -16px 0 0 -17px;
            width: 241px;
            background-color: #17a2b8;
            border-radius: 3px 3px 0 0 ;
        }
        
    </style>
  </head>
  <body id="DarkMode">
      <div class="cardd shadow bg-white col-md-2 p-3 m-3 sidebar" style="z-index: 99999; height: 785px; position: fixed; top: 0; right: -260px;">
          <form method="post" action="">
              <div class="tombol bg-info" onclick="toggleSidebar()">
                  <p class="rotate" >
                      <i class="bi bi-gear"></i>
                  </p>
              </div>
                <div class="bg-darkk p-3 text-white">
                    <h4><b>Theme Customizer</b></h4>
                </div><br><br>
            
              <div class="card-title text-center p-2">
                  <h5>Sidebar Color</h5><hr>
              </div>
              <div class="shadow p-5 d-flex p-2">
                  <a href="javascript:void(0)" class="switch-trigger background-color">
                      <div class="m-2">
                          <span class="badge card filter bg-primary text-primary active" data-color="primary" onclick="sidebarColor(this)">a</span>
                          <span class="badge card filter bg-dark text-dark" data-color="dark" onclick="sidebarColor(this)">a</span>
                          <span class="badge card filter bg-info text-info" data-color="info" onclick="sidebarColor(this)">a</span>
                          <span class="badge card filter bg-success text-success" data-color="success" onclick="sidebarColor(this)">a</span>
                          <span class="badge card filter bg-warning text-warning" data-color="warning" onclick="sidebarColor(this)">a</span>
                          <span class="badge card filter bg-danger text-danger" data-color="danger" onclick="sidebarColor(this)">a</span>
                      </div>
                  </a>
              </div>
                <div class="card-title text-center m-2 p-2">
                    <h5>Dark Mode</h5><hr>
                </div>
                <div class="shadow p-3 d-flex">
                    <h6 class="mb-0">Dark / Light </h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto is-filled">
                        <div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Theme Mode" data-bs-original-title="Theme Mode"onclick="toggleLightDarkMode()" checked="true">
                            <i class="bi bi-circle-half"></i>
                        </div>
                    </div>
                </div>


                <div class="d-flex justify-content-between mt-5">
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-linkedin"></i>
                    <i class="bi bi-github"></i>
                    <i class="bi bi-instagram"></i>
                    <i class="bi bi-twitter"></i>
                </div>
                <div class="card-title text-center p-2">
                    <?php include "footer.php"; ?><hr>
                </div>

          </form>
      </div>


    <div class="nav">
        <nav>
            <?php 
              include "../app/navbar.php";
            ?>
        </nav>
        <div class="content">
          
        </div>
    </div>



    <script>
        let sidebarVisible = true;
        const sidebar = document.querySelector('.sidebar');

        function toggleSidebar() {
            sidebarVisible = !sidebarVisible;
            if (sidebarVisible) {
                sidebar.style.right = '0';
            } else {
                sidebar.style.right = '-260px';
            }
        }

        function sidebarColor(colorElement) {
            const selectedColor = colorElement.getAttribute('data-color');
            const sidebar = document.querySelector('.Sidebar');

            switch (selectedColor) {
                case 'primary':
                    sidebar.style.backgroundColor = '#007bff'; 
                    break;
                case 'dark':
                    sidebar.style.backgroundColor = '#343a40'; 
                    break;
                case 'info':
                    sidebar.style.backgroundColor = '#17a2b8'; 
                    break;
                case 'success':
                    sidebar.style.backgroundColor = '#28a745'; 
                    break;
                case 'warning':
                    sidebar.style.backgroundColor = '#ffc107'; 
                    break;
                case 'danger':
                    sidebar.style.backgroundColor = '#dc3545'; 
                    break;
                default:
                    sidebar.style.backgroundColor = 'gray'; 
            }
        }


        // darkmode
        const darkMode = document.querySelector('#DarkMode');
        function toggleLightDarkMode() {
            darkMode.classList.toggle('dark-mode');
        }
    </script>
    <script src="../assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
