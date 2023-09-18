<x-layout titre="{{ auth()->user()->prenom }}">
    @if (session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif
    <h1>Mes forfaits!</h1>
    @foreach (auth()->user()->forfaits as $forfait)
        <div>
            <p>{{ $forfait->nom }} {{ $forfait->prix }} </p>
            <p>Date d'arrivée : {{ $forfait->pivot->date_arrivee }}</p>
            <p>Date de départ : {{ $forfait->pivot->date_depart }}</p>
            <form onclick="return confirm('Are you sure you want to delete?');"
                action="{{ route('forfait.destroy', $forfait->pivot->id) }}" method="POST">
                @csrf
                @error('submit')
                    <p>{{ $message }}</p>
                @enderror
                <button type="submit">Supprimer</button>
            </form>
        </div>
    @endforeach
    <p>Programmation:</p>



    @foreach (auth()->user()->forfaits as $forfait)
    @if ($forfait->pivot->date_arrivee === "2024-08-09")
        @foreach ($programmations as $programmation)
            @foreach ($programmation->artistes as $artiste )
              <p>{{ $artiste->nom_scene}}</p>
            @endforeach
        @endforeach
    @endif
@endforeach



    <a href="{{ route('billetterie.index') }}">Réservez un autre forfait?</a>
    <form action="{{ route('deconnexion_user') }}" method="POST">
        @csrf
        <input type="submit" value="Déconnexion">
    </form>
</x-layout>
