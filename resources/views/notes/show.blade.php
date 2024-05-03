@extends('layouts.app')

@section('content')
    <div class="bg-gray-800 text-white p-4">
        <div class="overflow-x-auto w-auto px-64">
            <h1 class="text-2xl font-bold mb-4">Aantekening Weergeven</h1>
            <p class="mb-4">{{ $note->note }}</p>
            <p>Toegevoegd op: {{ $note->date }}</p>
            <p>Auteur: {{ $note->author ? $note->author->name : 'Onbekende Auteur' }}</p>

            <div class="flex space-x-4 mt-4">
                <a href="{{ route('notes.edit', $note) }}" class="bg-blue-500 text-white py-2 px-4 rounded">Bewerken</a>
                <a href="{{ route('notes.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded">Terug naar Aantekeningen</a>
            </div>
        </div>
    </div>
@endsection
