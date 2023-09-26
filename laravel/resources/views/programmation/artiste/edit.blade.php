<x-layout titre="Modification de {{$artiste->nom_scene}}">
    <x-nav />
    <div class="artiste_edit">

        <h1>{{ $artiste->nom_scene }} </h1>
        <form action="{{ route('programmation.artiste.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{ $artiste->id }}">

            <div>
                <div>
                    <label for="nom_scene">Nom d'artiste</label>
                    <x-forms.erreur champ="nom_scene" />
                    <input type="text" name="nom_scene" value="{{ $artiste->nom_scene }}">
                </div>
                <div>
                    <label for="heure_show">Heure de la représentation</label>
                    <x-forms.erreur champ="heure_show" />
                    <input type="time" name="heure_show" value="{{ $artiste->heure_show }}">
                </div>
                <div>
                    <label for="image">Image</label>
                    <x-forms.erreur champ="image" />
                    <input type="file" name="image" accept="image/*">
                    <input type="hidden" name="image_artiste" value="{{ $artiste->image }}">
                </div>
                <div>
                    <label for="date">Date de la représentation</label>
                    <x-forms.erreur champ="date" />
                    <select name="date">
                        @foreach ($programmations as $programmation)
                            <option value="{{ $programmation->id }}"
                                {{ $artiste->programmations->contains('id', $programmation->id) ? 'selected' : '' }}>
                                {{ $programmation->date }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="submit" value="Envoyer">

        </form>

    </div>
    <x-footer />
</x-layout>
