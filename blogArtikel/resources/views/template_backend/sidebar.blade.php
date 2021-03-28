<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Admin</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="nav-item dropdown">
            <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          </li>
          <li class="menu-header">Starter</li>
          <li class="nav-item dropdown">
            <a href="{{ route('category.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Category</span></a>
          </li>
          <li class="nav-item dropdown">
            <a href="{{ route('tags.index') }}" class="nav-link"><i class="fas fa-tags"></i><span>Tags</span></a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-newspaper"></i> <span>Posts</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('posting.index') }}">List Posts</a></li>
              <li><a class="nav-link" href="{{ route('posting.tampil_delete') }}">Trashed Post</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="{{ route('user.index') }}" class="nav-link"><i class="fas fa-user"></i><span>Admins</span></a>
          </li>
          <li class="nav-item dropdown">
            <a href="{{ route('lapors.index') }}" class="nav-link"><i class="fas fa-exclamation-triangle"></i><span>LAPOR HOAX</span></a>
          </li>
          <li class="nav-item dropdown">
            <a href="{{ route('lokasi.index') }}" class="nav-link"><i class="fas fa-map-marker"></i><span>Add Lokasi</span></a>
          </li>
    </aside>
  </div>