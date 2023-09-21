<x-layout titre="Programmation">
    <x-nav />
    <div class="prog">
        @foreach ($programmation as $prog)
            <h1>{{ Carbon\Carbon::parse($prog->date)->translatedFormat('d F Y') }}</h1>
            <div class="prog_bubbles">
                @foreach ($prog->artistes as $artiste)
                    <div class="flex_bubble">
                        {{ $artiste->nom_scene }}
                        {{ $artiste->heure_show }}
                        <img src="{{ $artiste->image }}" alt="">
                    </div>
                @endforeach
                <br>
                @foreach ($prog->spectacles as $spectacle)
                    <div class="flex_bubble">
                        {{ $spectacle->nom }}
                        {{ $spectacle->heure }}
                        <img src="{{ $spectacle->image }}" alt="">
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <x-footer />
</x-layout>

