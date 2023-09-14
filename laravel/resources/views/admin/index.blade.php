<x-layout>
    <h1>Admin</h1>
    <h2>Users</h2>
    @foreach ($users as $user)
    <p>{{ $user->prenom }} {{ $user->nom }}</p>
    <form action="{{ route('user.destroy') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        <input type="submit" value="supprimer">
    </form>
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
                        <form action="{{ route('forfait_admin.destroy',$forfait->pivot->id) }}" method="POST">
                            @csrf
                            <input type="submit" value="supprimer">
                        </form>
                    @endforeach
                </ul>
            @else
                <p>Cet utilisateur n'a pas de forfaits associés.</p>
            @endif
        @endif
    @endforeach
    <ul>
        <h3>Liste des administrateurs</h3>
        <a href="{{route('enregistrement_admin.create')}}">Ajouter un nouvel administrateur</a>
        @foreach ($admins as $admin)
            <p>{{ $admin->prenom }} {{ $admin->nom }}</p>
         {{-- SUPPRESSION --}}
         <form action="{{ route('admin.destroy') }}" method="POST">
            @csrf

            <input type="hidden" name="id" value="{{ $admin->id }}">
            <input type="submit" value="supprimer">

        </form>
        @endforeach
    </ul>
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
                     <a href="{{ route('programmation.edit', ['id' => $programmation->id]) }}">Ajouter à la programmation!</a>
                    @foreach ($programmation->artistes as $artiste)
                        <tr>
                            <td>{{ $artiste->nom_scene }}</td>
                            <td>{{ $artiste->heure_show }}</td>
                         </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
    <form action="{{ route('deconnexion_admin') }}" method="POST">
        @csrf
        <input type="submit" value="Déconnexion">
    </form>
</x-layout>
