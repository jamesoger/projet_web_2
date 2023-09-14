<x-layout>
    <h1>{{ $programmation->date }}</h1>
    <form action="{{ route('programmation.update', ['id' => $programmation->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="hidden" name="id" value="{{ $programmation->id }}">

        <!-- Section Artistes -->
        <div>
            <h2>Artistes ajoutés</h2>
            <div>
                <label for="nom_scene">Nom de la scène</label>
                <input type="text" name="nom_scene" placeholder="Nom de la scène">
            </div>
            <div>
                <label for="heure_show">Heure de la représentation</label>
                <input type="time" name="heure_show" placeholder="Heure de la représentation">
            </div>
            <div>
                <label for="image">Image</label>
                <input type="file" name="image" accept="image/*">
            </div>
        </div>

        <!-- Section Spectacles -->
        <div>
            <h2>Spectacles ajoutés</h2>
            <div>
                <label for="nom_spectacle">Nom du spectacle</label>
                <input type="text" name="nom_spectacle" placeholder="Nom du spectacle">
            </div>
            <div>
                <label for="heure_spectacle">Heure de la représentation</label>
                <input type="time" name="heure_spectacle" placeholder="Heure de la représentation">
            </div>
            <div>
                <label for="image_spectacle">Image du spectacle</label>
                <input type="file" name="image_spectacle" accept="image/*">
            </div>
        </div>

        <!-- Autres champs du formulaire... -->

        <input type="submit" value="Modifier Programmation">
    </form>
</x-layout>




