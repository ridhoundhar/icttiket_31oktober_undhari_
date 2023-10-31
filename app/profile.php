<?php
            
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                date_default_timezone_set('Asia/Jakarta');
                $tanggal = date('h:i');
                echo " {$tanggal}";
                echo $_SESSION['username'];
            } else {
                echo "Silakan login terlebih dahulu.";
            }
        ?>