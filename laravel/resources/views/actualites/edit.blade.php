<x-layout titre="Modification de l'actualité: {{ $actualites->titre }}">
    <x-nav />

    <div class="actu-edit">

        <h1>Modifier l'actualité</h1>

        <div class="actu-edit-form">
            <form action="{{ route('actualites.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $actualites->id }}">

                <div class="actu-input">
                    <label for="date">Date</label>
                    <x-forms.erreur champ="date" />
                    <input type="date" name="date" id="date" value="{{ $actualites->date }}" required>
                </div>

                <div class="actu-input">
                    <label for="titre">Titre</label>
                    <x-forms.erreur champ="titre" />
                    <input type="text" name="titre" placeholder="Titre..." id="titre"
                        value="{{ $actualites->titre }}">
                </div>

                <div class="actu-input">
                    <label for="détails">Détails</label>
                    <x-forms.erreur champ="details" />
                    <textarea name="details" placeholder="Détails de l'actu..." id="details">{{ $actualites->details }}</textarea>
                </div>

                <div class="actu-image">
                    <label for="image">Image</label>
                    <x-forms.erreur champ="image" />
                    <input type="file" name="image" id="image">
                    <input type="hidden"name="image_courante" value={{ $actualites->image }}>
                </div>

                <div class="form-group">
                    <button type="submit">Modifier</button>
                </div>
            </form>
        </div>
    </div>
    <x-footer />
</x-layout>
