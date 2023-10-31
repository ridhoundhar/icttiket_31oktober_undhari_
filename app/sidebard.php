<?php
  // Mendapatkan nama file dari URL saat ini
  $current_page = basename($_SERVER['PHP_SELF']);
?>
<style>
    .nav_list a {
        text-decoration :underline;
    }
</style>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <?php
            
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                date_default_timezone_set('Asia/Jakarta');
                $tanggal = date('h:i');
                echo " {$tanggal}";
                ?>
                |
                <?php 
                echo $_SESSION['username'];
            } else {
                echo "Silakan login terlebih dahulu.";
            }
        ?>
    </header>
            
    <div class="sidebar shadow" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="http://ridhoae.test:8888/app_tiket2/assets/img/sp.png" class="nav_logo" style="text-decoration: none;"> 
                    <img src="../assets/img/sp.png" width="30" alt="">
                    <span class="nav_logo-name"><b> Tiket ICT </b></span>
                </a><br><br>
                <div class="nav_list"> 
                    <a href="index.php" class="nav_link <?php if ($current_page === 'index.php') echo 'active'; ?>" style="text-decoration:none;">
                        <i class='bx bx-grid-alt shadow ulnav p-2 nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a> 
                    <a href="import.php" class="nav_link <?php if ($current_page === 'import.php') echo 'active'; ?>"  style="text-decoration:none;">
                        <i class='bx bx-bar-chart-alt-2 shadow ulnav p-2 nav_icon'></i>
                        <span class="nav_name">Tiket</span> 
                    </a> 
                    <a href="magang.php" class="nav_link <?php if ($current_page === 'magang.php') echo 'active'; ?>"  style="text-decoration:none;"> 
                        <i class='bx bx-user shadow ulnav p-2 nav_icon'></i> 
                        <span class="nav_name">Magang</span> 
                    </a>
                    <?php
                    $conn = mysqli_connect("localhost", "root", "root", "tiket");

                    if (!$conn) {
                        die("Koneksi gagal: " . mysqli_connect_error());
                    }
                    $username = $_SESSION['username'];
                    $query = "SELECT role FROM admin WHERE username = '$username'";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $role = $row['role'];
                        if ($role === 'admin') {
                            echo '<a href="users.php" class="nav_link';
                            if ($current_page === 'users.php') {
                                echo ' active';
                            }
                            echo '" style="text-decoration:none;"> 
                                    <i class=\'bx bxs-user-account shadow ulnav p-2 nav_icon\'></i> 
                                    <span class="nav_name">Magang</span> 
                                </a>';
                        }
                    }

                    mysqli_close($conn);
                    ?>

                </div>
            </div> 
                <a href="../logout.php" style="text-decoration: none;" class="nav_link"> <i class='bx bx-log-out nav_icon ulnav shadow p-2 nav_icon'></i> <span class="nav_name">Log Out</span> </a>
        </nav>
    </div>
    <!--Container Main start-->


    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
        
        const showNavbar = (toggleId, navId, bodyId, headerId) =>{
        const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId),
        bodypd = document.getElementById(bodyId),
        headerpd = document.getElementById(headerId)

        // Validate that all variables exist
        if(toggle && nav && bodypd && headerpd){
        toggle.addEventListener('click', ()=>{
        // show navbar
        nav.classList.toggle('show')
        // change icon
        toggle.classList.toggle('bx-x')
        // add padding to body
        bodypd.classList.toggle('body-pd')
        // add padding to header
        headerpd.classList.toggle('body-pd')
        })
        }
        }

        showNavbar('header-toggle','nav-bar','body-pd','header')

        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll('.nav_link')

        function colorLink(){
        if(linkColor){
        linkColor.forEach(l=> l.classList.remove('active'))
        this.classList.add('active')
        }
        }
        linkColor.forEach(l=> l.addEventListener('click', colorLink))

        // Your code to run since DOM is loaded and ready
        });
    </script>