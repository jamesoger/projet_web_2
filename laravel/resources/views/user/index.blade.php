<x-layout>
    <h1>Mes forfaits!</h1>
    @foreach (auth()->user()->forfaits as $forfait)
        <div>
            <p>{{ $forfait->nom }} {{ $forfait->prix }} </p>
            <p>Date d'arrivée : {{ $forfait->pivot->date_arrivee }}</p>
            <p>Date de départ : {{ $forfait->pivot->date_depart }}</p>
            <form action="{{ route('forfait.destroy', $forfait->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </div>
    @endforeach
</x-layout>










