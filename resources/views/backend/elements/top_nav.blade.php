<div class="navbar-header ">
  <a class="navbar-brand" href="/admin">Hello, Tien Nguyen</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</div>
<!-- Top Menu Items -->
<div class="nav navbar-right top-nav ">
  <div class="dropdown">
    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-envelope"></i></a>
    <div class="dropdown-menu dropdown-menu-right message-dropdown" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="#">
        <div class="media">
          <img src="http://placehold.it/50x50" alt="John Doe" class="mr-2 mt-2" >
          <div class="media-body">
            <h5 class="media-heading"><strong>John Smith</strong></h5>
            <p class="small text-muted"><i class="fal fa-clock"></i> Yesterday at 4:32 PM</p>
            <p >Lorem ipsum dolor ...</p>
          </div>
        </div>
      </a>
      <a class="dropdown-item" href="#">
        <div class="media">
          <img src="http://placehold.it/50x50" alt="John Doe" class="mr-2 mt-2" >
          <div class="media-body">
            <h5 class="media-heading"><strong>John Smith</strong></h5>
            <p class="small text-muted"><i class="fal fa-clock"></i> Yesterday at 4:32 PM</p>
            <p>Lorem ipsum dolor ...</p>
          </div>
        </div>
      </a>
      <a class="dropdown-item" href="#">
        <div class="message-footer">
          Read All New Messages
        </div>
      </a>
    </div>
  </div>
  <div class="dropdown">
    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bells"></i></a>
    <div class="dropdown-menu dropdown-menu-right message-dropdown" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="#">
        Alert Name 
      </a>
    </div>
  </div>
  <div class="dropdown">
    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-user"></i>Admin
      {{-- <i class="fas fa-user"></i>{{ Auth::user()->name}} --}}

    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Profile</a>
      <a class="dropdown-item" href="#"><i class="fas fa-envelope"></i> Messages</a>
      <a class="dropdown-item" href="#"><i class="fas fa-cogs"></i> Change password</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="{{route('admin.logout')}}"><i class="fas fa-power-off"></i> Đăng xuất</a>
    </div>
  </div>
</div>