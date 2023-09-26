<x-layout titre="{{ auth()->user()->prenom }}">
    <div id="app_user">
        <x-nav />

        <div class="user_index">


            <h1>{{ auth()->user()->prenom }} voici tes forfaits!</h1>
            @if (session('success'))
                <p style="color: green; font-size: 30px;background-color:white ;text-align:center;">
                    {{ session('success') }}
                </p>
            @endif
            @if (session('error'))
                <p style="color: red; font-size: 30px;background-color:white ;text-align:center;">{{ session('error') }}
                </p>
            @endif
            <div class="user_reservations">
                <?php
                $forfaits = auth()->user()->forfaits;
                $forfaitsGroupes = [];

                foreach ($forfaits as $forfait) {
                    $found = false;
                    foreach ($forfaitsGroupes as &$groupe) {
                        if ($groupe['id'] == $forfait->id) {
                            $groupe['billets'][] = [
                                'pivot_id' => $forfait->pivot->id,
                                'date_arrivee' => $forfait->pivot->date_arrivee,
                                'date_depart' => $forfait->pivot->date_depart,
                            ];
                            $found = true;
                            break;
                        }
                    }

                    if (!$found) {
                        $forfaitsGroupes[] = [
                            'id' => $forfait->id,
                            'nom' => $forfait->nom,
                            'prix' => $forfait->prix,
                            'billets' => [
                                [
                                    'pivot_id' => $forfait->pivot->id,
                                    'date_arrivee' => $forfait->pivot->date_arrivee,
                                    'date_depart' => $forfait->pivot->date_depart,
                                ],
                            ],
                        ];
                    }
                }
                ?>

                @foreach ($forfaitsGroupes as $index => $forfaitGroupe)
                    <div class="forfaits_users">
                        <div id="forfait-{{ $forfaitGroupe['id'] }}">
                            <h2>{{ $forfaitGroupe['nom'] }}</h2>
                            <p class="prix">{{ $forfaitGroupe['prix'] * count($forfaitGroupe['billets']) }}$</p>
                            <div class="billets">
                                @foreach ($forfaitGroupe['billets'] as $billet)
                                    <div class="billet">
                                        <div class="dates">
                                            <p>Date d'arrivée :
                                                {{ \Carbon\Carbon::parse($billet['date_arrivee'])->translatedFormat('d F Y') }}
                                            </p>
                                            <p>Date de départ :
                                                {{ \Carbon\Carbon::parse($billet['date_depart'])->translatedFormat('d F Y') }}
                                            </p>
                                        </div>
                                        <form
                                            onclick="return confirm('Êtes-vous certain de vouloir supprimer cet élément?');"
                                            action="{{ route('forfait.destroy', $billet['pivot_id']) }}" method="POST">
                                            @csrf
                                            @error('submit')
                                                <p>{{ $message }}</p>
                                            @enderror
                                            <button type="submit">Supprimer</button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                            <button class="toggle-programmation" data-index="{{ $index }}">Voir plus</button>
                        </div>
                        <div class="programmation_user" id="programmation-{{ $index }}">
                            <span class="fermer-programmation" data-index="{{ $index }}">X</span>
                            <h2>Programmation</h2>
                            <?php $datesDejaAffichees = []; ?>
                            <?php $datesArtistes = []; ?>

                            @foreach ($programmations as $programmation)
                                @foreach ($forfaitGroupe['billets'] as $billet)
                                    @if ($programmation->date >= $billet['date_arrivee'] && $programmation->date <= $billet['date_depart'])
                                        <?php
                                        $dateKey = $programmation->date;
                                        if (!isset($datesArtistes[$dateKey])) {
                                            $datesArtistes[$dateKey] = [
                                                'date' => $programmation->date,
                                                'artistes' => [],
                                            ];
                                        }

                                        foreach ($programmation->artistes as $artiste) {
                                            $artisteKey = $artiste->id;
                                            if (!isset($datesArtistes[$dateKey]['artistes'][$artisteKey])) {
                                                $datesArtistes[$dateKey]['artistes'][$artisteKey] = $artiste;
                                            }
                                        }
                                        ?>
                                        @if (!in_array($programmation->date, $datesDejaAffichees))
                                            <h3>{{ Carbon\Carbon::parse($programmation->date)->translatedFormat('d F Y') }}
                                            </h3>

                                            <?php $datesDejaAffichees[] = $programmation->date; ?>

                                            @foreach ($datesArtistes[$dateKey]['artistes'] as $artiste)
                                                <div class="show_info">
                                                    <p class="heure">{{ $artiste->heure_show }}</p>
                                                    <p class="nom">{{ $artiste->nom_scene }}</p>
                                                    <img class="img_user" src="{{ $artiste->image }}"
                                                        alt="{{ $artiste->nom_scene }}">
                                                </div>
                                            @endforeach
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </div>

                    </div>
                @endforeach
            </div>

            <a class="autre_forfait" href="{{ route('billetterie.index') }}">Réservez un autre forfait?</a>
            <form action="{{ route('deconnexion_user') }}" method="POST">
                @csrf
                <input class="submit_forfait" type="submit" value="Déconnexion">
            </form>
        </div>
    </div>
    <x-footer />
</x-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButtons = document.querySelectorAll('.toggle-programmation');
        toggleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                const programmationSection = document.getElementById(`programmation-${index}`);

                if (programmationSection) {
                    if (programmationSection.classList.contains('expanded')) {
                        programmationSection.classList.remove('expanded');
                    } else {

                        const allProgrammationSections = document.querySelectorAll(
                            '.programmation_user');
                        allProgrammationSections.forEach(section => {
                            section.classList.remove('expanded');
                        });


                        programmationSection.classList.add('expanded');
                    }
                }
            });
        });

        const fermerProgrammation = document.querySelectorAll('.fermer-programmation');
        fermerProgrammation.forEach(fermer => {
            fermer.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                const programmationSection = document.getElementById(`programmation-${index}`);

                if (programmationSection) {
                    programmationSection.classList.remove('expanded');
                }
            });
        });
    });
</script>
