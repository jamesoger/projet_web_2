<x-layout titre="Modification du spectacle {{$spectacle->nom}}">
    <x-nav />

    <div class="spectacle_edit">
        <h1>{{ $spectacle->nom }} </h1>

        <form action="{{ route('programmation.spectacle.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $spectacle->id }}">
            <div>
                <div>
                    <label for="nom">Nom</label>
                    <x-forms.erreur champ="nom" />
                    <input type="text" name="nom" value="{{ $spectacle->nom }}">
                </div>
                <div>
                    <label for="heure">Heure de la représentation</label>
                    <x-forms.erreur champ="heure" />
                    <input type="time" name="heure" value="{{ $spectacle->heure }}">
                </div>
                <div>
                    <label for="image">Image</label>
                    <x-forms.erreur champ="image" />
                    <input type="file" name="image" accept="image/*">
                    <input type="hidden" name="image_spectacle"value="{{ $spectacle->image }}">
                </div>
                <div>
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
            </div>
            <input type="submit" value="Envoyer">

        </form>
    </div>
    <x-footer />
</x-layout>
