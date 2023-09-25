<x-layout titre="Connexion admin">
    <x-nav />

    <div class="admin-login">
        <h1>Connexion d'admin</h1>
        <div class="admin-form">
            <form action="{{ route('admin_connexion.authentifier') }}" method="POST">
                @csrf

                <div class="admin-input">
                    <label for="email">Courriel</label>
                    <x-forms.erreur champ="email" />

                    <input id="email" name="email" type="email" autocomplete="email" value="{{ old('email') }}">
                </div>

                <div class="admin-input">
                    <label for="password">Mot de passe</label>
                    <x-forms.erreur champ="password" />

                    <input id="password" name="password" type="password" autocomplete="current-password">
                </div>

                <div>
                    <button type="submit">Connectez-vous !</button>
                </div>
            </form>
        </div>
    </div>
    <x-footer />
</x-layout>
