<header class="">
    <nav>
        <a href="{{ route('home') }}/">
            <h1>Miellerie <span>-</span> <span>SERPOLET</span></h1>
        </a>
        <button class="hamburger"><img src="{{ url('') }}/front/images/home/burgermenu.png"
                alt="burgermenu"></button>
        <button class="cross" style="display:none;"><i class="fas fa-times"></i></button>
    </nav>
</header>
<div class="menuBurger" style="display:none;">
    <ul>

        <a href="{{ route('home') }}">Accueil</a>
        <a href="{{ route('notrehistoire') }}">Notre hisoitre</a>
        <a href="{{ route('lamiellerie') }}">La miellerie</a>
        <a href="{{ route('laruche') }}">La Ruche</a>
        <a href="{{ route('contact') }}">Nous contacter</a>
        @auth
            @admin
                <a href="{{ route('posts.index') }}">{{ __('Dashboard') }}</a>
            @endadmin
            <a>
                <form id="logoutForm" method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit">{{ __('Log Out') }}</button>
                </form>
            </a>
        @else
            <a href="{{ route('register') }}">{{ __('Register') }}</a>
            <a href="{{ route('login') }}">{{ __('Log in') }}</a>
        @endauth

    </ul>
</div>
