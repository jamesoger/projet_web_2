<x-layout titre="{{ auth()->user()->prenom }}">
    <div id="app_user">
        <x-nav />

        <div class="user_index">
            @if (session('error'))
                <p style="color: red">{{ session('error') }}</p>
            @endif
            <h1>{{ auth()->user()->prenom }} voici tes forfaits!</h1>
            {{-- <h1>Mes forfaits!</h1>
    @foreach (auth()->user()->forfaits as $forfait)
        <div>
            <p>{{ $forfait->nom }} {{ $forfait->prix }} </p>
            <p>Date d'arrivée : {{ $forfait->pivot->date_arrivee }}</p>
            <p>Date de départ : {{ $forfait->pivot->date_depart }}</p>
            <form onclick="return confirm('Are you sure you want to delete?');"
                action="{{ route('forfait.destroy', $forfait->pivot->id) }}" method="POST">
                @csrf
                @error('submit')
                    <p>{{ $message }}</p>
                @enderror
                <button type="submit">Supprimer</button>
            </form>
        </div>
    @endforeach --}}

            <div class="user_reservations">
                <?php
                $forfaits = auth()->user()->forfaits;
                $forfaitsGroupes = [];

                foreach ($forfaits as $forfait) {
                    $found = false;
                    foreach ($forfaitsGroupes as &$groupe) {
                        if ($groupe['id'] == $forfait->id) {
                            $groupe['quantite']++;
                            $found = true;
                            break;
                        }
                    }

                    if (!$found) {
                        $forfaitsGroupes[] = [
                            'id' => $forfait->id,
                            'pivot_id' => $forfait->pivot->id,
                            'nom' => $forfait->nom,
                            'prix' => $forfait->prix,
                            'date_arrivee' => $forfait->pivot->date_arrivee,
                            'date_depart' => $forfait->pivot->date_depart,
                            'quantite' => 1,
                        ];
                    }
                }
                ?>


                @foreach ($forfaitsGroupes as $index => $forfaitGroupe)
                    <div class="forfaits_users">
                        <div id="forfait-{{ $forfaitGroupe['id'] }}">
                            <h2>{{ $forfaitGroupe['nom'] }}</h2>
                            <p class="prix">{{ $forfaitGroupe['prix'] * $forfaitGroupe['quantite'] }}$</p>
                            <div class="dates">
                                <p>Date d'arrivée :
                                    {{ \Carbon\Carbon::parse($forfaitGroupe['date_arrivee'])->format('d F Y') }}</p>
                                <p>Date de départ :
                                    {{ \Carbon\Carbon::parse($forfaitGroupe['date_depart'])->format('d F Y') }}</p>
                            </div>

                            <p>Quantité : {{ $forfaitGroupe['quantite'] }}</p>
                            <form onclick="return confirm('Are you sure you want to delete?');"
                                action="{{ route('forfait.destroy', $forfaitGroupe['pivot_id']) }}" method="POST">
                                @csrf
                                @error('submit')
                                    <p>{{ $message }}</p>
                                @enderror
                                <button type="submit">Supprimer</button>
                            </form>

                            <button class="toggle-programmation" data-index="{{ $index }}">Voir plus</button>
                        </div>
                        <div class="programmation_user expanded" id="programmation-{{ $index }}">
                            <span class="fermer-programmation" data-index="{{ $index }}">X</span>
                            <?php $datesDejaAffichees = []; ?>
                            <h2>Programmation</h2>
                            @foreach ($programmations as $programmation)
                                @if ($programmation->date >= $forfaitGroupe['date_arrivee'] && $programmation->date <= $forfaitGroupe['date_depart'])
                                    @if (!in_array($programmation->date, $datesDejaAffichees))
                                        <h3>Date : {{ $programmation->date }}</h3>
                                        <?php $datesDejaAffichees[] = $programmation->date; ?>
                                    @endif


                                    @foreach ($programmation->artistes as $artiste)
                                        <div class="show_info">
                                            <p class="heure">{{ $artiste->heure_show }}</p>
                                            <p class="nom"> {{ $artiste->nom_scene }}</p>
                                            <img src="{{ $artiste->image }}" alt="" width="40px">
                                        </div>
                                    @endforeach

                                    @foreach ($programmation->spectacles as $spectacle)
                                        <div class="show_info">
                                            <p class="heure">{{ $spectacle->heure }}</p>
                                            <p class="nom">{{ $spectacle->nom }}</p>
                                            <img src="{{ $spectacle->image }}" alt="" width="40px">
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>

                    </div>
                @endforeach
            </div>
            <button class="autre _forfait">
                <a href="{{ route('billetterie.index') }}">Réservez un autre forfait?</a>
            </button>

            <form action="{{ route('deconnexion_user') }}" method="POST">
                @csrf
                <input type="submit" value="Déconnexion">
            </form>
        </div>
    </div>
</x-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButtons = document.querySelectorAll('.toggle-programmation');
        toggleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                const programmationSection = document.getElementById(`programmation-${index}`);
                const croixFermeture = document.querySelector(
                    `.fermer-programmation[data-index="${index}"]`);

                if (programmationSection) {
                    if (programmationSection.classList.contains('expanded')) {
                        programmationSection.classList.remove('expanded');
                        this.textContent =
                            'Voir plus'; // Change le texte du bouton en "Voir plus"
                        croixFermeture.style.display = 'none'; // Masque la croix de fermeture
                    } else {
                        programmationSection.classList.add('expanded');
                        this.textContent =
                            'Voir moins'; // Change le texte du bouton en "Voir moins"
                        croixFermeture.style.display = 'block'; // Affiche la croix de fermeture
                    }
                }
            });
        });

        const fermerProgrammation = document.querySelectorAll('.fermer-programmation');
        fermerProgrammation.forEach(fermer => {
            fermer.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                const programmationSection = document.getElementById(`programmation-${index}`);
                const boutonToggle = document.querySelector(
                    `.toggle-programmation[data-index="${index}"]`);

                if (programmationSection) {
                    programmationSection.classList.remove('expanded');
                    boutonToggle.textContent =
                        'Voir plus'; // Change le texte du bouton en "Voir plus"
                    boutonToggle.style.display =
                        'block'; // Affiche à nouveau le bouton "Voir plus"
                }
            });
        });
    });
</script>
