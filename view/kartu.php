<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login.html");
    exit();
}
include "../app/title.php";
?>
<head>
    <link rel="stylesheet" href="../assets/css/costum.css">
    <style>
        h5 span {
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 25px;
        }
        span {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
        }
    </style>
</head>
<?php include '../app/main2.php'?>
<div class="conten-m">
    
    <div class="d-flex justify-content-between">
    
        <div class="card p-3 container form-group">
            <?php
                include "../data/cetak_kartu.php";
            ?>
            <div class="d-flex justify-content-between">
                <div class="col-md-2">
                    <img src="../assets/img/sp.png" alt="sp" width="50">
                </div>
                <div class="col-md-9">
                    <h5><span>TANDA PENGENAL PKL/PENELITIAN</span></h5>
                </div>
            </div>
            
            <hr>
        
        
            <div class="d-flex justify-content-between">
                <div class="col-md-3" id="kartu">
                    <img src='../view/<?php echo  $gambar?>' alt='Gambar' width='70'>
                </div>
                <div class="col">
                    <table width="100%" cellpadding="6" cellspacing="">
                        <tr>
                            <th>
                                <span>
                                    Nama
                                </span>
                            </th>
                            <th>:
                                <span>
                                    <?php echo $nama; ?>
                                </span>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <span>
                                    No. Bp
                                </span>
                            </th>
                            <th>: ......................</th>
                        </tr>
                        <tr>
                            <th>
                                <span>
                                    Preg
                                </span>
                            </th>
                            <th>: <?php echo $universitas; ?></th>
                        </tr>
                        <tr>
                            <th>
                                <span>
                                    Jadwal
                                </span>
                            </th>
                            <th>: <?php echo $tglMasuk . "/" . $tglKeluar ?></th>
                        </tr>
                    </table> 
                </div>
            </div>
        </div>
        
        <div class="card p-3 container form-group">
            <div class="d-flex justify-content-between">
                <div class="col-md-2">
                    <img src="../assets/img/sp.png" alt="sp" width="50">
                </div>
                <div class="col-md-9">
                    <h5><span>TANDA PENGENAL PKL/PENELITIAN</span></h5>
                </div>
            </div>
            
            <hr>
        
        
            <div class="d-flex justify-content-between">
                <div class="col-md-3">
                    <img src='../view' alt='Gambar' width='70' height="118">
                </div>
                <div class="col">
                    <table width="100%" cellpadding="6" cellspacing="">
                        <tr>
                            <th>Nama </th>
                            <th>: ...............................................</th>
                        </tr>
                        <tr>
                            <th>No. Bp </th>
                            <th>: ...............................................</th>
                        </tr>
                        <tr>
                            <th>Preg </th>
                            <th>: ...............................................</th>
                        </tr>
                        <tr>
                            <th>Nama :</th>
                            <th>: ...............................................</th>
                        </tr>
                    </table> 
                </div>
            </div>
        </div>
    </div>
    
    <button class="btn btn-primary bi bi-printer" id="cetakButton"> Cetak</button>
</div>

<script>
    document.getElementById('cetakButton').addEventListener('click', function() {
        const elementsToHide = document.querySelectorAll('body > *:not(#kartu)');
        elementsToHide.forEach(function(element) {
            element.style.display = 'none';
        });

        window.print();

        elementsToHide.forEach(function(element) {
            element.style.display = '';
        });
    });
</script>
