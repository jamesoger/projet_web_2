<x-layout>
    <h1>Billeterie!</h1>
    <h1>@foreach ($forfaits as $forfait )
        <p>{{ $forfait->nom}}</p>
        <p>{{ $forfait->prix}}</p>

        @if (auth()->check())
    {{-- L'utilisateur est déjà connecté, redirigez vers la page de panier --}}
    <a href="{{ route('user.panier',['forfait_id' => $forfait->id]) }}">Réservez</a>
@else
    {{-- L'utilisateur n'est pas connecté, affichez le lien "Réserver" avec le paramètre 'from_page' --}}
    <a href="{{ route('user_connexion.create', ['forfait_id' => $forfait->id]) }}">Réservez</a>
@endif
    @endforeach</h1>

</x-layout>
