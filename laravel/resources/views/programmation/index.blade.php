<x-layout titre="Programmation">
    <x-nav />
    <div class="prog">
        @foreach ($programmation as $prog)
            <h1>{{ Carbon\Carbon::parse($prog->date)->translatedFormat('d F Y') }}</h1>
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
                        {{-- <span> {{ $artiste->nom_scene }}</span>
                        <span> {{ $artiste->heure_show }}</span> --}}
                    </div>
                    @php
                        $artistClassIndex = ($artistClassIndex + 1) % count($artistImageClasses);
                    @endphp
                @endforeach

                @foreach ($prog->spectacles as $spectacle)
                    <div class="image_bubbles">
                        <img class="{{ $spectacleImageClasses[$spectacleClassIndex] }}" src="{{ $spectacle->image }}" alt="">
                        {{-- <span>{{ $spectacle->nom }}</span>
                        <span> {{ $spectacle->heure }}</span> --}}
                    </div>
                    @php
                        $spectacleClassIndex = ($spectacleClassIndex + 1) % count($spectacleImageClasses);
                    @endphp
                @endforeach
            </div>
        @endforeach
    </div>
    <x-footer />
</x-layout>

