<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="index.html"><img src="{{asset('assets/images/logoGL.png')}}" alt="logo" /></a>
      
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="{{asset('assets/images/faces/face15.jpg')}}" alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <span>HELLO</span>
              <h5 class="mb-0 font-weight-normal">cc</h5>
             
            </div>
          </div>
   
        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('dashboard')}}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Master Data</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('kamar.index')}}">Kamar</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('fasilitaskamar.index')}}">Fasilitas Kamar </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('fasilitashotel.index')}}">Fasilitas Hotel</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('reservasi.index')}}">
          <span class="menu-icon">
            <i class="mdi mdi-book"></i>
          </span>
          <span class="menu-title">Reservasi</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="">
          <span class="menu-icon">
            <i class="mdi mdi-book"></i>
          </span>
          <span class="menu-title">Report</span>
        </a>
      </li>
    </ul>
  </nav>