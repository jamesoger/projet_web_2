<x-layout titre="Modification du spectacle {{$spectacle->nom}}">
    <x-nav />

    <div class="spectacle-edit">
        <h1>Modification du spectacle
            <br><span>{{ $spectacle->nom }}</span>
        </h1>


        <div class="spectacle-edit-form">
            <form action="{{ route('programmation.spectacle.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $spectacle->id }}">

                <div class="spectacle-edit-groupe">
                    <label for="nom">Nom</label>
                    <x-forms.erreur champ="nom" />
                    <input id="input-groupe" type="text" name="nom" placeholder="Spectacle..." value="{{ $spectacle->nom }}">
                </div>

                <div class="spectacle-edit-groupe heure">
                    <label for="heure">Heure de la représentation</label>
                    <x-forms.erreur champ="heure" />
                    <input id="heure" type="time" name="heure" value="{{ $spectacle->heure }}">
                </div>

                <div class="spectacle-edit-groupe img">
                    <label for="image">Image</label>
                    <x-forms.erreur champ="image" />
                    <input type="file" name="image" accept="image/*">
                    <input type="hidden" name="image_spectacle"value="{{ $spectacle->image }}">
                </div>

                <div class="spectacle-edit-groupe date">
                    <label for="date">Date de la représentation</label>
                    <x-forms.erreur champ="date" />
                    <select name="date">
                        @foreach ($programmations as $programmation)
                            <option value="{{ $programmation->id }}"
                                {{ $spectacle->programmations->contains('id', $programmation->id) ? 'selected' : '' }}>
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
