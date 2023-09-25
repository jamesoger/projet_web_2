<x-layout titre="Enregistrement">
    <x-nav />

    <div class="enregistrement-user">
        <h1>Enregistrement</h1>

        <div class="enregistrement-form">
            <form action="{{ route('enregistrement_user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="ligne-1">
                    <div class="prenom">
                        <label for="prenom">Prénom</label>
                        <input id="prenom" name="prenom" type="text" autocomplete="given-name" autofocus value="{{ old('prenom') }}">
                        <x-forms.erreur champ="prenom" />
                    </div>

                    <div class="nom">
                        <label for="nom">Nom</label>
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
                    <div class="password">
                        <label for="password">Mot de passe</label>
                        <input id="password" name="password" type="password" autocomplete="current-password">
                        <x-forms.erreur champ="password" />
                    </div>

                    <div class="confirmation">
                        <label for="confirm-password">Confirmation</label>
                        <input id="confirm-password" name="confirmation_password" type="password">
                        <x-forms.erreur champ="confirmation_password" />
                    </div>
                </div>

                <div class="btn-submit">
                    <button type="submit">enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <x-footer />
</x-layout>
