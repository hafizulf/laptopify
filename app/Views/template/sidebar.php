<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <div class="sidebar-brand-icon">
      <i class="fas fa-laptop-code"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Laptopify</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <?php if (session('role') === 'Admin') : ?>

    <!-- Heading -->
    <div class="sidebar-heading">
      Admin
    </div>

    <li class="nav-item <?= url_is('/manage-user') || url_is('manage-role')  ? 'active' : '' ?>">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#usersCollapse" aria-expanded="true" aria-controls="usersCollapse">
        <i class="fas fa-fw fa-users"></i>
        <span>Manage User</span>
      </a>
      <div id="usersCollapse" class="collapse" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="/manage-role">Role</a>
          <a class="collapse-item" href="/manage-user">User</a>
        </div>
      </div>
    </li>


  <?php endif; ?>

  <div class="sidebar-heading">
    Menu
  </div>

  <li class="nav-item <?= url_is('/user-profile') ? 'active' : '' ?>">
    <a class="nav-link pb-0" href="/user-profile">
      <i class="fas fa-fw fa-user"></i>
      <span>My Profile</span></a>
  </li>

  <li class="nav-item <?= url_is('/home') ? 'active' : '' ?>">
    <a class="nav-link pb-0" href="/home">
      <i class="fas fa-fw fa-info"></i>
      <span>Informasi</span></a>
  </li>

  <li class="nav-item <?= url_is('/kriteria') || url_is('sub-kriteria') || url_is('sub-kriteria/create') ? 'active' : '' ?>">
    <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#kriteriaCollapse" aria-expanded="true" aria-controls="kriteriaCollapse">
      <i class="fas fa-fw fa-table"></i>
      <span>Kriteria</span>
    </a>
    <div id="kriteriaCollapse" class="collapse" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="/kriteria">Kriteria</a>
        <a class="collapse-item" href="/sub-kriteria">Sub Kriteria</a>
      </div>
    </div>
  </li>

  <li class="nav-item <?= url_is('/bobot') ? 'active' : '' ?>">
    <a class="nav-link pb-0" href="/bobot">
      <i class="fas fa-fw fa-weight"></i>
      <span>Pembobotan Kriteria</span></a>
  </li>

  <li class="nav-item <?= url_is('/alternatif') ? 'active' : '' ?>">
    <a class="nav-link pb-0" href="/alternatif">
      <i class="fas fa-fw fa-database"></i>
      <span>Data Alternatif</span></a>
  </li>

  <li class="nav-item <?= url_is('/perhitungan/nilai-kriteria') || url_is('/perhitungan/nilai-utility') || url_is('/perhitungan/nilai-akhir') ? 'active' : '' ?>">
    <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#hitungCollapse" aria-expanded="true" aria-controls="hitungCollapse">
      <i class="fas fa-fw fa-calculator"></i>
      <span>Proses Perhitungan</span>
    </a>
    <div id="hitungCollapse" class="collapse" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="/perhitungan/nilai-kriteria">Nilai Kriteria</a>
        <a class="collapse-item" href="/perhitungan/nilai-utility">Nilai Utility</a>
        <a class="collapse-item" href="/perhitungan/nilai-akhir">Nilai Akhir</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block mt-2">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->
