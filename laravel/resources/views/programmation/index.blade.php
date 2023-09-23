<x-layout titre="Programmation">
    <x-nav />
    <div id="app_prog">
        <canvas id="atelier" class="canvas_lines"></canvas>
    </div>
    <div class="prog">
        @php
        $artistImageClasses = ['image-haut', 'image-milieu', 'image-bas'];
        $spectacleImageClasses = ['image-haut', 'image-milieu', 'image-bas'];
        $artistClassIndex = 0;
        $spectacleClassIndex = 0;
        $maxImagesPerContainer = 7; // Maximum d'images par conteneur
        @endphp

        @foreach ($programmation as $key => $prog)
            <div class="date {{ $key % 3 == 0 ? 'date-gauche' : ($key % 3 == 1 ? 'date-centre' : 'date-droite') }}">
                <h1>{{ Carbon\Carbon::parse($prog->date)->translatedFormat('d F Y') }}</h1>
            </div>

            @php
            $totalCount = 0;
            $hasContent = false;
            @endphp

            @foreach ($prog->artistes as $artiste)
                @if ($totalCount % $maxImagesPerContainer == 0)
                    @if ($hasContent)
                        </div>
                    @endif
                    <div class="prog_bubbles">
                        @php
                        $hasContent = false;
                        @endphp
                @endif

                <div class="image_bubbles">
                    <img class="{{ $artistImageClasses[$artistClassIndex] }}" src="{{ $artiste->image }}" alt="">
                    <span class="{{ $artistImageClasses[$artistClassIndex] }}"> {{ $artiste->nom_scene }}</span>
                    <span id="nom" class="{{ $artistImageClasses[$artistClassIndex] }}"> {{ $artiste->heure_show }}</span>
                </div>

                @php
                $artistClassIndex = ($artistClassIndex + 1) % count($artistImageClasses);
                $totalCount++;
                $hasContent = true;
                @endphp
            @endforeach

            @foreach ($prog->spectacles as $spectacle)
                @if ($totalCount % $maxImagesPerContainer == 0)
                    @if ($hasContent)
                        </div>
                    @endif
                    <div class="prog_bubbles">
                        @php
                        $hasContent = false;
                        @endphp
                @endif

                <div class="image_bubbles">
                    <img class="{{ $spectacleImageClasses[$spectacleClassIndex] }}" src="{{ $spectacle->image }}" alt="">
                    <span class="{{ $spectacleImageClasses[$spectacleClassIndex] }}" >{{ $spectacle->nom }}</span>
                    <span id="nom" class="{{ $spectacleImageClasses[$spectacleClassIndex] }}"> {{ $spectacle->heure }}</span>
                </div>

                @php
                $spectacleClassIndex = ($spectacleClassIndex + 1) % count($spectacleImageClasses);
                $totalCount++;
                $hasContent = true;
                @endphp
            @endforeach

            @if ($hasContent)
                </div>
            @endif
        @endforeach
    </div>
    <x-footer />
</x-layout>




 <script type="module">
    import { BouncingBalls } from "{{ asset('js/lines.js') }}";

    const canvas = document.querySelector("#atelier");

    canvas.style.position = "fixed";
canvas.style.top = "0";
canvas.style.left = "0";
canvas.style.width = "100%";
canvas.style.height = "100%";



    const bouncingBalls = new BouncingBalls(canvas);
</script>


