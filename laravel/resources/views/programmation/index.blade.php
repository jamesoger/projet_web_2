<x-layout>
    <h1>Programmation!</h1>
    @foreach ($programmation as $prog)
    <h1>{{ $prog->date }}</h1>
    <p>
        @foreach ($prog->artistes as $artiste)
            {{ $artiste->nom_scene }}
            {{ $artiste->heure_show }}
        @endforeach
    </p>
@endforeach


</x-layout>
