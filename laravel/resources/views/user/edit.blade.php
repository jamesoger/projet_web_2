<x-layout titre="Modification de : {{ $user->prenom }}">
    <x-nav />
    <div class="user-edit">
        <h1>Modification de
            <br><span>{{ $user->nom_complet }}</span>
        </h1>
        <div class="user-edit-form">
            <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
                @csrf
                <div class="user-edit-input">
                    <label for="prenom">Prénom</label>
                    <x-forms.erreur champ="prenom" />
                    <input type="text" name="prenom" id="prenom" value="{{ $user->prenom }}">
                </div>
                <div class="user-edit-input">
                    <label for="nom">Nom</label>
                    <x-forms.erreur champ="nom" />
                    <input type="text" name="nom" id="nom" value="{{ $user->nom }}">
                </div>
                <div class="user-edit-input">
                    <label for="email">Adresse e-mail</label>
                    <x-forms.erreur champ="email" />
                    <input type="email" name="email" id="email" value="{{ $user->email }}">
                </div>
                <div class="user-edit-input">
                    <button type="submit">Enregistrer les modifications</button>
                </div>
        </div>

        </form>
    </div>
    <x-footer />
</x-layout>
