<x-layout titre="creation d'actualités">
    <x-nav />


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

    <div class="actu-ajout">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <h1>Créer une nouvelle actualité</h1>

        <div class="actu-ajout-form">
            <form action="{{ route('actualites.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="actu-ajout-input">
                    <label for="date">Date</label>
                    @error('date')
                        <p>{{ $message }}</p>
                    @enderror
                    <input type="date" name="date" id="date" required>
                </div>

                <div class="actu-ajout-input">
                    <label for="titre">Titre</label>
                    @error('titre')
                        <p>{{ $message }}</p>
                    @enderror
                    <input type="text" name="titre" placeholder="Titre..." id="titre" required>
                </div>

                <div class="actu-ajout-input">
                    <label for="details">Details</label>
                    @error('details')
                    <p>{{ $message }}</p>
                    @enderror
                    <textarea name="details" placeholder="Détails de l'actu..." id="details" rows="4" required></textarea>
                </div>

                <div class="actu-image">
                    <label for="image">Image</label>
                    @error('image')
                        <p>{{ $message }}</p>
                    @enderror
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
