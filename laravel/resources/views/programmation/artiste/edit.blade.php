<x-layout titre="Modification de {{$artiste->nom_scene}}">
    <x-nav />

    <div class="artiste-edit">
        <h1>Modifier l'artiste
            <br><span>{{ $artiste->nom_scene }}</span>
        </h1>

        <div class="artiste-edit-form">
            <form action="{{ route('programmation.artiste.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $artiste->id }}">

                <div class="artiste-edit-groupe">
                    <label for="nom_scene">Nom d'artiste</label>
                    <x-forms.erreur champ="nom_scene" />
                    <input id="input-groupe" type="text" name="nom_scene" placeholder="Artiste..." value="{{ $artiste->nom_scene }}">
                </div>

                <div class="artiste-edit-groupe heure">
                    <label for="heure_show">Heure de la représentation</label>
                    <x-forms.erreur champ="heure_show" />
                    <input id="heure" type="time" name="heure_show" value="{{ $artiste->heure_show }}">
                </div>

                <div class="artiste-edit-groupe img">
                    <label for="image">Image</label>
                    <x-forms.erreur champ="image" />
                    <input type="file" name="image" accept="image/*">
                    <input type="hidden" name="image_artiste" value="{{ $artiste->image }}">
                </div>

                <div class="artiste-edit-groupe date">
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

                <button type="submit">Envoyer</button>
            </form>
        </div>
    </div>
    <x-footer />
</x-layout>
