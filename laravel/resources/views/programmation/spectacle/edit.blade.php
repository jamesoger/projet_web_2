<x-layout titre="Modification d'un spectacle">
    <x-nav />
    @if (session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif
    <h1>{{ $spectacle->nom }} </h1>
    <form action="{{ route('programmation.spectacle.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $spectacle->id }}">
        <div>
            <div>
                <label for="nom">Nom</label>
                @error('nom')
                    <p>{{ $message }}</p>
                @enderror
                <input type="text" name="nom" value="{{ $spectacle->nom }}">
            </div>
            <div>
                <label for="heure">Heure de la représentation</label>
                @error('heure')
                    <p>{{ $message }}</p>
                @enderror
                <input type="time" name="heure" value="{{ $spectacle->heure }}">
            </div>
            <div>
                <label for="image">Image</label>
                @error('image')
                    <p>{{ $message }}</p>
                @enderror
                <input type="file" name="image" accept="image/*">
                <input type="hidden" name="image_spectacle"value="{{$spectacle->image}}">
            </div>
            <div>
                <label for="date">Date de la représentation</label>
                @error('date')
                    <p>{{ $message }}</p>
                @enderror
                <select name="date">
                    @foreach ($programmations as $programmation)
                        <option value="{{ $programmation->id }}"
                            {{ $spectacle->programmations->contains('id', $programmation->id) ? 'selected' : '' }}>
                            {{ $programmation->date }}
                        </option>
                    @endforeach
                </select>

            </div>
        </div>
        <input type="submit" value="Envoyer">

    </form>
</x-layout>
