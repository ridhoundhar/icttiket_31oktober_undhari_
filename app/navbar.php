
<?php
  // Mendapatkan nama file dari URL saat ini
  $current_page = basename($_SERVER['PHP_SELF']);
?>
<div class="d-flex flex-column flex-shrink-0 p-3  Sidebar shadow" id="wrapper" style="background: #263e66; z-index: 9999; border-radius: 10px ; ">
    <a href="http://ridhoae.test:8888/app_tiket2/assets/img/sp.png" class="p-2 align-items-center b text-white text-decoration-none">
      <span class="fs-4"><img src="../assets/img/sp.png" width="30"  alt="sp"> ICT Tiket</span>
    </a>
    <hr>
<ul class="nav nav-pills flex-column mb-auto">
  <li class="nav-item">
    <a href="index.php" class="nav-link text-white <?php if ($current_page === 'index.php') echo 'active'; ?>" aria-current="page">
      <i class="bi bi-house-door"></i> Home
    </a>
  </li>
  <li>
    <a href="import.php" class="nav-link text-white <?php if ($current_page === 'import.php') echo 'active'; ?>">
      <i class="bi bi-ticket"></i> Tiket
    </a>
  </li>
  <!-- <li>
    <a href="request.php" class="nav-link text-white <?php if ($current_page === 'request.php') echo 'active'; ?>">
      <i class="bi bi-grid"></i> Request
    </a>
  </li> -->
  <li>
    <a href="magang.php" class="nav-link text-white <?php if ($current_page === 'magang.php') echo 'active'; ?>">
      <i class="bi bi-person"></i> Magang ICT
    </a>
  </li>
  <!-- <li>
    <a href="chat.php" class="nav-link text-white <?php //if ($current_page === 'chat.php') echo 'active'; ?>">
      <i class="bi bi-chat"></i> Chatt
    </a>
  </li> -->
  <li>
    <a href="history.php" class="nav-link text-white <?php if ($current_page === 'history.php') echo 'active'; ?>">
    <i class="bi bi-clock-history"></i> Riwayat
    </a>
  </li>
</ul>
<?php include 'footer.php'; ?>
<hr>
<div class="d-flex justify-content-between">
  <a href="../logout.php" class="d-flex align-items-center text-white text-decoration-none">
    <strong class="bi bi-box-arrow-left"> Log Out</strong>
  </a><br>
  <a href="setting.hp" class="d-flex align-items-center text-white text-decoration-none">
    <i class="bi bi-gear"> Setting</i>
  </a>
</div>
</div>
</div>



