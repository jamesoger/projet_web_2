<x-layout>
    <h1>Admin</h1>
    <form action="{{ route('deconnexion_admin') }}" method="POST">
        @csrf

        <input type="submit" value="Déconnexion">
    </form>
</x-layout>
