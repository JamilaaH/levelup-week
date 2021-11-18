<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Levelup</a>
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
