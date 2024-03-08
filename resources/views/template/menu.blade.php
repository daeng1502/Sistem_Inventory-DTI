<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Navigation</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  
  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
    </li>
    
    
    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <!-- Heading -->
    <div class="sidebar-heading">
      Kelola User
    </div>
    
    <li class="nav-item">
      <a class="nav-link" href="/user">
        <i class="fas fa-fw fa-folder"></i>
        <span>Data User</span></a>
      </li>
      
      <hr class="sidebar-divider">


 <!-- Heading -->
 <div class="sidebar-heading">
    Kelola Barang
</div>

  <!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
        aria-expanded="true" aria-controls="collapseOne">
        <i class="fas fa-fw fa-folder"></i>
        <span>Data Barang</span>
    </a>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="/ManajemenItem">Manajemen Item</a>
            <a class="collapse-item" href="/barangQRScanner">Scan QR Code</a>
        </div>
    </div>
</li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Utilities:</h6>
              <a class="collapse-item" href="utilities-color.html">Colors</a>
              <a class="collapse-item" href="utilities-border.html">Borders</a>
              <a class="collapse-item" href="utilities-animation.html">Animations</a>
              <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
      </div>
  </li> -->

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Distribusi
  </div>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('lokasi.data') }}">
      <i class="fas fa-fw fa-folder"></i>
        <span>Data Lokasi</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('distribusi.data') }}">
      <i class="fas fa-fw fa-folder"></i>
        <span>Distribusi</span></a>
  </li>


    <!-- Divider -->
    <hr class="sidebar-divider">  

    <div class="sidebar-heading">
      Maintanance
  </div>

  <li class="nav-item">
    <a class="nav-link" href="index.html">
      <i class="fas fa-fw fa-folder"></i>
        <span>Maintanance</span></a>
  </li>

   <!-- Divider -->
   <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Procurement
  </div>

  <li class="nav-item">
    <a class="nav-link" href="index.html">
      <i class="fas fa-fw fa-folder"></i>
        <span>Pengadaan</span></a>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

   <!-- Heading -->
   <div class="sidebar-heading">
      Laporan
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
          aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-folder"></i>
          <span>Report</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <!-- <h6 class="collapse-header">Custom Components:</h6> -->
              <a class="collapse-item" href="/">Data Barang</a>
              <a class="collapse-item" href="/">Data Distribusi</a>
              <a class="collapse-item" href="/">Data Maintanance</a>
              <a class="collapse-item" href="/">Data Pengadaan</a>

            </div>
      </div>
  </li>

   <!-- Divider -->
   <hr class="sidebar-divider d-none d-md-block">
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>