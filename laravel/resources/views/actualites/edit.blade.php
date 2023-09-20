<x-layout titre="Modification d'une acualité">
    <x-nav />

    <div class="actu-edit">
        @if (session('error'))
            <p style="color: red">{{ session('error') }}</p>
        @endif
        <h1>Modifier l'actualité</h1>

        <div class="actu-edit-form">
            <form action="{{ route('actualites.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $actualites->id }}">

                <div class="actu-input">
                    <label for="date">Date</label>
                    @error('date')
                        <p>{{ $message }}</p>
                    @enderror
                    <input type="date" name="date" id="date" value="{{ $actualites->date }}" required>
                </div>

                <div class="actu-input">
                    <label for="titre">Titre</label>
                    @error('titre')
                        <p>{{ $message }}</p>
                    @enderror
                    <input type="text" name="titre" id="titre" value="{{ $actualites->titre }}">
                </div>

                <div class="actu-input">
                    <label for="détails">Détails</label>
                    @error('details')
                        <p>{{ $message }}</p>
                    @enderror
                    <textarea name="details" id="details">{{ $actualites->details }}</textarea>
                </div>

                <div class="actu-image">
                    <label for="image">Image</label>
                    @error('image')
                        <p>{{ $message }}</p>
                    @enderror
                    <input type="file" name="image" id="image">
                </div>

                <div class="form-group">
                    <button type="submit">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
