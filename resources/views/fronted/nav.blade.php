<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">E-Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active"  href="{{ url('/front_category') }}">Category</a>
                </li>
               @auth
               <li class="nav-item">
                <a class="nav-link active"  href="{{ url('/my_cart') }}">My Cart</a>
            </li>
               <li class="nav-item">
                <a class="nav-link active"  href="{{ url('/my_order') }}">My Order</a>
            </li>
               @endauth
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
               

                {{-- Set the Login and Register Part in Fronted --}}

                @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Log in</a>
                    </li>

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        @endif
                    @endauth
            @endif

            {{-- End --}}
            
            </ul>
        </div>
    </div>
</nav>