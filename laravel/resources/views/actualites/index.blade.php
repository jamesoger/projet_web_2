<x-layout titre="Actualités">
    <div id="app">
        <x-nav />

        <h1>Actualités!</h1>
        @foreach ($actualites as $actualite)
            <h2>{{ $actualite->date }}</h2>
            <h2>{{ $actualite->titre }}</h2>
            <p>{{ $actualite->details }}</p>
            <img src="{{ $actualite->image }}" width="800px" alt="">
        @endforeach


    </div>
</x-layout>
