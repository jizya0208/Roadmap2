<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
             <a class="nav-item nav-link active" href="{{ route('restaurant.index') }}">
                <span class="sr-only">
                    <i class="nav-icon fas fa-home"></i>
                </span>
            </a>
        </div>
    </div>


    <a class="nav-item nav-link active" href="{{ route('restaurant.index') }}">
        <span class="sr-only">
            <i class="nav-icon fas fa-home"></i>
        </span>
    </a>

    <!-- Authentication -->
    @if(Auth::check())
        <p>ようこそ{{ Auth::user()->name }}さん *{{ Auth::user()->id == $restaurant->id; }}</p>
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf
            <x-jet-dropdown-link href="{{ route('logout') }}"
                @click.prevent="$root.submit();">
                {{ __('Log Out') }}
            </x-jet-dropdown-link>
        </form>
    @else
         <a class="bg-gray-100" href="{{ route('login') }}">
            <span class="">
                お店オーナーの方はこちらから
            </span>
        </a>

    @endif
</nav>
    
