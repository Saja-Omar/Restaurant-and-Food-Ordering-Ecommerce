<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
      </ul>

    </form>
    <ul class="navbar-nav navbar-right">

      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img
        alt="image"
        src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('uploads/avatar.jpg') }}"
        class="rounded-circle mr-1">



        <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-title">Logged in 5 min ago</div>
          <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
          </a>
          <a href="features-activities.html" class="dropdown-item has-icon">
            <i class="fas fa-bolt"></i> Activities
          </a>
          <a href="features-settings.html" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Settings
          </a>
          <div class="dropdown-divider"></div>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>

          <a href="#" class="nav-link has-dropdown"><span>Dashboard</span></a>

            <li class=active><a class="nav-link" href="index-0.html"><i class="fas fa-fire"></i>General Dashboard</a></li>


        <li class="menu-header">Starter</li>

        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
            <span>Manage Restaurant</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('admin.Category.index') }}">Product Categories</a></li>
            <li><a class="nav-link" href="{{ route('admin.product.index') }}">Product </a></li>

          </ul>
        </li>

        <li><a class="nav-link" href="{{ route('admin.Slider.index') }}"><i class="far fa-square"></i> <span>Slider</span></a></li>

      </ul>
    </aside>
  </div>
