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

  <!-- Heading -->
  <div class="sidebar-heading">
    Menu
  </div>

  <li class="nav-item <?= url_is('/kriteria') ? 'active' : '' ?>">
    <a class="nav-link" href="/kriteria">
      <i class="fas fa-fw fa-table"></i>
      <span>Kriteria</span></a>
  </li>

  <li class="nav-item <?= url_is('sub-kriteria') || url_is('sub-kriteria/create') ? 'active' : '' ?>">
    <a class="pt-0 nav-link collapsed" href="#" data-toggle="collapse" data-target="#subkriteriaCollapse" aria-expanded="true" aria-controls="subkriteriaCollapse">
      <i class="fas fa-fw fa-table"></i>
      <span>Sub Kriteria</span>
    </a>
    <div id="subkriteriaCollapse" class="collapse" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="/sub-kriteria">Master Data</a>
        <a class="collapse-item" href="/sub-kriteria/create">Create</a>
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
<!-- End of Sidebar -->
