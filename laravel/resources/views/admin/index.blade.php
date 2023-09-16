<x-layout>
    <h1>{{ auth()->guard('admin')->user()->prenom .' ' .auth()->guard('admin')->user()->nom }} </h1>
    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif
    @if (session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif

    <h1>Admin</h1>
    <h2>Users</h2>
    @foreach ($users as $user)
        <p>{{ $user->prenom }} {{ $user->nom }}</p>
        <form onclick="return confirm('Are you sure you want to delete?');" action="{{ route('user.destroy') }}"
            method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
            <input type="submit" value="supprimer">
        </form>
        <button><a href="{{ route('user.edit', $user->id) }}">Modifier</a></button>
    @endforeach
    <h2>Forfaits</h2>
    @foreach ($users as $user)
        <p>{{ $user->prenom }} {{ $user->nom }}</p>
        @if ($user->forfaits)
            @if ($user->forfaits->count() > 0)
                <p>Forfaits associés :</p>
                <ul>
                    @foreach ($user->forfaits as $forfait)
                        <li>Nom : {{ $forfait->nom }}</li>
                        <li>Prix : {{ $forfait->prix }}</li>
                        <li>date d'arrivée : {{ $forfait->pivot->date_arrivee }}</li>
                        <li>date de départ : {{ $forfait->pivot->date_depart }}</li>
                        @if (auth()->guard('admin')->user()->droits == 1)
                            <form onclick="return confirm('Are you sure you want to delete?');"
                                action="{{ route('forfait_admin.destroy', $forfait->pivot->id) }}" method="POST">
                                @csrf
                                <input type="submit" value="supprimer">
                            </form>
                        @endif
                    @endforeach
                </ul>
            @else
                <p>Cet utilisateur n'a pas de forfaits associés.</p>
            @endif
        @endif
    @endforeach

    @if (auth()->guard('admin')->user()->droits == 1)

        <ul>
            <h3>Liste des administrateurs</h3>

            <a href="{{ route('enregistrement_admin.create') }}">Ajouter un nouvel administrateur</a>
            @foreach ($admins as $admin)
                <p>{{ $admin->prenom }} {{ $admin->nom }}</p>
                {{-- MODIFICATION --}}
                <a href="{{ route('enregistrement_admin.edit', ['id' => $admin->id]) }}">Modifier un
                    administrateur</a>
                {{-- SUPPRESSION --}}
                <form onclick="return confirm('Are you sure you want to delete?');"
                    action="{{ route('admin.destroy') }}" method="POST">
                    @csrf

                    <input type="hidden" name="id" value="{{ $admin->id }}">
                    <input type="submit" value="supprimer">

                </form>
            @endforeach
        </ul>
    @endif
    <h3>Programmations</h3>
    @foreach ($programmations as $programmation)
        <div class="programmation-list">
            <table class="programmation" border="1">
                <caption>Date:{{ $programmation->date }}</caption>
                <thead>
                    <tr>
                        <th>Artiste</th>
                        <th>Heure</th>
                    </tr>
                </thead>
                <tbody>
                    <a href="{{ route('programmation.edit', ['id' => $programmation->id]) }}">Ajouter un artiste ou un
                        spectacle à la
                        programmation!</a>
                    @foreach ($programmation->artistes as $artiste)
                        <tr>
                            <td>{{ $artiste->nom_scene }}</td>
                            <td>{{ $artiste->heure_show }}</td>
                            <td>
                                <form onclick="return confirm('Are you sure you want to delete?');"
                                    action="{{ route('artiste.destroy') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $artiste->id }}">
                                    <input type="hidden" name="id" value="{{ $artiste->id }}">
                                    <button type="submit">Supprimer</button>
                                </form>
                            </td>
                            <td><a href="{{ route('programmation.artiste.edit', $artiste->id) }}">Modifier</a></td>
                        </tr>
                    @endforeach
                    @foreach ($programmation->spectacles as $spectacle)
                        <tr>
                            <td>{{ $spectacle->nom }}</td>
                            <td>{{ $spectacle->heure }}</td>
                            <td>
                                <form onclick="return confirm('Are you sure you want to delete?');"
                                    action="{{ route('spectacle.destroy') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $spectacle->id }}">
                                    <button type="submit">Supprimer</button>
                                </form>
                            </td>
                            <td><a href="{{ route('programmation.spectacle.edit', $spectacle->id) }}">Modifier</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
    <h1>Vos actualités</h1>
    <a href="{{ route('actualites.create') }}">Ajouter une nouvelle actualité</a>
    @foreach ($actualites as $actualite)
        <h2>{{ $actualite->titre }}</h2>
        <h3>{{ $actualite->date}}</h3>
        <p>{{ $actualite->details }}</p>
        <a href="{{ route('actualites.edit', $actualite->id) }}">Modifier</a>
        <form onclick="return confirm('Are you sure you want to delete?');" action="{{ route('actualites.destroy') }}"
            method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $actualite->id }}">
            <input type="submit" value="supprimer">
        </form>
    @endforeach

    <form action="{{ route('deconnexion_admin') }}" method="POST">
        @csrf
        <input type="submit" value="Déconnexion">
    </form>
</x-layout>
