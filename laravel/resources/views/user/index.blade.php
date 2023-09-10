<x-layout>
    <h1>Mes forfaits!</h1>
    @foreach (auth()->user()->forfaits as $forfait)
        <div>
            <p>{{ $forfait->nom }} {{ $forfait->prix }}</p>
            <form action="{{ route('forfait.destroy', $forfait->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </div>
    @endforeach
</x-layout>










