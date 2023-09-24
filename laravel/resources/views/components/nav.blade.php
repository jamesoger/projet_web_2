<nav class="nav-menu">
    <a href="{{ route('accueil') }}">
        <img src="{{ asset('logos/plat_gold_blanc.png') }}" alt="">
    </a>
    <a class="nav-a" href="{{ route('actualites.index') }}">Actualités</a>
    <a class="nav-a" href="{{ route('billetterie.index') }}">Billetterie</a>
    <a class="nav-a" href="{{ route('programmation.index') }}">Programmation</a>
    <a class="nav-a" href="{{ route('info.index') }}">À propos</a>
    <a class="nav-a" href="{{ route('user_connexion.create') }}">Mon compte</a>
    <a class="nav-a" href="{{ route('admin_connexion.login') }}">admin</a>
    <div class="nav-btn-menu">

        <div class="acc-btn">
              {{-- <a class="lien" href="{{ route('nav') }}" class="lien-nav-btn-menu"> --}}
            <img src="{{ asset('icones/menu_9_points.png') }}" alt="">
        </div>
        <p class="acc-menu">
            menu
        </p>
    </div>
</nav>
