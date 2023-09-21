<x-layout titre="Modification d'artiste">
    <x-nav />
    @if (session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif
    <h1>{{ $artiste->nom_scene }} </h1>
    <form action="{{ route('programmation.artiste.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $artiste->id }}">

        <div>
            <div>
                <label for="nom_scene">Nom d'artiste</label>
                @error('nom_scene')
                    <p>{{ $message }}</p>
                @enderror
                <input type="text" name="nom_scene" value="{{ $artiste->nom_scene }}">
            </div>
            <div>
                <label for="heure_show">Heure de la représentation</label>
                @error('heure_show')
                    <p>{{ $message }}</p>
                @enderror
                <input type="time" name="heure_show" value="{{ $artiste->heure_show }}">
            </div>
            <div>
                <label for="image">Image</label>
                @error('image')
                    <p>{{ $message }}</p>
                @enderror
                <input type="file" name="image" accept="image/*">
                <input type="hidden" name="image_artiste" value="{{$artiste->image}}">
            </div>
            <div>
                <label for="date">Date de la représentation</label>
                @error('date')
                    <p>{{ $message }}</p>
                @enderror

                <select name="date">
                    @foreach ($programmations as $programmation)
                        <option value="{{ $programmation->id }}"
                            {{ $artiste->programmations->contains('id', $programmation->id) ? 'selected' : '' }}>
                            {{ $programmation->date }}
                        </option>
                    @endforeach
                </select>

                {{-- <select name="date">
                    @dd( $artiste->pivot->date)
                    @foreach ($programmations as $programmation)
                        <option value="{{ $programmation->id }}"
                            {{ $artiste->pivot && $artiste->pivot->date == $programmation->id ? 'selected' : '' }}>
                            {{ $programmation->date }}
                        </option>
                    @endforeach
                </select> --}}

            </div>
        </div>
        <input type="submit" value="Envoyer">

    </form>

</x-layout>
