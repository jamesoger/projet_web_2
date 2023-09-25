<x-layout titre="enregistrement admin">
    <x-nav />

    <div class="admin-create">
        <h1>Enregistrez un admin</h1>

        <div class="admin-form-create">
            <form action="{{ route('enregistrement_admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="droits" value="0">

                <div class="ligne-1">
                    <div class="prenom">
                        <label for="prenom">Prénom</label>
                        <input id="prenom" name="prenom" type="text" autocomplete="given-name" autofocus value="{{ old('prenom') }}">
                        <x-forms.erreur champ="prenom" />
                    </div>

                    <div class="nom">
                        <label for="nom"> Nom </label>
                        <input id="nom" name="nom" type="text" value="{{ old('nom') }}" autocomplete="family-name">
                        <x-forms.erreur champ="nom" />
                    </div>
                </div>

                <div class="ligne-2">
                    <div class="email">
                        <label for="email">Courriel</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email">
                        <x-forms.erreur champ="email" />
                    </div>
                </div>

                <div class="ligne-3">
                    <div class="image">
                        <label for="image">Image</label>
                        <input id="image" name="image" type="file">
                        <x-forms.erreur champ="email" />
                    </div>

                    <div class="statut">
                        <label for="droits">Statut</label>
                        <select name="droits" id="droits">
                            <option value="1" @if (old('droits') == '1') selected @endif>Administrateur</option>
                            <option value="0" @if (old('droits') == '0') selected @endif>Employé</option>
                        </select>
                    </div>
                </div>


                <div class="ligne-4">
                    <div class="password">
                        <label for="password"> Mot de passe</label>
                        <input id="password" name="password" type="password" autocomplete="current-password">
                        <x-forms.erreur champ="password" />
                    </div>

                    <div class="confirmation">
                        <label for="confirm-password">Confirmation du mot de passe</label>
                        <input id="confirm-password" name="confirmation_password" type="password">
                        <x-forms.erreur champ="confirmation_password" />
                    </div>
                </div>

                <div class="btn-submit">
                    <button type="submit"> Créez votre compte !</button>
                </div>
            </form>
        </div>
    </div>
    <x-footer />
</x-layout>
