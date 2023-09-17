@props(["champ"])

@error($champ)
    <p class="erreur">{{ $message }}</p>
@enderror
