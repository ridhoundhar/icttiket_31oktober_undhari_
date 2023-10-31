<?php
    include "../data/jumlah.php"; 
?>
<head>
</head>
<body>
    
<div class="row">


        <div class="col-lg-5 bg">
        <div class="shadow shadown p-3" style="height: 100%;">
            <div class="d-flex  justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Tiket</h6>
                <div class="dropdown">
                    <h6 class=" dropdown-toggle text-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        download
                    </h6>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item bi bi-box-arrow-in-down" href="download.php"> Semua Data</a>
                            <!-- <a class="dropdown-item bi bi-box-arrow-in-down" href="down_d_request.php?type=demand"> Demand Request</a>
                            <a class="dropdown-item bi bi-box-arrow-in-down" href="down_request.php"> Request</a> -->
                        </div>
                    </div>
                </div><hr>
                

                <?php if ($totalData > 0): ?>
                <div class="card-body">
                    <h4 class="small font-weight-bold"><?php echo $totalRequest;?> Request <span class="float-right"><?php echo number_format(($totalRequest / $totalData) * 100, 2) . '%'; ?></span></h4>
                    <div class="progress mb-2">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo number_format(($totalRequest / $totalData) * 100, 2) . '%'; ?>" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold"><?php echo $totalDemand;?> Demand Request <span class="float-right"><?php echo number_format(($totalDemand / $totalData) * 100, 2) . '%'; ?></span></h4>
                    <div class="progress mb-2">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo number_format(($totalDemand / $totalData) * 100, 2) . '%'; ?>" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold"><?php echo $totalData;?> Jumlah Data <span class="float-right"><?php echo number_format($percentageTotalDemandAndRequest, 2) . '%'; ?></span></h4>
                    <div class="progress mb-2">
                        <div class="progress-bar" role="progressbar" style="width: <?php echo number_format($percentageTotalDemandAndRequest, 2) . '%'; ?>" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" ></div>
                    </div>
                    </div>
                    <?php else: ?>
                        <p class="p-3">Data Tidak Ada.</p>
                    <?php endif; ?>
                </div>
            </div>
            


            
    <!-- line chart -->
    <div class="col-lg-3">
        <div class="bg-dark shadown p-1" style="height: 50%;">
            <div class="card-body pt-0">
                <canvas id="barChart" class="chart-canvas" height="1100" width="1402" style="display: block; box-sizing: border-box; height:160px; width: 401px;"></canvas>
            </div>
        </div>
    </div>

    <!-- pie chart -->
    <div class="col-lg-4">
        <div class="bg-danger shadown p-3" style="height: 50%;">
            <h6 class="text-center">Tiket</h6>
            <div class="d-flex card-body pt-0">
                <canvas id="pieChart" class="chart-canvas" height="300" width="1202" style="display: block; box-sizing: border-box; height:160px; width: 401px;"></canvas>
            </div>
        </div>
    </div>

</div>
<div class="shadow shadown row mt-3" style=" margin:0; box-sizing:border-box;">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="border-left-primary  h-100 p-3">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Technician</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalTechnicians ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="border-left-success  h-100 p-3">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Peserta Magang ICT</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_peserta;?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 mb-4">
        <div class="border-left-warning  h-100 p-3">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Data Tiket</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalData;?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 mb-4">
        <div class="border-left-info  h-100 p-3">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Data
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                <?php 
                                    include "../data/type_request.php";
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="row mt-3">
        <div class="col-lg-7">
            <div class="shadow shadown p-3" style="height: 100%;">
                <div class="card-body pt-0">
                    <h6 class="m-0 font-weight-bold text-primary">Technician</h6><hr>
                    <table cellpadding="5" width="100%" cellpadding="50">
                        <tr>
                            <th>No</th>
                            <th>Technician</th>
                            <th>Jumlah Requester</th>
                        </tr>
                        <?php 
                          include 'teknisi.php';
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="shadow shadown p-3" style="height: 100%;">
                <div class="card-body pt-0">
                    <h6 class="m-0 font-weight-bold text-primary">Data Magang</h6><hr>
                    <?php include 'grafik_tahun.php'; ?>
                </div>
            </div>
        </div>
    </div>
</body>








<script>
    const ctxCombined = document.getElementById('barChart').getContext('2d');

    const dataCombined = {
        labels: ['Request', 'Total', 'Demand'],
        datasets: [
            {
                type: 'bar',
                label: 'Jumlah Data',
                data: [<?php echo $totalRequest; ?>, <?php echo $totalData; ?>, <?php echo $totalDemand; ?>],
                backgroundColor: [
                    'rgba(255, 193, 7)',
                    'rgba(0, 123, 255)',
                    'rgba(40, 167, 69)'
                ],
                barThickness: 10,
                borderWidth: 0, 
            },
        ]
    };

    const optionsCombined = {
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    display: false 
                }
            },
            x: {
                grid: {
                    display: false 
                }
            }
        },
        plugins: {
            legend: {
                display: false,
            },
            title: {
                display: true,
                font: {
                    size: 16
                },
                borderWidth: 0
            }
        }
    };
    

    // pieChart

    const combinedChart = new Chart(ctxCombined, {
        type: 'bar',
        data: dataCombined,
        options: optionsCombined
    });

        var data = <?php echo json_encode($data); ?>;

        var labels = [];
        var values = [];
        data.forEach(function(item) {
            labels.push(item.label);
            values.push(item.y);
        });
        var ctx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                datasets: [{
                    data: values,
                    backgroundColor: ['red', 'rgba(40, 167, 69)', 'rgba(0, 123, 255)', 'rgba(255, 193, 7)', 'orange'] 
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

