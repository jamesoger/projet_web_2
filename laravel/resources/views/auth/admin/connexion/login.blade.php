<x-layout titre="Connexion admin">
    <x-nav />
    <div class="login_admin">
        <div class="login_admin_form">
            <form action="{{ route('admin_connexion.authentifier') }}" method="POST">
                @csrf
                <div>
                    <label for="email">Courriel</label>

                    <x-forms.erreur champ="email" />
                    <div>
                        <input id="email" name="email" type="email" autocomplete="email"
                            value="{{ old('email') }}">
                    </div>
                </div>
                <div>
                    <div>
                        <label for="password">
                            Mot de passe
                        </label>
                    </div>

                    <x-forms.erreur champ="password" />
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password">
                    </div>
                </div>
                <div>
                    <button type="submit">
                        Connectez-vous!
                    </button>
                </div>
            </form>
        </div>


</x-layout>
