<x-layout titre="Modification d'une acualité">
    @if (session('error'))
    <p style="color: red">{{ session('error') }}</p>
@endif
    <h1>Édition de : {{$actualites->titre}}</h1>
    <form action="{{ route('actualites.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $actualites->id }}">
        <div>
            <label for="date">Date :</label>
            @error('date')
                <p>{{ $message }}</p>
            @enderror
            <input type="date" name="date" id="date" value="{{ $actualites->date }}" required>
        </div>
        <div class="form-group">
            <label for="titre">Titre:</label>
            @error('titre')
            <p>{{ $message}}</p>
        @enderror
            <input type="text" name="titre" id="titre" value="{{ $actualites->titre }}">
        </div>

        <div class="form-group">
            <label for="détails">Détails:</label>
            @error('details')
            <p>{{ $message}}</p>
        @enderror
            <input type="text" name="details" id="details" value="{{ $actualites->details }}">
        </div>

        <div>
            <label for="image">Image :</label>
            @error('image')
            <p>{{ $message }}</p>
        @enderror
            <input type="file" name="image" id="image">
        </div>

        </div>
        <div class="form-group">
            <button type="submit">Enregistrer les modifications</button>
        </div>
    </form>
</x-layout>
