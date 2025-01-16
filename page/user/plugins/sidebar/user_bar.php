

<style>
.nav-link.active {
  background-color: #1aa179 !important;
  color: white !important; 
}
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <a href="dashboard.php" class="brand-link">
    <img src="../../dist/img/tir-logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">&ensp;TUBE INSPECTION</span>
  </a>

 
  <div class="sidebar">
   
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../dist/img/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="dashboard.php" class="d-block"><?=htmlspecialchars(strtoupper($_SESSION['username']));?></a>
      </div>
    </div>

   
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href=" dashboard.php" class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/tube_inspection/page/user/dashboard.php") ? 'active' : '' ?>">
          <i class="nav-icon fas fa-box"></i>
            <p>Dashboard</p>
          </a>
        </li>
       
      

        <li class="nav-item">
          <a href="export.php" class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/tube_inspection/page/user/export.php") ? 'active' : '' ?>">
            <i class="nav-icon fas fa-file-export"></i>
            <p>Export</p>
          </a>
        </li>

        <?php include 'logout.php';?>
      </ul>
    </nav>
  
  </div>
  
</aside>
