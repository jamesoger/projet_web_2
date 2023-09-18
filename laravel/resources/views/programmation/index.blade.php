<x-layout titre="Programmation">
    <h1>Programmation!</h1>
    @foreach ($programmation as $prog)
    <h1>{{ $prog->date }}</h1>
    <p>
        @foreach ($prog->artistes as $artiste)
            {{ $artiste->nom_scene }}
            {{ $artiste->heure_show }}
            <img src="{{  $artiste->image}}" alt="" width="100px">

        @endforeach
        <br>
        @foreach ($prog->spectacles as $spectacle)
            {{ $spectacle->nom }}
            {{ $spectacle->heure }}
           <img src="{{$spectacle->image}}" alt="" width="100px">
        @endforeach
    </p>
@endforeach


</x-layout>
