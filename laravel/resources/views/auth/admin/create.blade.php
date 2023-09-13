<x-layout titre="enregistrement admin">
    <div>
        <div >

            <h2 >
                Enregistrez-vous
            </h2>
        </div>

        <div >
            {{-- FORMULAIRE D'ENREGISTREMENT --}}
            <form action="{{ route('enregistrement_admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="droits" value="0">
                {{-- PRÉNOM --}}
                <div>
                    <label for="prenom" >Prénom</label>
                    <div >
                        <input id="prenom" name="prenom" type="text" autocomplete="given-name" autofocus
                            value="{{ old('prenom') }}"
                           >

                        <x-forms.erreur champ="prenom" />

                    </div>
                </div>

                {{-- NOM --}}
                <div>
                    <label for="nom" >
                        Nom
                    </label>
                    <div >
                        <input id="nom" name="nom" type="text" value="{{ old('nom') }}"
                            autocomplete="family-name"
                           >

                        <x-forms.erreur champ="nom" />
                    </div>

                </div>

                {{-- EMAIL --}}
                <div>
                    <label for="email" >Courriel</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" value="{{ old('email') }}"
                            autocomplete="email"
                         >

                        <x-forms.erreur champ="email" />
                    </div>

                </div>


                {{-- PASSWORD --}}
                <div>
                    <div >
                        <label for="password" >
                            Mot de passe
                        </label>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password"
                          >

                        <x-forms.erreur champ="password" />
                    </div>

                </div>

                {{-- CONFIRM PASSWORD --}}
                <div>
                    <div >
                        <label for="confirm-password" >
                            Confirmation du mot de passe
                        </label>
                    </div>
                    <div class="mt-2">
                        <input id="confirm-password" name="confirmation_password" type="password"
                          >

                        <x-forms.erreur champ="confirmation_password" />
                    </div>

                </div>

                <div>
                    <button type="submit"
                    >
                        Créez votre compte d'admin!
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
