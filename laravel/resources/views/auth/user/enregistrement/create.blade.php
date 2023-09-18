  <x-layout titre="Enregistrement">
        <div class="enregistrement_user">
             <h1>Enregistrement</h1>
             <div class="enregistrement_user_form">
                <form action="{{ route('enregistrement_user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="enregistrement_user_form_group user-names">
                        <div class="enregistrement_user_form_group_field">
                            <label for="prenom">Prénom</label>
                            <input id="prenom" name="prenom" type="text" autocomplete="given-name" autofocus value="{{ old('prenom') }}">
                            <x-forms.erreur champ="prenom" />
                        </div>
                        <div class="enregistrement_user_form_group_field">
                            <label for="nom">Nom</label>
                            <input id="nom" name="nom" type="text" value="{{ old('nom') }}" autocomplete="family-name">
                            <x-forms.erreur champ="nom" />
                        </div>
                    </div>
                    <div class="enregistrement_user_form_group_email">
                        <label for="email">Courriel</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email">
                        <x-forms.erreur champ="email" />
                    </div>
                    <div class="enregistrement_user_form_group passwords">
                        <div class="enregistrement_user_form_group_field">
                            <label for="password">Mot de passe</label>
                            <input id="password" name="password" type="password" autocomplete="current-password">
                            <x-forms.erreur champ="password" />
                        </div>
                        <div class="enregistrement_user_form_group_field">
                            <label for="confirm-password">Confirmation du mot de passe</label>
                            <input id="confirm-password" name="confirmation_password" type="password">
                            <x-forms.erreur champ="confirmation_password" />
                        </div>
                    </div>
                    <div class="enregistrement_user_form_group">
                        <button type="submit">enregistrer</button>
                    </div>
                </form>
            </div>

        </div>
    </x-layout>

