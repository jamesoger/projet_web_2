<x-layout>
    <h1>Mes forfaits!</h1>
    @foreach (auth()->user()->forfaits as $forfait)
        <div>
            <p>{{ $forfait->nom }} {{ $forfait->prix }} </p>
            <p>Date d'arrivée : {{ $forfait->pivot->date_arrivee }}</p>
            <p>Date de départ : {{ $forfait->pivot->date_depart }}</p>
            <form action="{{ route('forfait.destroy', $forfait->pivot->forfait_id) }}" method="POST">
                @csrf
                <input type="hidden" name="forfait_id" value="{{ $forfait->pivot->forfait_id }}">
                <button type="submit">Supprimer</button>
            </form>
        </div>
    @endforeach
    <form action="{{ route('user.deconnecter') }}" method="POST">
        @csrf
        <input type="submit" value="Déconnexion">
    </form>
</x-layout>
