<x-layout titre="creation d'actualités">
    <x-nav />

    <div class="actu-ajout">
        <h1>Créer une nouvelle actualité</h1>

        <div class="actu-ajout-form">
            <form action="{{ route('actualites.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="actu-ajout-input">
                    <label for="date">Date</label>
                    <x-forms.erreur champ="date" />
                    <input type="date" name="date" value="{{ old('date') }}"id="date">
                </div>

                <div class="actu-ajout-input">
                    <label for="titre">Titre</label>
                    <x-forms.erreur champ="titre" />
                    <input type="text" name="titre" placeholder="Titre..."value="{{ old('titre') }}" id="titre"  >
                </div>

                <div class="actu-ajout-input">
                    <label for="details">Details</label>
                    <x-forms.erreur champ="details" />
                    <textarea name="details" placeholder="Détails de l'actu..." id="details" rows="4">{{ old('details') }}</textarea>
                </div>

                <div class="actu-image">
                    <label for="image">Image</label>
                    <x-forms.erreur champ="image" />
                    <input type="file" name="image" id="image">
                </div>

                <div class="actu-btn">
                    <button type="submit">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
    <x-footer />
</x-layout>
