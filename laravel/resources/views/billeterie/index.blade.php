<x-layout>
    <h1>Billeterie!</h1>
    <h1>@foreach ($forfaits as $forfait )
        <p>{{ $forfait->nom}}</p>
        <p>{{ $forfait->prix}}</p>

         <a href="{{ route('user_connexion.create', ['forfait_id' => $forfait->id])}}">Réservez</a>
    @endforeach</h1>

</x-layout>
