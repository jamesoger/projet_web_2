<x-layout titre="Programmation">
    <x-nav />
    <div class="prog">
        @foreach ($programmation as $key => $prog)
        <div class="date {{ $key % 3 == 0 ? 'date-gauche' : ($key % 3 == 1 ? 'date-centre' : 'date-droite') }}">
            <h1>{{ Carbon\Carbon::parse($prog->date)->translatedFormat('d F Y') }}</h1>
        </div>
            <div class="prog_bubbles">
                @php
                    $artistImageClasses = ['image-haut', 'image-milieu', 'image-bas'];
                    $spectacleImageClasses = ['image-haut', 'image-milieu', 'image-bas'];
                    $artistClassIndex = 0;
                    $spectacleClassIndex = 0;
                @endphp

                @foreach ($prog->artistes as $artiste)
                    <div class="image_bubbles">
                        <img class="{{ $artistImageClasses[$artistClassIndex] }}" src="{{ $artiste->image }}" alt="">
                        <span class="{{ $artistImageClasses[$artistClassIndex] }}"> {{ $artiste->nom_scene }}</span>
                        <span  id="nom" class="{{ $artistImageClasses[$artistClassIndex] }}"> {{ $artiste->heure_show }}</span>

                    @php
                        $artistClassIndex = ($artistClassIndex + 1) % count($artistImageClasses);
                    @endphp
                    </div>
                @endforeach

                @foreach ($prog->spectacles as $spectacle)
                    <div class="image_bubbles">
                        <img class="{{ $spectacleImageClasses[$spectacleClassIndex] }}" src="{{ $spectacle->image }}" alt="">
                        <span class="{{ $spectacleImageClasses[$spectacleClassIndex] }}" >{{ $spectacle->nom }}</span>
                        <span id="nom" class="{{ $spectacleImageClasses[$spectacleClassIndex] }}"> {{ $spectacle->heure }}</span>

                    @php
                        $spectacleClassIndex = ($spectacleClassIndex + 1) % count($spectacleImageClasses);
                    @endphp
                     </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <x-footer />
</x-layout>

