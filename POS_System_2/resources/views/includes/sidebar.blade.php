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
          <li class="nav-item"> <a class="nav-link" href="{{ route('register')}}">Add User</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('user.view')}} ">View All User</a></li>
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
          <li class="nav-item"><a class="nav-link" href="{{ route('stock.index')}}">Current Stock</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('purchase.index')}}">Purchase</a></li>
        </ul>
      </div>
    </li>

    <!--=====================   Category   ==========================-->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
        <i class="icon-columns menu-icon"></i>
        <span class="menu-title">Category </span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="category">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{ route('category.add')}}">Add Category</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('category.view')}}">View Category</a></li>
        </ul>
      </div>
    </li>

    <!--=====================   Category   ==========================-->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#unit" aria-expanded="false" aria-controls="unit">
        <i class="icon-columns menu-icon"></i>
        <span class="menu-title">Units </span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="unit">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{ route('unit.add')}}">Add Unit </a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('unit.view')}}">View Unit </a></li>
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
          <li class="nav-item"> <a class="nav-link" href="{{ route('product.add')}}">Add Product </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('product.view')}}">View ALl Product </a></li>
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
          <li class="nav-item"> <a class="nav-link" href="{{ route('sale.index')}}">Sales </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('sale.report')}}">View Reports </a></li>
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
          <li class="nav-item"> <a class="nav-link" href="{{ route('supplier.add')}}">Add Supliers</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('supplier.view')}}">View All Supliers</a></li>
        </ul>
      </div>
    </li>

    <!--=====================   Settings   ==========================-->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('setting.index')}}">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Settings </span>
      </a>
    </li>
  </ul>
</nav>