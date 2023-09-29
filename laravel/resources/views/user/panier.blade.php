<div id="app_panier">
    <x-layout titre="panier de {{ auth()->user()->prenom }}">
        <x-nav />
        <div id="app">
        <x-message />
            <div class="panier_user">

                <h1>{{ auth()->user()->nom_complet}} </h1>
                <p>Bienvenue parmi nous! Fais ton choix parmi nos 3 forfaits! </p>
                <div class="forfaits">
                    @if (session()->has('selected_forfait'))
                        <?php $forfaitDetails = session('selected_forfait'); ?>
                        <div class="panier_selection"
                            style="background-image: url('{{ asset($forfaitDetails['image']) }}');">
                            <div class="selected_info">
                                <p>{{ $forfaitDetails['nom'] }}</p>
                                <p id="prix_total">${{ $forfaitDetails['prix'] }}</p>

                            </div>
                        </div>
                    @endif

                    @foreach ($forfaits as $forfait)
                        @if ($forfait->id !== $forfaitDetails['id'])
                            <div class="un_forfait" style="background-image: url('{{ asset($forfait->image) }}');">
                                <div class="info_forfait">
                                    <p>{{ $forfait->nom }}</p>
                                    <p>${{ $forfait->prix }} </p>
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
                            <input type="number" id="quantite" name="quantite" v-model="quantite" value="1"
                                min="1">
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
        <x-footer />
    </x-layout>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>

<script>
    /********** BLOQUER DATES  **********/

    document.addEventListener('DOMContentLoaded', function() {

        function masquerDatesNonAutorisees(forfaitId) {
            var dateInput = document.getElementById('dates');
            var dateArrivee = new Date(dateInput.value);
            var dateMax = new Date('2024-08-11');


            dateInput.min = '2024-08-09';
            dateInput.max = '2024-08-11';

            if (forfaitId == 1) {

            } else if (forfaitId == 2) {

                dateInput.max = '2024-08-10';
            } else if (forfaitId == 3) {

                dateInput.max = '2024-08-09';
            }
        }


        var boutonsSelectionner = document.querySelectorAll('button[data-forfait]');
        boutonsSelectionner.forEach(function(bouton) {
            bouton.addEventListener('click', function(event) {
                var forfaitId = event.target.getAttribute('data-forfait');
                masquerDatesNonAutorisees(forfaitId);
            });
        });


        masquerDatesNonAutorisees({{ $forfaitDetails['id'] }});
    });

    /********** AJUSTER PRIX SELON BOUTON QUANTITÉ **********/

    var forfaitPrix = {{ $forfaitDetails['prix'] }};


    new Vue({
        el: '#app',
        data: {
            quantite: 1,
            forfaitPrix: forfaitPrix,
        },
        watch: {
            quantite: function() {
                this.updatePrixTotal();
            }
        },
        methods: {
            updatePrixTotal: function() {
                var prixTotal = (this.quantite * this.forfaitPrix).toFixed(2);
                document.getElementById('prix_total').textContent = '$' + prixTotal;
            }
        },
        mounted: function() {

            this.updatePrixTotal();
        }
    });
</script>
