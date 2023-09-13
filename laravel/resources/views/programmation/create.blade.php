<x-layout>
    <form action="{{ route('programmation.store') }}" method="POST">
        @csrf
        <div>
            <label for="artistes" name="date">Date</label>
            <input type="date" name="date" id="date">
        </div>
        <div>
            <label for="artistes" name="nom_scene">Artiste</label>
            <input type="text" name="nom_scene">
        </div>
        <div>
            <label for="artistes" name="image">Image</label>
            <input type="file" name="image">
        </div>
        <div>
            <label for="artistes" name="heure_show">Heure de la représentation</label>
            <input type="time" name="heure_show">
        </div>
        <input type="submit">
    </form>
</x-layout>
