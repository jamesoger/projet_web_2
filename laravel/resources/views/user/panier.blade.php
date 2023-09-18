<div id="app">
    <x-layout titre="panier de {{ auth()->user()->prenom }}">
        <div id="app">

            <div class="panier_user">
                @if (session('error'))
                    <p style="color: red">{{ session('error') }}</p>
                @endif
                <h1>{{ auth()->user()->prenom }} {{ auth()->user()->nom }}</h1>
                <div class="forfaits">
                    @if (session()->has('selected_forfait'))
                        <?php $forfaitDetails = session('selected_forfait'); ?>
                        <div class="panier_selection"
                            style="background-image: url('{{ asset($forfaitDetails['image']) }}');">
                            <div class="selected_info">
                                <p>{{ $forfaitDetails['nom'] }}</p>
                                <p>{{ $forfaitDetails['prix'] }} $</p>
                            </div>
                        </div>
                    @endif

                    @foreach ($forfaits as $forfait)
                        @if ($forfait->id !== $forfaitDetails['id'])
                            <div class="un_forfait" style="background-image: url('{{ asset($forfait->image) }}');">
                                <div class="info_forfait">
                                    <p>{{ $forfait->nom }}</p>
                                    <p>{{ $forfait->prix }} $</p>
                                </div>
                                <form method="POST"
                                    action="{{ route('forfait_user_update', ['forfait_id' => $forfait->id]) }}">
                                    @csrf
                                    <button class="selection_forfait" type="submit">Choisir ce forfait</button>
                                </form>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="form_panier">
                    <form action="{{ route('forfait_user.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="forfait_id" value="{{ $forfaitDetails['id'] }}">
                        <div class="form-group">
                            <label for="dates">Selectionnez votre date d'arrivée :</label>
                            @error('dates')
                                <p>{{ $message }}</p>
                            @enderror
                            <input type="date" id="dates" name="dates" min="2024-08-09" max="2024-08-11">
                        </div>
                        <div class="form-group">
                            <label for="quantite">Quantité :</label>
                            <input type="number" id="quantite" name="quantite" value="1" min="1">
                        </div>
                        <div class="form-group">
                            <input class="submit_panier" type="submit" value="Acheter">
                        </div>
                    </form>
                </div>


                <form class="deconnect_user" action="{{ route('deconnexion_user') }}" method="POST">
                    @csrf
                    <input type="submit" value="Déconnexion">
                </form>
            </div>

        </div>
    </x-layout>
</div>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fonction pour masquer les dates non autorisées en fonction du forfait sélectionné
        function masquerDatesNonAutorisees(forfaitId) {
            console.log(forfaitId);
            var dateInput = document.getElementById('dates');
            var dateArrivee = new Date(dateInput.value);
            var dateMax = new Date('2024-08-11');

            // Réinitialiser la date minimale et maximale
            dateInput.min = '2024-08-09';
            dateInput.max = '2024-08-11';

            if (forfaitId == 1) {
                // Pour le forfait 1, autoriser les dates 9, 10 et 11
            } else if (forfaitId == 2) {
                // Pour le forfait 2, autoriser les dates 9 et 10
                dateInput.max = '2024-08-10';
            } else if (forfaitId == 3) {
                // Pour le forfait 3, autoriser uniquement la date 9
                dateInput.max = '2024-08-09';
            }
        }

        // Écouter les clics sur les boutons "Sélectionner"
        var boutonsSelectionner = document.querySelectorAll('button[data-forfait]');
        boutonsSelectionner.forEach(function(bouton) {
            bouton.addEventListener('click', function(event) {
                var forfaitId = event.target.getAttribute('data-forfait');
                masquerDatesNonAutorisees(forfaitId);
            });
        });

        // Appeler la fonction au chargement de la page
        masquerDatesNonAutorisees({{ $forfaitDetails['id'] }});
    });
</script>
