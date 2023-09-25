<x-layout titre="Programmation">
    <x-nav />
    <canvas id="atelier" class="canvas_lines"></canvas>
    </div>
    <div class="prog">
        <div id="app_prog">
            <audio id="son_prog" autoplay muted >
                <source src="{{ asset('audio/377540__frankum__axon-01-techno-track-loop.mp3') }}" type="audio/mp3">

                Votre navigateur ne supporte pas l'élément audio.
            </audio>
            <button id="playPauseButton" onclick="toggleAudio()">
                <i id="playIcon" class="material-icons" style="border-radius:50%">play_circle_filled</i>
                <i id="pauseIcon" class="material-icons" style="display:none; border-radius:50%">pause_circle_filled</i>
            </button>

            @php
                $artistImageClasses = ['image-haut', 'image-milieu', 'image-bas'];
                $spectacleImageClasses = ['image-haut', 'image-milieu', 'image-bas'];
                $artistClassIndex = 0;
                $spectacleClassIndex = 0;
                $maxImagesPerContainer = 7;
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
                <span id="nom" class="{{ $artistImageClasses[$artistClassIndex] }}">
                    {{ $artiste->heure_show }}</span>
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
                <img class="{{ $spectacleImageClasses[$spectacleClassIndex] }}" src="{{ $spectacle->image }}"
                    alt="">
                <span class="{{ $spectacleImageClasses[$spectacleClassIndex] }}">{{ $spectacle->nom }}</span>
                <span id="nom" class="{{ $spectacleImageClasses[$spectacleClassIndex] }}">
                    {{ $spectacle->heure }}</span>
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
    import {
        BouncingBalls
    } from "{{ asset('js/lines.js') }}";

    const canvas = document.querySelector("#atelier");

    canvas.style.position = "fixed";
    canvas.style.top = "0";
    canvas.style.left = "0";
    canvas.style.width = "100%";
    canvas.style.height = "100%";

    const bouncingBalls = new BouncingBalls(canvas);
</script>

<script>
    const audio = document.getElementById("son_prog");
    const playPauseButton = document.getElementById("playPauseButton");
    const playIcon = document.getElementById("playIcon");
    const pauseIcon = document.getElementById("pauseIcon");
    let audioPlaying = false;

    function toggleAudio(event) {


        if (audioPlaying) {
            audio.pause();
            playIcon.style.display = "inline";
            pauseIcon.style.display = "none";
        } else {
            audio.muted = false;
            audio.play();
            audioPlaying = true;
            playIcon.style.display = "none";
            pauseIcon.style.display = "inline";
        }
    }
</script>
