<x-layout titre="Ajout programmation">
    <x-nav />
    <div class="prog_edit">
        @if (session('error'))
            <p style="color:red; font-size: 30px;background-color:white ;text-align:center;">{{ session('error') }}</p>
        @endif
        <h1>AJout à la programmation du</h1>
        <h1>{{ Carbon\Carbon::parse($programmation->date)->translatedFormat('d F Y') }}</h1>
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
                    <input type="text" id="nom" name="nom_scene" placeholder="Nom d'artiste">
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
                    <input id="nom" type="text" name="nom_spectacle" placeholder="Nom du spectacle">
                </div>
                <div class="heure">
                    <label for="heure_spectacle">Heure</label>
                    @error('heure_spectacle')
                        <p>{{ $message }}</p>
                    @enderror
                    <input id="heure" type="time" name="heure_spectacle" >
                </div>
                <div class="image">
                    <label for="image_spectacle">Image</label>
                    @error('image_spectacle')
                        <p>{{ $message }}</p>
                    @enderror
                    <input id="image" type="file" name="image_spectacle" accept="image/*">

                </div>
            </div>



            <input class="submit-prog" type="submit" value="ajoutez">
        </form>
    </div>
    <x-footer/>
</x-layout>
