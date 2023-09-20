<footer>
    <div class="footer-media">
        <div class="ligne-gauche"></div>
        <ul class="foot-media">
            <li class="foot-media-fb">
                <img src="{{ asset('icones/facebook.png') }}" alt="" class="foot-fb">
            </li>
            <li class="foot-media-fb">
                <img src="{{ asset('icones/twitter.png') }}" alt="" class="foot-tw">
            </li>
            <li class="foot-media-fb">
                <img src="{{ asset('icones/instagram.png') }}" alt="" class="foot-in">
            </li>
        </ul>
        <div class="ligne-droite"></div>
    </div>

    <div class="foot-nav-adresse">
        <ul class="foot-menu">
            <li class="menu">menu</li>
            <li class="liste">
                <a href="{{ route('accueil') }}">Accueil</a>
            </li>
            <li class="liste">
                <a href="{{ route('programmation.index') }}">Programmation</a>
            </li>
            <li class="liste">
                <a href="{{ route('billetterie.index') }}">Billetterie</a>
            </li>
            <li class="liste">
                <a href="{{ route('actualites.index') }}">Actualités</a>
            </li>
            <li class="liste">
                <a href="{{ route('info.index') }}">À propos</a>
            </li>
            <li class="liste">
                <a href="{{ route('user_connexion.create') }}">Mon compte</a>
            </li>
        </ul>

        <div class="foot-map">
            <img src="{{ asset('icones/map-marker.png') }}" alt="">
            <p>FestX</p>
            <p>189 rue des darons</p>
            <p>Saint-Fulgeance</p>
            <p>JJT222</p>
            <p>festx@electro.ca</p>
            <p>418-222-1899</p>
        </div>

        <div class="foot-logo">
            <img src="{{ asset('logos/centre_color_blanc.png') }}" alt="">
            <p>
                <a href="{{ route('admin_connexion.login') }}">admin</a>
            </p>
        </div>
    </div>

    <div class="foot-app">
        <div class="ligne-gauche"></div>
        <p>télécharger l'app</p>
        <div class="ligne-droite"></div>
    </div>

    <div class="foot-store">
        <div class="apple">
            <img src="{{ asset('icones/google.svg') }}" alt="">
        </div>
        <div class="google">
            <img src="{{ asset('icones/apple.svg') }}" alt="">
        </div>
    </div>

    <div class="foot-copy">
        <img src="{{ asset('icones/copyright.png') }}" alt="">
        <p>2023 festx</p>
    </div>
</footer>
