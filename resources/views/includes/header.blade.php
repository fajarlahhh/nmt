<div id="header" class="header navbar-default">
  <!-- begin navbar-header -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle m-l-0 m-r-0" data-click="sidebar-toggled">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a href="javascript:;" class="navbar-brand">
      <b class="mr-1">Nice</b> Metavest
    </a>
    <!-- begin header-nav -->
    <ul class="navbar-nav navbar-right pull-right">
      <li class="dropdown navbar-user">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="/assets/img/logo.png" style="width: 34px">
          <b>{{ auth()->user()->username }}</b>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="/profile" class="dropdown-item">My Profile</a>
          <a href="javascript:;" data-toggle="modal" data-target="#passwordModal" class="dropdown-item">Change
            Password</a>
          <div class="dropdown-divider"></div>
          <a href="javascript:;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="dropdown-item">Log Out</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
    </ul>
    <!-- end header-nav -->
  </div>
  <!-- end navbar-header -->
</div>
<!-- end #header -->
