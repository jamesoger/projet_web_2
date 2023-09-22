<x-layout titre="Administration">
    <x-nav />
    <div class="page_admin">
        <h1>{{ auth()->guard('admin')->user()->prenom .' ' .auth()->guard('admin')->user()->nom }} </h1>
        @if (session('success'))
            <p style="color: green; font-size: 30px;background-color:white ;text-align:center;">{{ session('success') }}
            </p>
        @endif
        @if (session('error'))
            <p style="color: red; font-size: 30px;background-color:white ;text-align:center;">{{ session('error') }}</p>
        @endif

        @if (auth()->guard('admin')->user()->droits == 1)
            <h1>Admin</h1>
        @else
            <h1>Employé</h1>
        @endif
        <div class="vue_admin_users">


            <div class="users_admin">
                <h2>Utilisateurs</h2>
                @foreach ($users as $user)
                    <p>{{ $user->prenom }} {{ $user->nom }}</p>
                    @if (auth()->guard('admin')->user()->droits == 1)
                        <a href="{{ route('user.edit', $user->id) }}">Modifier</a>
                    @endif
                    @if (auth()->guard('admin')->user()->droits == 1)
                        <form onclick="return confirm('Are you sure you want to delete?');"
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
                    <p>{{ $user->prenom }} {{ $user->nom }}</p>

                    @if ($user->forfaits)
                        @if ($user->forfaits->count() > 0)
                            <p>Forfaits associés :</p>
                            @foreach ($user->forfaits as $forfait)
                                <div class="forfait_associe">
                                    <ul>
                                        <li> {{ $forfait->nom }}</li>
                                        <li> {{ $forfait->prix }}</li>
                                        <li>date d'arrivée : {{ $forfait->pivot->date_arrivee }}</li>
                                        <li>date de départ : {{ $forfait->pivot->date_depart }}</li>
                                        @if (auth()->guard('admin')->user()->droits == 1)
                                            <form onclick="return confirm('Are you sure you want to delete?');"
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

        @if (auth()->guard('admin')->user()->droits == 1)

            <h2>Liste des administrateurs</h2>
            <div class="admin_modif">
                <a class="creation_admin" href="{{ route('enregistrement_admin.create') }}">Ajouter un nouvel
                    administrateur</a>
                @foreach ($admins as $admin)
                    <p>{{ $admin->prenom }} {{ $admin->nom }}</p>
                    <a href="{{ route('enregistrement_admin.edit', ['id' => $admin->id]) }}">Modifier</a>
                    <form onclick="return confirm('Are you sure you want to delete?');"
                        action="{{ route('admin.destroy') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $admin->id }}">
                        <input class="submit_suppression_user" type="submit" value="supprimer">
                    </form>
                @endforeach
            </div>


        @endif
        <h2>Programmations</h2>
        @foreach ($programmations as $programmation)
            <div class="programmation-list">
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
                                        <form onclick="return confirm('Are you sure you want to delete?');"
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
                        <form onclick="return confirm('Are you sure you want to delete?');"
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
    <h1>Vos actualités</h1>

    <div class="actu">
        @if (auth()->guard('admin')->user()->droits == 1)
            <a class="ajout_act" href="{{ route('actualites.create') }}">Ajouter</a>
        @endif
        @foreach ($actualites as $actualite)
            <h2>{{ $actualite->titre }}</h2>
            <h3>{{ $actualite->date }}</h3>
            <p>{{ $actualite->details }}</p>
            @if (auth()->guard('admin')->user()->droits == 1)
                <a class="modif_actu" href="{{ route('actualites.edit', $actualite->id) }}">Modifier</a>
                <form onclick="return confirm('Are you sure you want to delete?');"
                    action="{{ route('actualites.destroy') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $actualite->id }}">
                    <input class="supp_actu" type="submit" value="supprimer">
                </form>
            @endif
        @endforeach

    </div>
    <form action="{{ route('deconnexion_admin') }}" method="POST">
        @csrf
        <input class="deconnect_admin" type="submit" value="Déconnexion">
    </form>

    </div>
    </div>
    </div>

    <x-footer />
</x-layout>
