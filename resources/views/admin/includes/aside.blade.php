<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('admin/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>
  <!-- Brand Logo end -->

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Avatar Usuario -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ Auth::user()->image }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>
    <!-- Avatar Usuario end -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      
        <!-- Menu Usuarios -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link {{-- active --}}">
            <i class="nav-icon fas fa-users"></i>
            <p>Usuarios<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/users') }}" class="nav-link">
                <i class="fas fa-list-ul nav-icon"></i>
                <p>Listar Usuarios</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-user-plus nav-icon"></i>
                <p>Agregar Usuarios</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Menu Usuarios end -->

        <!-- Menu Productos -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link {{-- active --}}">
            <i class="nav-icon fas fa-users"></i>
            <p>Productos<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/products') }}" class="nav-link">
                <i class="fas fa-list-ul nav-icon"></i>
                <p>Listar Productos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/products/create') }}" class="nav-link">
                <i class="fas fa-user-plus nav-icon"></i>
                <p>Agregar Producto</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Menu Productos end -->

        <!-- Menu Categorías -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link {{-- active --}}">
            <i class="nav-icon fas fa-users"></i>
            <p>Categorías<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/categories') }}" class="nav-link">
                <i class="fas fa-list-ul nav-icon"></i>
                <p>Listar Categorías</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/categories/create') }}" class="nav-link">
                <i class="fas fa-user-plus nav-icon"></i>
                <p>Agregar Categoría</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Menu Categorías end -->

      </ul>
    </nav>
    <!-- Sidebar-menu end -->
  </div>
  <!-- Sidebar end -->
</aside>
<!-- Main Sidebar Container end -->