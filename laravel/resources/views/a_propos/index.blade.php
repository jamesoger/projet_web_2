<x-layout titre="À propos">
    <x-nav />
    <div class="a-propos">
        <div class="texte-apropos">
            <div class="titre-apropos">
                <h1>À propos de </h1>
                <img src="{{ asset('logos/plat_gold_blanc.png') }}" alt="">
            </div>
            <p>Bienvenue dans l'univers époustouflant de FestX, le festival où la musique électronique fusionne avec la
                technologie pour créer une expérience sensorielle unique en son genre. Au cœur de notre festival, vous
                découvrirez une convergence inédite entre les rythmes envoûtants de la musique techno et électro et
                l'art
                visuel futuriste des spectacles de drones illuminés.
            </p>
            <p>FestX est bien plus qu'un simple festival de musique ; c'est une célébration de l'innovation, de la
                créativité et de la communion entre l'homme et la machine. Nous avons réuni des artistes de renommée
                mondiale, des DJ talentueux et des concepteurs de spectacles de drones éblouissants pour vous offrir une
                expérience immersive hors du commun.
            </p>
            <p>Au sein de notre espace enchanté, la musique pulse au rythme de la vie, vous transportant dans un voyage
                sonore envoûtant. Les beats puissants, les mélodies hypnotiques et les sets électroniques de pointe
                s'entremêleront pour créer des moments de pure euphorie, vous entraînant dans une danse effrénée
                jusqu'au
                bout de la nuit.
            </p>
            <p>Mais FestX, c'est également l'exploration des possibilités infinies de la technologie. Imaginez des
                essaims
                de drones illuminés, dansant dans le ciel nocturne comme des étoiles artificielles, créant des tableaux
                visuels extraordinaires qui captiveront vos sens. Ces spectacles de drones vous transporteront dans un
                monde
                de rêve, où la lumière et la musique se marient pour créer une expérience multisensorielle inoubliable.
            </p>
            <p>Notre festival est bien plus qu'un simple événement musical, c'est une célébration de l'avenir, de la
                créativité et de la collaboration entre l'homme et la machine. Alors préparez-vous à vivre une
                expérience
                transcendantale au Festival FestX, où la musique, la technologie et l'art se rejoignent pour créer des
                souvenirs qui dureront toute une vie. Rejoignez-nous pour une nuit de musique électronique et de
                spectacles
                de drones qui repousseront les limites de l'imagination.</p>
            <p>Réservez vos billets dès maintenant et préparez-vous à plonger dans l'univers captivant de FestX, là où
                la
                magie opère et les étoiles s'allument, tant dans le ciel que dans votre cœur.
            </p>
        </div>


        @foreach ($admins as $admin)
            <div class="img-admin">
                <h1>{{ $admin->prenom }}</h1>
                <h1>{{ $admin->nom }}</h1>
                <img src="{{$admin->image}}" alt="" width="50px" height="50px">
            </div>
        @endforeach
        {{-- <img src="{{ asset('images/geoffrey.jpg') }}" alt="">
            <img src="{{ asset('images/james.jpg') }}" alt="">
            <img src="{{ asset('images/maxime.jpg') }}" alt=""> --}}

        <div class="nous-joindre">
            <div class="info-total">
                <div class="info">
                    <img src="{{ asset('logos/plat_gold_blanc.png') }}" alt="">
                    <div class="phrases">
                        <p class="titre-info">Adresse :
                        </p>
                        <p class="phrase-info">
                            189 rue des darons
                            Saint-Fulgeance
                            JJT222
                        </p>
                        <p class="titre-info">
                            Courriel :
                        </p>
                        <p class="phrase-info">festx@electro.ca</p>
                        <p class="titre-info">Tel :
                        </p>
                        <p class="phrase-info">418-222-1899</p>
                    </div>
                </div>
                <div class="carte">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d88367.88518882812!2d-1.40792885!3d46.20057905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4803f806cafa7aab%3A0xca60eddaded7a874!2zw45sZSBkZSBSw6k!5e0!3m2!1sfr!2sca!4v1695221533200!5m2!1sfr!2sca"
                        width="600" height="450" style="border-radius:15px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <x-footer />
    </div>
</x-layout>
