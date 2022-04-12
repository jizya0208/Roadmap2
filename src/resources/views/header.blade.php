<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
             <a class="nav-item nav-link active" href="{{ route('restaurant.index') }}">レストラン <span class="sr-only"></span></a>
        </div>
    </div>

    <!-- Authentication -->
    @if(Auth::check())
        <p>ようこそ{{ Auth::user()->name }}さん</p>
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf
            <x-jet-dropdown-link href="{{ route('logout') }}"
                @click.prevent="$root.submit();">
                {{ __('Log Out') }}
            </x-jet-dropdown-link>
        </form>
    @endif
</nav>
    