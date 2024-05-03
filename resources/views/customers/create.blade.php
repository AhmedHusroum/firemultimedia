@extends('layouts.app')

@section('content')
    <div class="text-white py-8 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl text-black font-bold mb-8 max-w-md mx-auto">Klant Aanmaken</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-4 mb-8">
                {{ session('success') }}
            </div>
        @endif

        <form method="post" action="{{ route('customers.store') }}" class="max-w-md mx-auto">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-black text-sm font-semibold">Naam:</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="w-full bg-white border-2 border-gray-700 text-black p-2 rounded">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

             <div class="mb-4">
                <label for="company_name" class="block text-black text-sm font-semibold">Bedrijfsnaam:</label>
                <input type="text" name="company_name" value="{{ old('company_name') }}" required
                       class="w-full bg-white border-2 border-gray-700 text-black p-2 rounded">
                @error('company_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-black text-sm font-semibold">E-mail:</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full border-2 border-gray-700 text-black p-2 rounded">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="street" class="block text-black text-sm font-semibold">Straat:</label>
                <input type="text" name="street" value="{{ old('street') }}" required
                       class="w-full border-2 border-gray-700 text-black p-2 rounded">
                @error('street')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="houseNumber" class="block text-black text-sm font-semibold">Huisnummer:</label>
                <input type="text" name="houseNumber" value="{{ old('houseNumber') }}" required
                       class="w-full border-2 border-gray-700 text-black p-2 rounded">
                @error('houseNumber')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="zipcode" class="block text-black text-sm font-semibold">Postcode:</label>
                <input type="text" name="zipcode" value="{{ old('zipcode') }}" required
                       class="w-full border-2 border-gray-700 text-black p-2 rounded">
                @error('zipcode')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="city" class="block text-black text-sm font-semibold">Plaats:</label>
                <input type="text" name="city" value="{{ old('city') }}" required
                       class="w-full border-2 border-gray-700 text-black p-2 rounded">
                @error('city')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phonenumber" class="block text-black text-sm font-semibold">Telefoonnummer:</label>
                <input type="text" name="phonenumber" value="{{ old('phonenumber') }}" required
                       class="w-full border-2 border-gray-700 text-black p-2 rounded">
                @error('phonenumber')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Voeg andere invoervelden toe indien nodig -->

            <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">
                Klant Aanmaken
            </button>
        </form>
    </div>
@endsection
