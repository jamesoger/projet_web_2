<x-layout>
    <h1>{{ auth()->user()->prenom }}</h1>
    <h1>Forfaits</h1>
    @foreach ($forfaits as $forfait )
        <p>{{ $forfait->nom }}</p>
        <p>{{ $forfait->prix }}</p>
    @endforeach
    <h2>Billet sélectionné :</h2>
    @if (session()->has('selected_forfait'))
        <?php $forfaitDetails = session('selected_forfait'); ?>
        <p>Nom du forfait sélectionné : {{ $forfaitDetails['nom'] }}</p>
        <p>Prix du forfait sélectionné : {{ $forfaitDetails['prix'] }}</p>
    @else
        <p>Aucun forfait sélectionné.</p>
    @endif
    <form action="{{ route('deconnexion_user') }}" method="POST">
        @csrf
        <input type="submit" value="Déconnexion">
    </form>
</x-layout>


