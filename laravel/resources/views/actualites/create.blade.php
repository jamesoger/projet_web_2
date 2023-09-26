<x-layout titre="creation d'actualités">
    <x-nav />
    <div class="actu_create">
        <h1>Créer une nouvelle actualité</h1>

        <form action="{{ route('actualites.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="date">Date :</label>
                <x-forms.erreur champ="date" />
                <input type="date" name="date" id="date" required>
            </div>
            <div>
                <label for="titre">Titre :</label>
                <x-forms.erreur champ="titre" />
                <input type="text" name="titre" id="titre" required>
            </div>

            <div>
                <label for="image">Image :</label>
                <x-forms.erreur champ="image" />
                <input type="file" name="image" id="image">
            </div>

            <div>
                <label for="details">Details :</label>
                <x-forms.erreur champ="details" />
                <textarea name="details" id="details" rows="4" required></textarea>
            </div>

            <button type="submit">Ajouter</button>
        </form>
    </div>
    <x-footer />
</x-layout>
