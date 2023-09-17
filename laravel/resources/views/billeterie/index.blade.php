  <div id="app">
      <x-layout>
          <div class="bill">
              <div class="bill_forfaits">
                  @foreach ($forfaits as $key => $forfait)
                      <div class="bill_boite
                    {{ $forfait->id === 1 ? 'boite_1' : '' }}
                    {{ $forfait->id === 2 ? 'boite_gauche' : '' }}
                    {{ $forfait->id === 3 ? 'boite_droite' : '' }}"
                          style="background-image: url('{{ $forfait->image }}'); background-size: cover;">
                          <div class="bill_nom">
                              <p>{{ $forfait->nom }}</p>
                          </div>

                          @if (auth()->check())
                              {{-- L'utilisateur est déjà connecté, redirigez vers la page de panier --}}
                              <a href="{{ route('user.panier', ['forfait_id' => $forfait->id]) }}">Réservez</a>
                          @else
                              {{-- L'utilisateur n'est pas connecté, affichez le lien "Réserver" avec le paramètre 'from_page' --}}
                              <a href="{{ route('user_connexion.create', ['forfait_id' => $forfait->id]) }}">Réservez</a>
                          @endif
                      </div>
                  @endforeach
              </div>
          </div>
      </x-layout>
  </div>
  <script src="{{ asset('js/app.js') }}"></script>
