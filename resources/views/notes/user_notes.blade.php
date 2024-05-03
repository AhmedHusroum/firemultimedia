@extends('layouts.app')

@section('content')
    <div class="text-black py-12">
        <div class="px-64">
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <h1 class="text-2xl font-bold mb-4">Bedrijfsinfo van {{ $user->name }}</h1>

            @if($companies->count() > 0)
                <table class="table-auto border-collapse border mb-4">
                    <thead>
                        <tr>
                            <th class="border py-2 px-4">ID</th>
                            <th class="border py-2 px-4">Bedrijfsnaam</th>
                            <th class="border py-2 px-4">Eigenaar van bedrijf</th>
                            <th class="border py-2 px-4">Straat</th>
                            <th class="border py-2 px-4">Huisnummer</th>
                            <th class="border py-2 px-4">Postcode</th>
                            <th class="border py-2 px-4">Stad</th>
                            <th class="border py-2 px-4">Telefoonnummer</th>
                            <th class="border py-2 px-4">Bewerken</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                            @if($user->company_id == $company->id)
                                <tr>
                                    <td class="border py-2 px-4">{{$company->id}}</td>
                                    <td class="border py-2 px-4">{{$company->company_name}}</td>
                                    <td class="border py-2 px-4">{{$user->name}}</td>
                                    <td class="border py-2 px-4">{{$company->street}}</td>
                                    <td class="border py-2 px-4">{{$company->house_number}}</td>
                                    <td class="border py-2 px-4">{{$company->zipcode}}</td>
                                    <td class="border py-2 px-4">{{$company->city}}</td>
                                    <td class="border py-2 px-4">{{$company->phonenumber}}</td>
                                    
                                    <td class="border py-2 px-4">
                                        <a href="{{ route('notes.editCompany', $company->id) }}" class="text-blue-500">Bewerk</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Geen bedrijfsinformatie beschikbaar voor {{ $user->name }}</p>
            @endif

            <h2 class="text-2xl font-bold mb-4">Notities van {{ $user->name }}</h2>

            @if ($notes->count() > 0)
                <ul class="mb-4">
                    @foreach($notes as $note)
                        <li class="border p-4 rounded mb-12">
                            <p>{{ $note->note }}</p>
                            <p>Aangemaakt op: {{ $note->date }}</p>
                            <a href="{{ route('notes.edit', ['note' => $note]) }}" class="text-blue-500">Bewerken</a>
                            <a href="{{ route('notes.destroy', ['note' => $note]) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $note->id }}').submit();" class="text-red-500 ml-2">Verwijderen</a>

                            <form id="delete-form-{{ $note->id }}" action="{{ route('notes.destroy', ['note' => $note]) }}" method="post" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('notes.create', ['user_id' => $user->id]) }}" class="bg-blue-500 text-white py-2 px-4 rounded mb-12">Nieuwe Notitie Toevoegen</a>
                <a href="{{ route('notes.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded">Terug naar Gebruikers</a>
            @else
                <p class="mb-12">Geen notities beschikbaar voor {{ $user->name }}</p>
                <a href="{{ route('notes.create', ['user_id' => $user->id]) }}" class="bg-blue-500 text-white py-2 px-4 rounded mb-12">Nieuwe Notitie Toevoegen</a>
                <a href="{{ route('notes.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded">Terug naar Gebruikers</a>
            @endif
        </div>
    </div>
@endsection
