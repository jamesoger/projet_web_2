<x-layout
    titre="Modification de: {{ auth()->guard('admin')->user()->prenom .' ' .auth()->guard('admin')->user()->nom }}">
    <x-nav />
    <div class="edit_admin">
        <h1>Modification de {{ auth()->guard('admin')->user()->prenom .' ' .auth()->guard('admin')->user()->nom }}</h1>
        <div class="edit_admin_form">
            <form action="{{ route('enregistrement_admin.update', ['id' => $admin->id]) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="prenom">Prénom:</label>
                    <input type="text" name="prenom" id="prenom" value="{{ $admin->prenom }}">
                </div>

                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" id="nom" value="{{ $admin->nom }}">
                </div>

                <div class="form-group">
                    <label for="email">Adresse e-mail:</label>
                    <input type="email" name="email" id="email" value="{{ $admin->email }}">
                </div>
                <div class="form-group">
                    <label for="droits">Statut</label>
                    <select name="droits" id="droits">
                        <option value="1" @if (old('droits') == '1') selected @endif>Administrateur</option>
                        <option value="0" @if (old('droits') == '0') selected @endif>Employé</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit">Enregistrer les modifications</button>
                </div>
            </form>

        </div>

    </div>

</x-layout>
