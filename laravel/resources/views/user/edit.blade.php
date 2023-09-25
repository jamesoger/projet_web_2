<x-layout titre="Modification de : {{ $user->prenom }}">
    <x-nav />
    <div class="user_edit">
        <h1>Modification de {{ $user->nom_complet }}</h1>
        <div class="user_modif_form">
            <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <x-forms.erreur champ="prenom" />
                    <input type="text" name="prenom" id="prenom" value="{{ $user->prenom }}">
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <x-forms.erreur champ="nom" />
                    <input type="text" name="nom" id="nom" value="{{ $user->nom }}">
                </div>
                <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <x-forms.erreur champ="email" />
                    <input type="email" name="email" id="email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <button type="submit">Enregistrer les modifications</button>
                </div>
        </div>

        </form>
    </div>

</x-layout>
