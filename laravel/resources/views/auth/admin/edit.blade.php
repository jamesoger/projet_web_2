<x-layout
    titre="Modification de: {{ auth()->guard('admin')->user()->prenom .' ' .auth()->guard('admin')->user()->nom }}">
    <x-nav />

    <div class="edit-admin">
        <h1>Modification de
            <br><span>{{ auth()->guard('admin')->user()->prenom .' ' .auth()->guard('admin')->user()->nom }}</span>
        </h1>
        <div class="edit-admin-form">
            <form action="{{ route('enregistrement_admin.update', ['id' => $admin->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <x-forms.erreur champ="prenom" />
                    <input type="text" name="prenom" placeholder="Son prénom..." id="prenom" value="{{ $admin->prenom }}">
                </div>

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <x-forms.erreur champ="nom" />
                    <input type="text" name="nom" placeholder="Son nom..." id="nom" value="{{ $admin->nom }}">
                </div>

                <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <x-forms.erreur champ="email" />
                    <input type="email" name="email" placeholder="Son email..." id="email" value="{{ $admin->email }}">
                </div>
                <div class="edit-admin-img">
                    <label for="image" >Image</label>
                    <input  name="image" type="file">
                    <input id="image" type="hidden" name="image_courante" value="{{$admin->image}}">
                    <x-forms.erreur champ="image" />
                </div>
                <div class="form-group-droits">
                    <label for="droits">Statut</label>
                    <select name="droits" id="droits">
                        <option value="1" @if (old('droits') == '1') selected @endif>Administrateur</option>
                        <option value="0" @if (old('droits') == '0') selected @endif>Employé</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit">Modifier</button>
                </div>
            </form>

        </div>

    </div>
    <x-footer />
</x-layout>
