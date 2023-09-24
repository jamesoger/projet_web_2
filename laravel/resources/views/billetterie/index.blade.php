  <div id="app_billeterie">
      <x-layout titre="Enregistrement">
          <x-nav />
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
                              <a href="{{ route('user.panier', ['forfait_id' => $forfait->id]) }}">Réservez</a>
                          @else
                              <a href="{{ route('user_connexion.create', ['forfait_id' => $forfait->id]) }}">Réservez</a>
                          @endif
                      </div>
                  @endforeach
              </div>
          </div>
          <x-footer />
      </x-layout>
  </div>





