<x-layout titre="enregistrement admin">
    <x-nav />
    <div class="admin_create">
        <h1>Enregistrez un administrateur</h1>
        <div class="admin_form_create">
            <form action="{{ route('enregistrement_admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="droits" value="0">
                <div class="enregistrement_admin_form_group user-names">
                    <div class="enregistrement_admin_form_group_field">
                        <label for="prenom">Prénom</label>
                        <input id="prenom" name="prenom" type="text" autocomplete="given-name" autofocus
                            value="{{ old('prenom') }}">
                        <x-forms.erreur champ="prenom" />
                    </div>
                    <div class="enregistrement_admin_form_group_field">
                        <label for="nom"> Nom </label>
                        <input id="nom" name="nom" type="text" value="{{ old('nom') }}"
                            autocomplete="family-name">
                        <x-forms.erreur champ="nom" />
                    </div>
                </div>
                <div class="enregistrement_admin_form_group_email">
                    <label for="email">Courriel</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}"
                        autocomplete="email">
                    <x-forms.erreur champ="email" />
                </div>
                <div class="enregistrement_admin_form_group_file">
                    <label for="image">Image</label>
                    <input id="image" name="image" type="file">
                    <x-forms.erreur champ="email" />
                </div>
                <div class="enregistrement_admin_form_group_droits">
                    <label for="droits">Statut</label>
                    <select name="droits" id="droits">
                        <option value="1" @if (old('droits') == '1') selected @endif>Administrateur</option>
                        <option value="0" @if (old('droits') == '0') selected @endif>Employé</option>
                    </select>
                </div>

                <div class="enregistrement_admin_form_group passwords">
                    <div class="enregistrement_admin_form_group_field">
                        <label for="password"> Mot de passe</label>
                        <input id="password" name="password" type="password" autocomplete="current-password">
                        <x-forms.erreur champ="password" />
                    </div>

                    <div class="enregistrement_admin_form_group_field">
                        <label for="confirm-password">Confirmation du mot de passe</label>
                        <input id="confirm-password" name="confirmation_password" type="password">
                        <x-forms.erreur champ="confirmation_password" />
                    </div>
                </div>
                <div class="enregistrement_admin_form_group">
                    <button type="submit"> Créez votre compte d'admin!</button>
                </div>
            </form>
        </div>
    </div>
    <x-footer />
</x-layout>
