

<style>
.nav-link.active {
  background-color: #1aa179 !important; /* Ensuring no other rule overrides this */
  color: white !important; /* Ensuring text color is white */
}
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="cstart_point.php" class="brand-link">
    <img src="../../dist/img/tir-logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">&ensp;TUBE | INSPECTION</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../dist/img/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="cstart_point.php" class="d-block"><?=htmlspecialchars(strtoupper($_SESSION['username']));?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="cstart_point.php" class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/tube_inspection/page/cot/cstart_point.php") ? 'active' : '' ?>">
            <i class="nav-icon fas fa-play-circle"></i>
            <p>Start Point</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="cmass_production.php" class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/tube_inspection/page/cot/cmass_production.php") ? 'active' : '' ?>">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>Mass Production</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="cend_point.php" class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/tube_inspection/page/cot/cend_point.php") ? 'active' : '' ?>">
            <i class="nav-icon fas fa-stop-circle"></i>
            <p>End Point</p>
          </a>
        </li>

        <?php include 'logout.php';?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
