<x-layout titre="Connexion">
    <div>
        <div >

          <h2 >
            Connexion
          </h2>
        </div>

        @if(session('email'))
            <p>{{ session('email') }}</p>
        @endif

        <div >
          <form action="{{ route('user_connexion.authentifier') }}" method="POST">
            @csrf

            <div>
              <label for="email" >Courriel</label>

               {{-- <x-forms.erreur champ="email" /> --}}
              <div >
                <input id="email" name="email" type="email" autocomplete="email" value="{{ old('email') }}">
              </div>
            </div>

            <div>
              <div>
                <label for="password">
                  Mot de passe
                </label>
              </div>

              {{-- <x-forms.erreur champ="password" /> --}}
              <div class="mt-2">
                <input id="password" name="password" type="password" autocomplete="current-password" >
              </div>
            </div>

            <div>
              <button type="submit">
                Connectez-vous!
              </button>
            </div>
          </form>

          <p >
            <a href="{{route('enregistrement_user.create')}}">
              Pas un membre?
            </a>
          </p>
        </div>
      </div>
</x-layout>
