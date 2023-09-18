<x-layout
    titre="Modification de: {{ auth()->guard('admin')->user()->prenom .' ' .auth()->guard('admin')->user()->nom }}">
    <x-nav />
    <h1>Édition de l'administrateur</h1>
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
            <button type="submit">Enregistrer les modifications</button>
        </div>
    </form>
</x-layout>
