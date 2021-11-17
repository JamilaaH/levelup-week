<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Levelup</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @guest
            <a class="navbar-text " href="{{route('login')}}">
                <button class="btn btn-success text-white">
                    Se Connecter
                </button>
                </a>            
            @endguest
            @auth
                <a class="navbar-text " href="{{route('dashboard')}}">
                    <button class="btn btn-success text-white">
                        Dashboard
                    </button>
                    </a>            
                
            @endauth
        </div>
    </div>
</nav>
