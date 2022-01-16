  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dashboard_files/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CRM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dashboard_files/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            {{ auth()->user()->name}}
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item menu-open ">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                @lang('site.dashboard')
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-language"></i>
              <p>
                @lang('site.language')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('lang/ar')}}" class="nav-link">
                  <i class="fa fa-flag nav-icon"></i>
                  <p> @lang('site.arabic')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('lang/en')}}" class="nav-link">
                  <i class="fa fa-flag nav-icon"></i>
                  <p> @lang('site.english')</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>
                @lang('site.admins')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('dashboard.admin.index')}}" class="nav-link">
                  <i class="fa fa-user-shield nav-icon"></i>
                  <p> @lang('site.admins')</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-hotel"></i>
              <p>
                @lang('site.companies')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('dashboard.company.index')}}" class="nav-link">
                  <i class="fas fa-hotel nav-icon"></i>
                  <p>@lang('site.companies')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.company.create')}}" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>@lang('site.create')</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- contactperson --}}
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                @lang('site.contactPeople')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('dashboard.contactPerson.index')}}" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>@lang('site.contactPeople')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.contactPerson.create')}}" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>@lang('site.create')</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>