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
                        <x-forms.erreur champ="prenom" />
                        <input id="prenom" name="prenom" type="text" placeholder="Prénom..." autocomplete="given-name" autofocus value="{{ old('prenom') }}">
                    </div>

                    <div class="nom">
                        <label for="nom"> Nom </label>
                        <x-forms.erreur champ="nom" />
                        <input id="nom" name="nom" type="text" placeholder="Nom..." value="{{ old('nom') }}" autocomplete="family-name">
                    </div>
                </div>

                <div class="ligne-2">
                    <div class="email">
                        <label for="email">Courriel</label>
                        <x-forms.erreur champ="email" />
                        <input id="email" name="email" type="email" placeholder="Email..." value="{{ old('email') }}" autocomplete="email">
                    </div>
                </div>

                <div class="ligne-3">
                    <div class="image">
                        <label for="image">Image</label>
                        <input id="image" name="image" type="file">
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
                        <x-forms.erreur champ="password" />
                        <input id="password" name="password" type="password" placeholder="Mot de passe..." autocomplete="current-password">
                    </div>

                    <div class="confirmation">
                        <label for="confirm-password">Confirmation</label>
                        <x-forms.erreur champ="confirmation_password" />
                        <input id="confirm-password" name="confirmation_password" placeholder="Mot de passe..." type="password">
                    </div>
                </div>

                <div class="btn-submit">
                    <button type="submit"> Créer !</button>
                </div>
            </form>
        </div>
    </div>
    <x-footer />
</x-layout>
