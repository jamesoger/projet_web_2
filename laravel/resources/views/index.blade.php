<x-layout>

    <h1 class="titre-hidden">Bienvenue sur l'accueil de FestX.com</h1>
    <nav>
        <a href="{{route('actualites.index')}}">Actualités</a>
        <a href="{{route('billeterie.index')}}">Billeterie</a>
        <a href="{{route('programmation.index')}}">Programmation</a>
        <a href="{{route('info.index')}}">À propos</a>
        <a href="{{route('user_connexion.create')}}">Connexion User</a>
        <a href="{{route('admin_connexion.login')}}">admin</a>
    </nav>

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
                <img src="{{ asset('logos/centre_color_blanc.png')}}" alt="" class="logo">
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
            <div class="events">
                <div class="vignettes-events">
                    <div class="vignettes">
                        <img src="{{ asset('images/evenement1.jpg') }}" alt="">
                        <h2>laser light</h2>
                    </div>
                    <div class="vignettes">
                        <img src="{{ asset('images/evenement2.jpg') }}" alt="">
                        <h2>laser light</h2>
                    </div>
                    <div class="vignettes">
                        <img src="{{ asset('images/evenement3.jpg') }}" alt="">
                        <h2>laser light</h2>
                    </div>
                    <div class="vignettes">
                        <img src="{{ asset('images/evenement4.jpg') }}" alt="">
                        <h2>laser light</h2>
                    </div>
                    <div class="vignettes">
                        <img src="{{ asset('images/evenement5.jpg') }}" alt="">
                        <h2>laser light</h2>
                    </div>
                </div>
            </div>
            <div class="events-bg">
                <img src="{{ asset('images/lignes.jpg') }}" alt="">
            </div>
        </section>
        <section class="acc-logo-video">

        </section>
    </main>

    <footer>

    </footer>
</x-layout>
