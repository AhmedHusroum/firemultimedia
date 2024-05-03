@extends('layouts.app')

@section('content')
    <div class="bg-gray-800 text-white py-8 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-8  max-w-md mx-auto">Wachtwoord Resetten</h1>

        <form method="POST" action="{{ route('password.store') }}" class="max-w-md mx-auto">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold">E-mail:</label>
                <input id="email" class="w-full bg-gray-700 text-white p-2 rounded" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold">Wachtwoord:</label>
                <input id="password" class="w-full bg-gray-700 text-white p-2 rounded" type="password" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-semibold">Bevestig Wachtwoord:</label>
                <input id="password_confirmation" class="w-full bg-gray-700 text-white p-2 rounded" type="password" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">
                    Wachtwoord Resetten
                </button>
            </div>
        </form>
    </div>
@endsection
