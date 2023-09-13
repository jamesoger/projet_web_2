<x-layout>
    <h1>{{ auth()->user()->prenom }}</h1>
    <h2>Forfait sélectionné :</h2>
    @if (session()->has('selected_forfait'))
        <?php $forfaitDetails = session('selected_forfait'); ?>
        <p>Nom du forfait : {{ $forfaitDetails['nom'] }}</p>
        <p>Prix du forfait : {{ $forfaitDetails['prix'] }}</p>
        <form action="{{ route('forfait_user.store') }}" method="POST">
            @csrf
            <input type="hidden" name="forfait_id" value="{{ $forfaitDetails['id'] }}">

            <label for="date_arrivee">Date d'arrivée :</label>
            <input type="date" id="date_arrivee" name="date_arrivee" required>

            <label for="date_depart">Date de départ :</label>
            <input type="date" id="date_depart" name="date_depart" required>

            <input type="submit" value="Commander">
        </form>
    @endif

    <h2>Liste des forfaits :</h2>
    @foreach ($forfaits as $forfait)
        <p>{{ $forfait->nom }}</p>
        <p>{{ $forfait->prix }}</p>
    @endforeach

    <form action="{{ route('deconnexion_user') }}" method="POST">
        @csrf
        <input type="submit" value="Déconnexion">
    </form>
</x-layout>
