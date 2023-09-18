<x-layout titre="Accueil">
    <x-nav />
    <h1 class="titre-hidden">Bienvenue sur l'accueil de FestX.com</h1>

    <header class="acc-header">
        <ul class="acc-media">
            <li class="acc-media-fb">
                <img src="{{ asset('icones/facebook.png') }}" alt="" class="acc-fb">
            </li>
            <li class="acc-media-fb">
                <img src="{{ asset('icones/twitter.png') }}" alt="" class="acc-tw">
            </li>
            <li class="acc-media-fb">
                <img src="{{ asset('icones/instagram.png') }}" alt="" class="acc-in">
            </li>
        </ul>

        <div class="acc-centre">
            <p class="acc-date">
                9.08 au 11.08
            </p>
            <div class="acc-logo">
                <img src="{{ asset('logos/centre_color_blanc.png') }}" alt="" class="logo">
            </div>
            <div class="acc-fleche">
                <div class="cercle">
                    <img src="{{ asset('icones/fleche.svg') }}" alt="">
                </div>
            </div>
        </div>

        <div class="acc-btn-menu">
            <div class="acc-btn">
                <img src="{{ asset('icones/menu_9_points.png') }}" alt="">
            </div>
            <p class="acc-menu">
                menu
            </p>
        </div>

        <div class="video-bg-header">
            <video autoplay loop muted poster="{{ asset('images/poster_header.jpg') }}">
                <source src="{{ asset('videos/video_game.mp4') }}" type="video/mp4">
                Votre navigateur ne prend pas en charge la lecture de vidéos.
            </video>
        </div>
    </header>

    <main>
        <section class="acc-text-events">
            <div class="phrases">
                <p>dj spectacles événements laserlight</p>
                <p>événements drones dj laserlight</p>
                <p>événements laserlight spectacles dj</p>
            </div>
            <div class="video-background">
                <video autoplay loop muted poster="{{ asset('images/cadre_header.jpg') }}">
                    <source src="{{ asset('videos/montage.mp4') }}" type="video/mp4">
                    Votre navigateur ne prend pas en charge la lecture de vidéos.
                </video>
            </div>
        </section>
        <section class="acc-events">
            <h2>réserver vos billets
                <div class="ligne-h2"></div>
            </h2>
            <div class="events">
                <div class="vignettes">
                    <img src="{{ asset('images/evenement1.jpg') }}" alt="">
                    <div class="cadre">
                        <p class="titre">spectacles</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</p>
                    </div>
                </div>
                <div class="vignettes">
                    <img src="{{ asset('images/evenement2.jpg') }}" alt="">
                    <div class="cadre">
                        <p class="titre">drones</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</p>
                    </div>
                </div>
                <div class="vignettes">
                    <img src="{{ asset('images/evenement3.jpg') }}" alt="">
                    <div class="cadre">
                        <p class="titre">concours dj</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</p>
                    </div>
                </div>
                <div class="vignettes">
                    <img src="{{ asset('images/evenement4.jpg') }}" alt="">
                    <div class="cadre">
                        <p class="titre">laser light</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</p>
                    </div>
                </div>
                <div class="vignettes">
                    <img src="{{ asset('images/evenement5.jpg') }}" alt="">
                    <div class="cadre">
                        <p class="titre">événements</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</p>
                    </div>
                </div>

            </div>

            <div class="btn-reservation">
                <a href="{{ route('billeterie.index') }}">Billeterie</a>
                <a href="{{ route('programmation.index') }}">Programmation</a>
            </div>

            <div class="events-bg">
                <img src="{{ asset('images/lignes.jpg') }}" alt="">
            </div>
        </section>
        <section class="acc-logo-video">
            <div class="acc-logo">
                <img src="{{ asset('logos/plat_color_blanc.png') }}" alt="" class="logo">
                <p>9.08 au 11.08</p>
            </div>

            <div class="video-bg-logo">
                <video autoplay loop muted poster="{{ asset('images/poster_lignes.jpg') }}">
                    <source src="{{ asset('videos/neon_accueil.mp4') }}" type="video/mp4">
                    Votre navigateur ne prend pas en charge la lecture de vidéos.
                </video>
            </div>
        </section>
    </main>

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
</x-layout>
