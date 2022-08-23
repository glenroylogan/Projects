
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">    
           
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">          
              <!--<a class="navbar-brand" href={{asset( '/')}}>{{config('app.name','LSAPP')}}</a>-->
              <li class="nav-item"><a class="nav-link" href={{asset( '/')}}>Home</a></li>
              <li class="nav-item"><a class="nav-link" href= {{asset('about')}}>About</a></li>        
              <li class="nav-item"><a class="nav-link" href= {{asset('services')}} >Services</a></li>    
              <li class="nav-item"><a class="nav-link" href= {{asset('posts')}} >Blogs</a></li>                   
            </ul> 
            <!--
            <ul class ="navbar-nav mr-auto">          
              <li class="nav-item"><a class="nav-link" href= {{asset('posts/create')}} >Create Post</a></li>
            </ul>
          -->

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <!--<li><a href ={{'dashboard'}}>Dashboard</a></li>-->
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <!--<a class="dropdown-item" href ={{'dashboard'}}>Dashboard</a>-->
                            <a class="dropdown-item" href ={{asset('dashboard')}}>Dashboard</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

