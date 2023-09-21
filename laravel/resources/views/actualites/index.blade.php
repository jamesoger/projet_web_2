<x-layout titre="Actualités">
    <x-nav />

    <main class="actu">
        <div class="actu-h1">
            <h1>Les actus du féstival</h1>
        </div>

        <div class="actu-conteneur">
            @foreach ($actualites as $actualite)
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

                <div class="actu-img">
                    <img src="{{ $actualite->image }}" width="800px" alt="">
                </div>
            @endforeach
        </div>

    </main>
</x-layout>
