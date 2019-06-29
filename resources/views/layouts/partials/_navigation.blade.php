<nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
          <a class="navbar-item" href="{{ route('home') }}">
            {{ config('app.name') }}
          </a>
      
          <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>
      
        <div id="navbarBasicExample" class="navbar-menu">
          <div class="navbar-start">
            <a class="navbar-item">
              Home
            </a>
      
            <a class="navbar-item">
              Documentation
            </a>
      
            {{-- <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">
                More
              </a>
      
              <div class="navbar-dropdown">
                <a class="navbar-item">
                  About
                </a>
                <a class="navbar-item">
                  Jobs
                </a>
                <a class="navbar-item">
                  Contact
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item">
                  Report an issue
                </a>
              </div>
            </div> --}}
          </div>

            <div class="navbar-end">
                @if (auth()->check())
                    <a href="{{ route('account.index') }}" class="navbar-item">My account</a>
                    <a href="#" class="navbar-item" onclick="event.preventDefault(); document.getElementById('logout').submit();">Sign out</a>

                    {{-- @if (auth()->user()->hasRole('admin'))
                        
                    @endif --}}

                   
                @else
                    <a href="{{ route('login') }}" class="navbar-item">Sign in</a>
                    <div class="navbar-item">
                            <a href="{{ route('register') }}" class="button">Start selling</a>
                    </div>
                @endif
                  
                @role('admin')
                  <a href="{{ route('admin.index') }}" class="navbar-item">Admin</a>
                @endrole
               
                
            </div>
          
        </div>
      </nav>

      <form action="{{ route('logout') }}" class="is-hidden" id="logout" method="POST"> @csrf </form>