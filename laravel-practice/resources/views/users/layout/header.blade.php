<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    @if (Auth::check())
    <div class="container">
      @if(Auth::user()->role == 1)
        <a class="navbar-brand" href="{{route('home')}}">
          {{Auth::user()->fullname}}
        </a>
        @else
        <a class="navbar-brand" href="#">
        </a>
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              @if (Auth::user()->role==2)
              <li class="nav-item"><a class="nav-link" href="{{route('admin.index')}}">Admin</a></li>
              <li class="nav-item">
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
      
                    <!-- Nav Item - Alerts -->
      
                    <!-- Nav Item - Messages -->
      
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                   
                      <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" 
                      id="userDropdown"
                      role="button"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false">
                        <img src="{{asset('assets/clients/images/user.svg')}}"  width="32" height="32" class="rounded-circle">
                      </a>
                      <!-- Dropdown - User Information -->
                      <div
                        class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a
                          class="dropdown-item"
                          href="#"
                          data-toggle="modal"
                          data-target="#logoutModal">
                          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                          Logout
                        </a>
                      </div>
                    </li>
                  </ul>
            </li>
            @else
            <li class="nav-item">
              <ul class="navbar-nav ml-auto">
                  <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    
                  <!-- Nav Item - Alerts -->
    
                  <!-- Nav Item - Messages -->
    
                  <!-- Nav Item - User Information -->
                  <li class="nav-item dropdown no-arrow">
                 
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" 
                    id="userDropdown"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">
                      <img src="{{asset('assets/clients/images/user.svg')}}"  width="32" height="32" class="rounded-circle">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div
                      class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                      aria-labelledby="userDropdown">
                      <a
                        class="dropdown-item"
                        href="#"
                        data-toggle="modal"
                        data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                      </a>
                    </div>
                  </li>
                </ul>
          </li>
  
              @endif
            
          </ul>
        </div>
      </div>
      @else
      <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
             
            <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home</a></li>
            <li class="nav-item"><a class="nav-link" type="button"  data-toggle="modal" data-target="#login-modal">Login</a></li>
            <li class="nav-item"><a class="nav-link" type="button"  data-toggle="modal" data-target="#register-modal">Register</a></li>
            </ul>
        </div>
    </div>
      @endif
    </nav>
  @include('admin.layout.logoutModal')
  <!-- Page header with logo and tagline-->
  