<x-layout titre="{{ auth()->user()->prenom }}">
    <x-nav />

    <div class="user_index">
        @if (session('error'))
            <p style="color: red">{{ session('error') }}</p>
        @endif
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
        <div id="app_user">
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
                            'nom' => $forfait->nom,
                            'prix' => $forfait->prix,
                            'date_arrivee' => $forfait->pivot->date_arrivee,
                            'date_depart' => $forfait->pivot->date_depart,
                            'quantite' => 1,
                        ];
                    }
                }
                ?>
                <div class="forfaits_users">


                    <h1>Mes forfaits!</h1>
                    @foreach ($forfaitsGroupes as $index => $forfaitGroupe)
                        <div id="forfait-{{$forfaitGroupe['id']}}">
                            <p>{{ $forfaitGroupe['nom'] }} {{ $forfaitGroupe['prix'] }}</p>
                            <p>Date d'arrivée : {{ $forfaitGroupe['date_arrivee'] }}</p>
                            <p>Date de départ : {{ $forfaitGroupe['date_depart'] }}</p>
                            <p>Quantité : {{ $forfaitGroupe['quantite'] }}</p>
                            <form onclick="return confirm('Are you sure you want to delete?');"
                                action="{{ route('forfait.destroy', $forfait->pivot->id) }}" method="POST">
                                @csrf
                                @error('submit')
                                    <p>{{ $message }}</p>
                                @enderror
                                <button type="submit">Supprimer</button>
                            </form>

                            <button class="toggle-programmation" data-index="{{ $index }}" >Voir plus</button>
                        </div>
                        <div class="programmation_user" id="programmation-{{ $index }}">
                            <?php $datesDejaAffichees = []; ?>
                            <p>Programmation:</p>
                            @foreach ($programmations as $programmation)
                                @if ($programmation->date >= $forfaitGroupe['date_arrivee'] && $programmation->date <= $forfaitGroupe['date_depart'])
                                    @if (!in_array($programmation->date, $datesDejaAffichees))
                                        <h2>Date : {{ $programmation->date }}</h2>
                                        <?php $datesDejaAffichees[] = $programmation->date; ?>
                                    @endif

                                    @foreach ($programmation->artistes as $artiste)
                                        <p>{{ $artiste->nom_scene }}</p>
                                        <p>{{ $artiste->heure_show }}</p>
                                    @endforeach

                                    @foreach ($programmation->spectacles as $spectacle)
                                        <p>Nom : {{ $spectacle->nom }}</p>
                                        <p>Heure : {{ $spectacle->heure }}</p>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>

                </div>
                @endforeach
            </div>
            <a href="{{ route('billetterie.index') }}">Réservez un autre forfait?</a>

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
            const index = this.getAttribute('data-index'); // Obtenez l'index du bouton cliqué
            const programmationSection = document.getElementById(`programmation-${index}`); // Trouvez la section de programmation correspondante

            if (programmationSection) {
                if (programmationSection.style.display === 'none' || programmationSection.style.display === '') {
                    programmationSection.style.display = 'block';
                    this.textContent = 'Voir moins'; // Change le texte du bouton en "Voir moins"
                } else {
                    programmationSection.style.display = 'none';
                    this.textContent = 'Voir plus'; // Change le texte du bouton en "Voir plus"
                }
            }
        });
    });
});


</script>
