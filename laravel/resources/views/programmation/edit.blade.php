<x-layout titre="Ajout programmation">
    <x-nav />
    @if (session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif
    <h1>{{ $programmation->date }}</h1>
    <form action="{{ route('programmation.update', ['id' => $programmation->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $programmation->id }}">

        <div>
            <h2>Artistes ajoutés</h2>
            <div>
                <label for="nom_scene">Nom d'artiste</label>
                @error('nom_scene')
                    <p>{{ $message }}</p>
                @enderror
                <input type="text" name="nom_scene" placeholder="Nom d'artiste">
            </div>
            <div>
                <label for="heure_show">Heure de la représentation</label>
                @error('heure_show')
                    <p>{{ $message }}</p>
                @enderror
                <input type="time" name="heure_show" placeholder="Heure de la représentation">
            </div>
            <div>
                <label for="image">Image</label>
                @error('image')
                    <p>{{ $message }}</p>
                @enderror
                <input type="file" name="image" accept="image/*">
            </div>
        </div>

        <div>
            <h2>Spectacles ajoutés</h2>
            <div>
                <label for="nom_spectacle">Nom du spectacle</label>
                @error('nom_spectacle')
                    <p>{{ $message }}</p>
                @enderror
                <input type="text" name="nom_spectacle" placeholder="Nom du spectacle">
            </div>
            <div>
                <label for="heure_spectacle">Heure de la représentation</label>
                @error('heure_spectacle')
                    <p>{{ $message }}</p>
                @enderror
                <input type="time" name="heure_spectacle" placeholder="Heure de la représentation">
            </div>
            <div>
                <label for="image_spectacle">Image du spectacle</label>
                @error('image_spectacle')
                    <p>{{ $message }}</p>
                @enderror
                <input type="file" name="image_spectacle" accept="image/*">
            </div>
        </div>



        <input type="submit" value="Modifier Programmation">
    </form>
</x-layout>
