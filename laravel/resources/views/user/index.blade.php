<x-layout>
    <h1>Mes forfaits!</h1>
    @foreach (auth()->user()->forfaits as $forfait)
        <div>
            <p>{{ $forfait->nom }} {{ $forfait->prix }} </p>
            <p>Date d'arrivée : {{ $forfait->pivot->date_arrivee }}</p>
            <p>Date de départ : {{ $forfait->pivot->date_depart }}</p>
            <form action="{{ route('forfait.destroy',  $forfait->pivot->id) }}" method="POST">
                @csrf
                <button type="submit">Supprimer</button>
            </form>

        </div>
    @endforeach
    <a href="{{route('billeterie.index')}}">Réservez un autre forfait?</a>
    <form action="{{ route('user.deconnecter') }}" method="POST">
        @csrf
        <input type="submit" value="Déconnexion">
    </form>
</x-layout>
