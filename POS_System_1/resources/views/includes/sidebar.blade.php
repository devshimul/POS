<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    <!--=====================   Dashboard   ==========================-->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('main.dashboard')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <!--=====================   Users   ==========================-->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Users</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="users">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#">Add User</a></li>
          <li class="nav-item"> <a class="nav-link" href="#">View All User</a></li>
        </ul>
      </div>
    </li>

    <!--=====================   Stocks   ==========================-->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#stocks" aria-expanded="false" aria-controls="stocks">
        <i class="icon-columns menu-icon"></i>
        <span class="menu-title">Stocks </span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="stocks">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="#">Buy</a></li>
        </ul>
      </div>
    </li>

    <!--=====================   Products   ==========================-->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">
        <i class="icon-bar-graph menu-icon"></i>
        <span class="menu-title">Products</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="products">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#">Add Product </a></li>
          <li class="nav-item"> <a class="nav-link" href="#">View ALl Product </a></li>
        </ul>
      </div>
    </li>

    <!--=====================   Sales   ==========================-->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#sales" aria-expanded="false" aria-controls="sales">
        <i class="icon-grid-2 menu-icon"></i>
        <span class="menu-title">Sales</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="sales">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#">Sales </a></li>
          <li class="nav-item"> <a class="nav-link" href="#">View Reports </a></li>
        </ul>
      </div>
    </li>

    <!--=====================   Supliers   ==========================-->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#supliers" aria-expanded="false" aria-controls="supliers">
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Supliers</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="supliers">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#">Add Supliers</a></li>
          <li class="nav-item"> <a class="nav-link" href="#">View All Supliers</a></li>
        </ul>
      </div>
    </li>

    <!--=====================   Settings   ==========================-->
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Settings </span>
      </a>
    </li>
  </ul>
</nav>