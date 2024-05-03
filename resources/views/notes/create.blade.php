@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class="bg-gray p-8 rounded shadow-md w-full max-w-md">
            <h1 class="text-3xl font-bold mb-6 text-center">Nieuwe Aantekening Toevoegen</h1>
            <form action="{{ route('notes.store') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="note" class="block text-white-700 text-sm font-bold mb-2">Aantekening:</label>
                    <textarea name="note" id="note" rows="4" required
                              class="w-full border rounded px-3 py-2 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                <div class="mb-4">
                    <label for="author_id" class="block text-white-700 text-sm font-bold mb-2">Selecteer Gebruiker:</label>
                    <select name="author_id" id="author_id" required
                            class="w-full border rounded px-3 py-2 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ request()->query('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-gray font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Opslaan
                    </button>
                </div>
            </form>
            <div class="text-center mt-4">
                <a href="{{ route('notes.index') }}" class="text-blue-500">Terug naar Aantekeningen</a>
            </div>
        </div>
    </div>
@endsection
