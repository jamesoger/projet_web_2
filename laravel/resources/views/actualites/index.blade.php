<x-layout titre="Actualités">
    <x-nav />

    <main class="actu">
        <div class="actu-h1">
            <h1>Les actus du festival</h1>
        </div>

        @foreach ($actualites as $actualite)
            <div class="actu-conteneur">
                <div class="actu-info">
                    <div class="actu-titre">
                        <h2>{{ $actualite->titre }}</h2>
                    </div>

                    <div class="actu-date">
                        <h2>{{ $actualite->date }}</h2>
                    </div>

                    <div class="actu-texte">
                        <p>{{ $actualite->details }}</p>
                    </div>
                </div>

                <div class="actu-ligne"></div>

                <div class="actu-img">
                    <img src="{{ $actualite->image }}" width="800px" alt="actualite">
                </div>
            </div>
            @endforeach

    </main>
    <x-footer />
</x-layout>
