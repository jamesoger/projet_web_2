<nav class="hidden">
    <div class="flex-hidden">
        <h1>menu</h1>
        <div class="nav-hidden-btn-menu">
            <div class="nav-btn">
                <img class="img-hidden" src="{{ asset('icones/menu-black.png') }}" alt="">
            </div>
            <p>menu</p>
        </div>
    </div>

    <ul>
        <li><a class="nav-hidden-a" href="{{ route('accueil') }}">Accueil</a></li>
        <li><a class="nav-hidden-a" href="{{ route('programmation.index') }}">Programmation</a></li>
        <li><a class="nav-hidden-a" href="{{ route('billetterie.index') }}">Billetterie</a></li>
        <li><a class="nav-hidden-a" href="{{ route('actualites.index') }}">Actualités</a></li>
        <li><a class="nav-hidden-a" href="{{ route('info.index') }}">À propos</a></li>
    </ul>

    <div class="bas-nav">
        <div class="contact-info">
            <p class="mail-nav">Email</p>
            <p>festx@electro.ca</p>
        </div>
        <a class="nav-hidden-compte" href="{{ route('user_connexion.create') }}">Mon compte</a>

        <div class="contact-info">
            <p class="tel-nav">Téléphone</p>
            <p>418-222-1899</p>
        </div>
    </div>
</nav>

<script></script>
