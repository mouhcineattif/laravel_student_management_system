<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Student management</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
          
          @guest
          <li class="nav-item">
            <a class="nav-link btn btn-success text-light" aria-current="page" href="{{route('students.login.index')}}">Log In</a>
          </li> 
          @endguest
          @auth
              
          <li class="nav-item">
            <a class="nav-link" href="{{route('students.show',auth()->user()->id)}}">My Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('students.index')}}">Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('students.create')}}">Add Student</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('offers.index')}}">Offers</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{route('offers.create')}}">Add Offer</a>
          </li>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="{{ asset("storage/". auth()->user()->image)}}" height=30 width=30 class="rounded-circle" alt="user image">
                  {{ auth()->user()->name }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="nav-link" href="{{route('students.show',auth()->user()->id)}}">View Profile</a></li>
                  <li><a class="nav-link" href="{{route('students.edit',auth()->user()->id)}}">Settings</a></li>
                  <li><a class="nav-link" aria-current="page" href="{{route('students.logout')}}">Log Out</a></li>
                </ul>
              </div>
                <li class="nav-item">
              
                </li>
            @endauth
            
        </ul>
      </div>
    </div>
  </nav>