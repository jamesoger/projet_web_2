<x-layout>
    <h1>{{ auth()->user()->prenom }}</h1>
    <h1>Mes billets</h1>
    <form action="{{ route('deconnexion_user') }}" method="POST">
        @csrf

        <input type="submit" value="Déconnexion">
    </form>
</x-layout>
