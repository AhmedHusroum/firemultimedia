@extends('layouts.app')

@section('content')
    <div class="bg-gray-800 text-white p-4">
        <h1 class="text-2xl font-bold mb-4">Aantekening Bewerken</h1>
        
        <form action="{{ route('notes.update', $note) }}" method="post" class="mb-4">
            @csrf
            @method('PATCH')
            <label for="note" class="block text-sm font-medium text-gray-300">Aantekening:</label>
            <textarea name="note" id="note" rows="4" required class="w-full bg-gray-700 border border-gray-600 rounded-md p-2 text-white">{{ $note->note }}</textarea>
            <br>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Opslaan</button>
        </form>

        <form action="{{ route('notes.destroy', $note) }}" method="post" class="mb-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded">Verwijderen</button>
        </form>

        <a href="{{ route('notes.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded">Terug naar klanten</a>
    </div>
@endsection
