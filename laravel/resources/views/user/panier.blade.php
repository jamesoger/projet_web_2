<x-layout>
    <div id="app">
        @if (session('error'))
            <p style="color: red">{{ session('error') }}</p>
        @endif
        <h1>{{ auth()->user()->prenom }}</h1>
        <h2>Forfait sélectionné :</h2>
        @if (session()->has('selected_forfait'))
            <?php $forfaitDetails = session('selected_forfait'); ?>
            <p>Nom du forfait : {{ $forfaitDetails['nom'] }}</p>
            <p>Prix du forfait : {{ $forfaitDetails['prix'] }}</p>

            <form action="{{ route('forfait_user.store') }}" method="POST">
                @csrf
                <input type="hidden" name="forfait_id" value="{{ $forfaitDetails['id'] }}">
                <label for="dates">Selectionnez votre date d'arrivée :</label>
                @error('dates')
                    <p>{{ $message }}</p>
                @enderror
                <input type="date" id="dates" name="dates" min="2024-08-09" max="2024-08-11">
                <label for="quantite">Quantité :</label>
                <input type="number" id="quantite" name="quantite" value="1" min="1">
                <input type="submit" value="Envoyer">
            </form>
        @endif
        <h2>Liste des forfaits :</h2>
        @foreach ($forfaits as $forfait)
        @if ($forfait->id !== $forfaitDetails['id'])

            <p>{{ $forfait->nom }}</p>
            <p>{{ $forfait->prix }}</p>

            <form method="POST" action="{{ route('forfait_user_update', ['forfait_id' => $forfait->id]) }}">
                @csrf
                <button type="submit">Sélectionner</button>
            </form>
            @endif
        @endforeach


        {{-- <h2>Liste des forfaits :</h2>
        @foreach ($forfaits as $forfait)
            <p>{{ $forfait->nom }}</p>
            <p>{{ $forfait->prix }}</p>
            <form action="{{ route('forfait_user.store') }}" method="POST">
                @csrf
                <input type="hidden" name="forfait_id" value="{{ $forfaitDetails['id'] }}">
                <label for="dates">Selectionnez votre date d'arrivée :</label>
                @error('dates')
                    <p>{{ $message }}</p>
                @enderror
                <input type="date" id="dates" name="dates" min="2024-08-09" max="2024-08-11">
                <input type="submit" value="Envoyer">
            </form> --}}
        {{-- <form action="{{ route('forfait_user.store') }}" method="POST">
                @csrf
                <input type="hidden" name="forfait_id" value="{{ $forfaitDetails['id'] }}">

                <label for="date_arrivee">Date d'arrivée :</label>
                <input type="date" id="date_arrivee" name="date_arrivee" required>

                <label for="date_depart">Date de départ :</label>
                <input type="date" id="date_depart" name="date_depart" required>

                <input type="submit" value="Commander">
            </form> --}}
        {{-- @endforeach --}}

        <form action="{{ route('deconnexion_user') }}" method="POST">
            @csrf
            <input type="submit" value="Déconnexion">
        </form>


    </div>

</x-layout>
