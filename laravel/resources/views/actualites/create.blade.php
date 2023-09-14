<x-layout>
    <h1>Créer une nouvelle actualité</h1>

    {{-- @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif --}}

    <form action="{{ route('actualites.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="titre">Titre :</label>
            @error('titre')
                <p>{{ $message }}</p>
            @enderror
            <input type="text" name="titre" id="titre" required>
        </div>

        <div>
            <label for="image">Image :</label>
            @error('image')
            <p>{{ $message }}</p>
        @enderror
            <input type="file" name="image" id="image">
        </div>

        <div>
            <label for="details">Details :</label>
            @error('details')
            <p>{{ $message }}</p>
        @enderror
            <textarea name="details" id="details" rows="4" required></textarea>
        </div>

        <button type="submit">Ajouter</button>
    </form>
</x-layout>
