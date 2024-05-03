@extends('layouts.app')

@section('content')
    <div class="bg-gray-800 text-white p-6 rounded-md">
        <h1 class="text-2xl font-bold mb-4">Bewerk Bedrijfsinformatie</h1>

        <form method="post" action="{{ route('notes.updateCompany', $company->id) }}" class="mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Eigenaar van bedrijf:</label>
                <input type="text" name="name" value="{{ $company->name }}" required class="w-full bg-gray-700 border border-gray-600 rounded-md p-2 text-white">
            </div>

            <div class="mb-4">
                <label for="company_name" class="block text-sm font-medium text-gray-300 mb-2">Bedrijfsnaam:</label>
                <input type="text" name="company_name" value="{{ $company->company_name }}" required class="w-full bg-gray-700 border border-gray-600 rounded-md p-2 text-white">
            </div>

            <div class="mb-4">
                <label for="street" class="block text-sm font-medium text-gray-300 mb-2">Straat:</label>
                <input type="text" name="street" value="{{ $company->street }}" required class="w-full bg-gray-700 border border-gray-600 rounded-md p-2 text-white">
            </div>

            <div class="mb-4">
                <label for="house_number" class="block text-sm font-medium text-gray-300 mb-2">Huisnummer:</label>
                <input type="text" name="house_number" value="{{ $company->house_number }}" required class="w-full bg-gray-700 border border-gray-600 rounded-md p-2 text-white">
            </div>

            <div class="mb-4">
                <label for="zipcode" class="block text-sm font-medium text-gray-300 mb-2">Postcode:</label>
                <input type="text" name="zipcode" value="{{ $company->zipcode }}" required class="w-full bg-gray-700 border border-gray-600 rounded-md p-2 text-white">
            </div>

            <div class="mb-4">
                <label for="city" class="block text-sm font-medium text-gray-300 mb-2">Stad:</label>
                <input type="text" name="city" value="{{ $company->city }}" required class="w-full bg-gray-700 border border-gray-600 rounded-md p-2 text-white">
            </div>

            <div class="mb-4">
                <label for="phonenumber" class="block text-sm font-medium text-gray-300 mb-2">Telefoonnummer:</label>
                <input type="text" name="phonenumber" value="{{ $company->phonenumber }}" required class="w-full bg-gray-700 border border-gray-600 rounded-md p-2 text-white">
            </div>

            <!-- Voeg hier andere velden toe -->

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">Wijzigingen Opslaan</button>
        </form>
    </div>
@endsection
