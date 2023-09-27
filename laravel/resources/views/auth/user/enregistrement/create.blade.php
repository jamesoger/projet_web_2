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
                        <x-forms.erreur champ="prenom" />
                        <input id="prenom" name="prenom" type="text" placeholder="Prénom..." autocomplete="given-name" autofocus value="{{ old('prenom') }}">
                    </div>

                    <div class="nom">
                        <label for="nom">Nom</label>
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
                    <div class="password">
                        <label for="password">Mot de passe</label>
                        <x-forms.erreur champ="password" />
                        <input id="password" name="password" type="password" placeholder="Mot de passe..." autocomplete="current-password">
                    </div>

                    <div class="confirmation">
                        <label for="confirm-password">Confirmation</label>
                        <x-forms.erreur champ="confirmation_password" />
                        <input id="confirm-password" name="confirmation_password" placeholder="Confirmation..." type="password">
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
