<x-layout titre="Administration">
    <x-nav />
    <div class="page_admin" id="acc-header">
        <h1>{{ auth()->guard('admin')->user()->nom_complet }} </h1>
        @if (session('success'))
            <p class="message" style="color: green; font-size: 30px;background-color:white ;text-align:center;">
                {{ session('success') }}
            </p>
        @endif
        @if (session('error'))
            <p class="message" style="color: red; font-size: 30px;background-color:white ;text-align:center;">
                {{ session('error') }}</p>
        @endif

        @if (auth()->guard('admin')->user()->droits == 1)
            <h1>Admin</h1>
        @else
            <h1>Employé</h1>
        @endif

        <form action="{{ route('deconnexion_admin') }}" method="POST">
            @csrf
            <input class="deconnect_admin" type="submit" value="Déconnexion">
        </form>
        <div class="analytics">
            <h2>Statistiques site FestX</h2>
            <a href="https://analytics.google.com/analytics/web/#/p406446669/reports/reportinghub?params=_u..nav%3Dmaui"
                target="_blank">
                Voir les statistiques ici
            </a>
        </div>
        <div class="vue_admin_users">

            <div class="users_admin">
                <h2>Utilisateurs</h2>
                @foreach ($users as $user)
                    <p>{{ $user->nom_complet }}</p>
                    @if (auth()->guard('admin')->user()->droits == 1)
                        <a href="{{ route('user.edit', $user->id) }}">Modifier</a>
                    @endif
                    @if (auth()->guard('admin')->user()->droits == 1)
                        <form onclick="return confirm('Êtes-vous certain de vouloir supprimer cet élément?');"
                            action="{{ route('user.destroy') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <input class="submit_suppression_user"type="submit" value="supprimer">
                        </form>
                    @endif
                @endforeach
            </div>

            <div class="forfait_user">
                <h2>Forfaits</h2>
                @foreach ($users as $user)
                    <p>{{ $user->nom_complet }}</p>

                    @if ($user->forfaits)
                        @if ($user->forfaits->count() > 0)
                            <p>Forfaits associés</p>
                            @foreach ($user->forfaits as $forfait)
                                <div class="forfait_associe">
                                    <ul>
                                        <li> {{ $forfait->nom }}</li>
                                        <li> {{ $forfait->prix }}</li>
                                        <li>date d'arrivée : {{ $forfait->pivot->date_arrivee }}</li>
                                        <li>date de départ : {{ $forfait->pivot->date_depart }}</li>
                                        @if (auth()->guard('admin')->user()->droits == 1)
                                            <form
                                                onclick="return confirm('Êtes-vous certain de vouloir supprimer cet élément?');"
                                                action="{{ route('forfait_admin.destroy', $forfait->pivot->id) }}"
                                                method="POST">
                                                @csrf
                                                <input type="submit" value="supprimer">
                                            </form>
                                        @endif
                                    </ul>
                                </div>
                            @endforeach
                        @else
                            <p class="pas-forfait">Cet utilisateur n'a pas de forfaits associés.</p>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>



        <div class="admin_modif">
            <h2>Liste des administrateurs</h2>
            @if (auth()->guard('admin')->user()->droits == 1)
                <a class="creation_admin" href="{{ route('enregistrement_admin.create') }}">Ajouter
                </a>
            @endif
            @foreach ($admins as $admin)
                @if ($admin->droits == 0)
                    <h3>Employé</h3>
                @else
                    <h3>Administrateur</h3>
                @endif
                <p>{{ $admin->nom_complet }} </p>
                @if (auth()->guard('admin')->user()->droits == 1)
                    <a href="{{ route('enregistrement_admin.edit', ['id' => $admin->id]) }}">Modifier</a>
                @endif
                @if (auth()->guard('admin')->user()->droits == 1)
                    <form onclick="return confirm('Êtes-vous certain de vouloir supprimer cet élément?');"
                        action="{{ route('admin.destroy') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $admin->id }}">
                        <input class="submit_suppression_user" type="submit" value="supprimer">
                    </form>
                @endif
            @endforeach
        </div>


        @foreach ($programmations as $programmation)
            <div class="programmation-list">
                <h2>Programmations</h2>
                <table class="programmation" border="1">
                    <caption>{{ $programmation->date }}</caption>
                    <thead>
                        <tr>
                            <th>Artiste</th>
                            <th>Heure</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (auth()->guard('admin')->user()->droits == 1)
                            <a class="ajout_prog"
                                href="{{ route('programmation.edit', ['id' => $programmation->id]) }}">Ajouter</a>
                        @endif
                        @foreach ($programmation->artistes as $artiste)
                            <tr>
                                <td>{{ $artiste->nom_scene }}</td>
                                <td>{{ $artiste->heure_show }}</td>
                                <td>
                                    @if (auth()->guard('admin')->user()->droits == 1)
                                        <form
                                            onclick="return confirm('Êtes-vous certain de vouloir supprimer cet élément?');"
                                            action="{{ route('artiste.destroy') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $artiste->id }}">
                                            <input type="hidden" name="id" value="{{ $artiste->id }}">
                                            <button type="submit">Supprimer</button>
                                        </form>
                                </td>

                                <td><a class="modifier_prog"
                                        href="{{ route('programmation.artiste.edit', $artiste->id) }}">Modifier</a>
                                </td>
                        @endif
                        </tr>
        @endforeach
        @foreach ($programmation->spectacles as $spectacle)
            <tr>
                <td>{{ $spectacle->nom }}</td>
                <td>{{ $spectacle->heure }}</td>
                <td>
                    @if (auth()->guard('admin')->user()->droits == 1)
                        <form onclick="return confirm('Êtes-vous certain de vouloir supprimer cet élément?');"
                            action="{{ route('spectacle.destroy') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $spectacle->id }}">
                            <button type="submit">Supprimer</button>
                        </form>
                </td>

                <td><a class="modifier_prog"
                        href="{{ route('programmation.spectacle.edit', $spectacle->id) }}">Modifier</a></td>
        @endif
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    @endforeach


    <div class="actu">
        <h2>Vos actualités</h2>
        @if (auth()->guard('admin')->user()->droits == 1)
            <a class="ajout_act" href="{{ route('actualites.create') }}">Ajouter</a>
        @endif
        @foreach ($actualites as $actualite)
            <h2>{{ $actualite->titre }}</h2>
            <h3>{{ $actualite->date }}</h3>
            <p>{{ $actualite->details }}</p>
            @if (auth()->guard('admin')->user()->droits == 1)
                <a class="modif_actu" href="{{ route('actualites.edit', $actualite->id) }}">Modifier</a>
                <form onclick="return confirm('Êtes-vous certain de vouloir supprimer cet élément?');"
                    action="{{ route('actualites.destroy') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $actualite->id }}">
                    <input class="supp_actu" type="submit" value="supprimer">
                </form>
            @endif
        @endforeach

    </div>

    </div>
    </div>
    </div>

    <x-footer />

    <div class="fleche-haut" id="scroll-to-top">
        <a href="#acc-header">
            <img src="{{ asset('icones/fleche-haut.svg') }}" alt="Remonter en haut">
        </a>
    </div>
</x-layout>

<script>
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
</script>
<x-fade />
