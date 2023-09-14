<x-layout>
    <div id="app">

        <h1>Actualités!</h1>
        @foreach ($actualites  as $actualite)
            <h2>{{$actualite->titre}}</h2>
        <p>{{$actualite->date}}</p>
        <p>{{$actualite->details}}</p>
        @endforeach


    </div>
</x-layout>
