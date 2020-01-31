<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="/administrator" class="brand-link">
    <img src="{{ asset('img/adminlogo.png') }}"
         alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Lucky Draw</span>
  </a>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="https://place-hold.it/160x160" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('admin.home') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Lucky Draw
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.prizes') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Lucky Draw Prizes
            </p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>