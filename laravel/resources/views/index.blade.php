<x-layout titre="Accueil">
    {{-- message de confirmation --}}
    <x-message />
    <h1 class="titre-hidden">Bienvenue sur l'accueil de FestX.com</h1>

    <div id="app_accueil">
        <header class="acc-header" id="acc-header">
            <ul class="acc-media">
                <li class="acc-media-fb">
                    <a href="https://www.facebook.com/?locale=fr_CA" target="_blank">
                        <img src="{{ asset('icones/facebook.png') }}" alt="Facebook" class="acc-fb">
                    </a>
                </li>
                <li class="acc-media-fb">
                    <a href="https://twitter.com/?lang=fr" target="_blank">
                        <img src="{{ asset('icones/twitter.png') }}" alt="Twitter" class="acc-tw">
                    </a>
                </li>
                <li class="acc-media-fb">
                    <a href="https://www.instagram.com/" target="_blank">
                        <img src="{{ asset('icones/instagram.png') }}" alt="Instagram" class="acc-in">
                    </a>
                </li>
            </ul>

            <div class="acc-centre">
                <p class="acc-date">
                    9.08 au 11.08
                </p>
                <div class="acc-logo">
                    <img src="{{ asset('logos/centre_color_blanc.png') }}" alt="FestX" class="logo">
                </div>
                <div class="acc-fleche">
                    <div class="cercle">
                        <a href="#acc-events">
                            <img src="{{ asset('icones/fleche.svg') }}" alt="Fleche">
                        </a>
                    </div>
                </div>
            </div>

            <div class="acc-btn-menu">
                <div id="app_menu">
                    <div class="acc-btn">
                        <img src="{{ asset('icones/menu_9_points.png') }}" alt="menu">
                    </div>
                    <p class="acc-menu">
                        menu
                    </p>
                </div>
            </div>

            <div class="menu-cache">
                <x-menu />
            </div>

            <div class="video-bg-header">
                <video autoplay loop muted poster="{{ asset('images/poster_header.jpg') }}">
                    <source src="{{ asset('videos/video_game.mp4') }}" type="video/mp4">
                    Votre navigateur ne prend pas en charge la lecture de vidéos.
                </video>
            </div>
        </header>

        <main>
            <section class="acc-text-events" onclick="toggleAudio()">
                <div class="phrases">
                    <p>dj spectacles événements laserlight dj spectacles</p>
                    <p>spectacles événements drones dj laserlight</p>
                    <p>événements laserlight spectacles dj drones événements laserlight</p>
                </div>

                <div class="video-background">
                    <video id="video" autoplay loop muted poster="{{ asset('images/cadre_header.png') }}">

                        <source src="{{ asset('videos/montage.mp4') }}" type="video/mp4">
                        Votre navigateur ne prend pas en charge la lecture de vidéos.
                    </video>
                </div>
            </section>

            <section class="acc-events" id="acc-events">
                <h2>réserver vos billets
                    <div class="ligne-h2"></div>
                </h2>

                <div class="events">
                    <div class="vignettes">
                        <img src="{{ asset('images/evenement1.jpg') }}" alt="Spectacle">
                        <div class="cadre">
                            <p class="titre">spectacles</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</p>
                        </div>
                    </div>

                    <div class="vignettes">
                        <img src="{{ asset('images/evenement2.jpg') }}" alt="Drones">
                        <div class="cadre">
                            <p class="titre">drones</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</p>
                        </div>
                    </div>

                    <div class="vignettes">
                        <img src="{{ asset('images/evenement3.jpg') }}" alt="Concours">
                        <div class="cadre">
                            <p class="titre">concours dj</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</p>
                        </div>
                    </div>

                    <div class="vignettes">
                        <img src="{{ asset('images/evenement4.jpg') }}" alt="Laser light">
                        <div class="cadre">
                            <p class="titre">laser light</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</p>
                        </div>
                    </div>

                    <div class="vignettes">
                        <img src="{{ asset('images/evenement5.jpg') }}" alt="Événement">
                        <div class="cadre">
                            <p class="titre">événements</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</p>
                        </div>
                    </div>
                </div>

                <div class="btn-reservation">
                    <a href="{{ route('billetterie.index') }}">Billetterie</a>
                    <a href="{{ route('programmation.index') }}">Programmation</a>
                </div>

                <div class="events-bg">
                    <img src="{{ asset('images/lignes.jpg') }}" alt="">
                </div>

            </section>

            <section class="acc-logo-video">
                <div class="acc-logo">
                    <img src="{{ asset('logos/plat_color_blanc.png') }}" alt="FestX" class="logo">
                    <p>9.08 au 11.08</p>
                </div>

                <div class="video-bg-logo">
                    <video id="video" autoplay loop muted poster="{{ asset('images/poster_lignes.jpg') }}">
                        <source src="{{ asset('videos/neon_accueil.mp4') }}" type="video/mp4">
                        Votre navigateur ne prend pas en charge la lecture de vidéos.
                    </video>
                </div>
            </section>
        </main>
    </div>

    <x-footer />
    <div class="fleche-haut" id="scroll-to-top">
        <a href="#acc-header">
            <img src="{{ asset('icones/fleche-haut.svg') }}" alt="Remonter en haut">
        </a>
    </div>
</x-layout>

<script>
    /********** FLECHE-BAS **********/
    document.addEventListener("DOMContentLoaded", function() {
        const flecheLink = document.querySelector('a[href="#acc-events"]');
        const accEventsSection = document.getElementById('acc-events');

        flecheLink.addEventListener("click", function(event) {
            event.preventDefault();

            // Options de défilement
            const options = {
                behavior: "smooth",
                easing: "ease-in-out",
            };

            // Utilisez la méthode scrollIntoView avec les options
            accEventsSection.scrollIntoView(options);
        });
    });


    /********** PARALLAX PHRASES **********/
    document.addEventListener("DOMContentLoaded", function() {
        const phrasesContainer = document.querySelector(".phrases");
        const phrases = phrasesContainer.querySelectorAll("p");

        window.addEventListener("scroll", function() {
            // Obtiens la position de défilement verticale de la page
            const scrollY = window.scrollY;

            // Détermine la direction de défilement en fonction de la position de défilement
            const direction = scrollY % (phrasesContainer.clientHeight * 3);

            // Met à jour la position horizontale de chaque phrase en fonction de la direction
            phrases[0].style.transform = `translateX(-${direction}px)`;
            phrases[1].style.transform = `translateX(${direction}px)`;
            phrases[2].style.transform = `translateX(-${direction}px)`;
        });
    });

    /********** PARALLAX VIGNETTES **********/
    document.addEventListener("DOMContentLoaded", function() {
        const events = document.querySelector(".events");
        const windowWidth = window.innerWidth; // Largeur de la fenêtre

        window.addEventListener("scroll", function() {
            const scrollY = window.scrollY;
            const direction = (scrollY / 2) % (events.clientHeight * 3);

            // Ajoutez la moitié de la largeur de la fenêtre pour centrer l'élément
            events.style.transform = `translateX(${direction - windowWidth / 2}px)`;
        });
    });

    /********** FLECHE-HAUT **********/
    document.addEventListener("DOMContentLoaded", function() {
        const flecheLink = document.querySelector(".fleche-haut");
        const accHeader = document.getElementById("acc-header");

        flecheLink.style.display = "none";

        // Affiche la flèche lorsque l'utilisateur fait défiler la page
        window.addEventListener("scroll", function() {
            if (window.scrollY > 100) {
                flecheLink.style.display = "flex";
            } else {
                flecheLink.style.display = "none";
            }
        });

        // Fait défiler vers le haut de la page lors du clic sur la flèche
        flecheLink.addEventListener("click", function(event) {
            event.preventDefault();

            // Options de défilement
            const options = {
                behavior: "smooth",
                easing: "ease-in-out",
            };

            accHeader.scrollIntoView(options);
        });
    });

    /********** BOUTON MENU HIDDEN A DISPLAY **********/

    const menuNav = document.querySelector('.nav-btn')
    const appNav = document.querySelector('#app_menu');
    let menu = document.querySelector('.menu-cache')
    let body = document.querySelector('body')
    menuNav.addEventListener('click', function() {
        if (menu.style.display === 'none' || menu.style.display === "") {
            menu.style.display = 'block';
        } else {
            menu.style.display = 'none'
            body.classList.remove('popup')
        }
    })



    appNav.addEventListener('click', function() {
        if (menu.style.display === 'none' || menu.style.display === '') {
            menu.style.display = 'block';
            body.classList.add('popup')
        } else {
            menu.style.display = 'none';
        }
    });

    /********** AUDIO ACCUEIL **********/
    function toggleAudio() {
        const video = document.getElementById("video");

        if (video.muted) {
            video.muted = false;

        } else {
            video.muted = true;
        }
    }
</script>
