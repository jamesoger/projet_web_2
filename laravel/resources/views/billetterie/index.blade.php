<x-layout titre="Enregistrement">
    <x-nav />

    <div class="confirmation-message">
        {{-- message de confirmation --}}
        <x-message />
    </div>

    <div class="bill">
        <div class="bill_forfaits">
            @foreach ($forfaits as $key => $forfait)
                <div class="bill_boite
                            {{ $forfait->id === 1 ? 'boite_1' : '' }}
                            {{ $forfait->id === 2 ? 'boite_gauche' : '' }}
                            {{ $forfait->id === 3 ? 'boite_droite' : '' }}"
                    style="background-image: url('{{ $forfait->image }}'); background-size: cover;"
                    alt="{{ $forfait->image }}">
                    <div class="bill_nom">
                        <p>{{ $forfait->nom }}</p>
                    </div>

                    {{-- <div class="prix">
                        <p>à partir de</p>
                        <p class="tarif">99$</p>
                    </div> --}}

                    <div class="btn-reserver">
                        @if (auth()->check())
                            <a href="{{ route('user.panier', ['forfait_id' => $forfait->id]) }}">Réservez</a>
                        @else
                            <a href="{{ route('user_connexion.create', ['forfait_id' => $forfait->id]) }}">Réservez</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <x-footer />
</x-layout>
