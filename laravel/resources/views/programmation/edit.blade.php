<x-layout titre="Ajout programmation">
    <x-nav />

    <div class="prog-edit">
        <h1>Ajout à la programmation du
            <br><span>{{ Carbon\Carbon::parse($programmation->date)->translatedFormat('d F Y') }}</span>
        </h1>
        {{-- message de confirmation --}}
        <x-message />

        <form class="form-prog" action="{{ route('programmation.update', ['id' => $programmation->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{ $programmation->id }}">

            <div class="artiste">
                <div class="nom">
                    <label for="nom_scene">Nom d'artiste</label>
                    @error('nom_scene')
                        <p>{{ $message }}</p>
                    @enderror
                    <input type="text" id="nom" name="nom_scene" placeholder="Artiste...">
                </div>

                <div class="heure">
                    <label for="heure_show">Heure</label>
                    @error('heure_show')
                        <p>{{ $message }}</p>
                    @enderror
                    <input id="heure" type="time" name="heure_show">
                </div>

                <div class="image">
                    <label for="image">Image</label>
                    @error('image')
                        <p>{{ $message }}</p>
                    @enderror
                    <input id="image" type="file" name="image" accept="image/*">
                </div>
            </div>

            <div class="spectacle">
                <div class="nom">
                    <label for="nom_spectacle">Nom du spectacle</label>
                    @error('nom_spectacle')
                        <p>{{ $message }}</p>
                    @enderror
                    <input id="nom" type="text" name="nom_spectacle" placeholder="Spectacle...">
                </div>

                <div class="heure">
                    <label for="heure_spectacle">Heure</label>
                    @error('heure_spectacle')
                        <p>{{ $message }}</p>
                    @enderror
                    <input id="heure" type="time" name="heure_spectacle">
                </div>

                <div class="image">
                    <label for="image_spectacle">Image</label>
                    @error('image_spectacle')
                        <p>{{ $message }}</p>
                    @enderror
                    <input id="image" type="file" name="image_spectacle" accept="image/*">

                </div>
            </div>
            <input class="submit-prog" type="submit" value="ajouter">
        </form>
    </div>
    <x-footer />
</x-layout>

<x-fade />
