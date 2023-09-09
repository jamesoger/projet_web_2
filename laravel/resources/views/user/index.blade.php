<x-layout>
    <h1>{{ auth()->user()->prenom }}</h1>
    <h1>Mes billets</h1>

    <h2>Forfait sélectionné :</h2>
    @if (session()->has('selected_forfait'))
        <?php $forfaitDetails = session('selected_forfait'); ?>
        <p>Nom du forfait : {{ $forfaitDetails['nom'] }}</p>
        <p>Prix du forfait : {{ $forfaitDetails['prix'] }}</p>
    @else
        <p>Aucun forfait sélectionné.</p>
    @endif

    <h2>Liste de vos forfaits :</h2>
    @foreach ($forfaits as $forfait)
        <p>{{ $forfait->nom }}</p>
        <p>{{ $forfait->prix }}</p>
    @endforeach

    <form action="{{ route('deconnexion_user') }}" method="POST">
        @csrf
        <input type="submit" value="Déconnexion">
    </form>
</x-layout>




