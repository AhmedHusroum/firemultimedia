@extends('layouts.app')
@section('content')
    <body class="bg-gray-100 p-4">
        <div class="overflow-x-auto w-auto px-64">
            <table id="table" class="table">
                <thead>
                <tr>
                    <th class="border py-2 px-4">ID</th>
                    <th class="border py-2 px-4">Bedrijfsnaam</th>
                    <th class="border py-2 px-4">Straat</th>
                    <th class="border py-2 px-4">Huisnummer</th>
                    <th class="border py-2 px-4">Postcode</th>
                    <th class="border py-2 px-4">Stad</th>
                    <th class="border py-2 px-4">Telefoonnummer</th>
                    <th class="border py-2 px-4">BKR Check</th>
                    <th class="border py-2 px-4">BKR gecheckt op</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{$company->id}}</td>
                        <td>{{$company->name}}</td>
                        <td>{{$company->street}}</td>
                        <td>{{$company->house_number}}</td>
                        <td>{{$company->zipcode}}</td>
                        <td>{{$company->city}}</td>
                        <td>{{$company->phonenumber}}</td>
                        <td>
                            <form method="post" action="{{ route('finances.update', $company->id) }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $company->id }}">
                                <div class="flex items-center">
                                    <input type="checkbox" name="bkr_checked" {{ $company->bkr_checked ? 'checked' : '' }}>
                                    <button type="submit" class="text-black ml-2">Opslaan</button>
                                </div>
                            </form>
                        </td>
                        <td>{{$company->bkr_checked_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <script>
                let table = new DataTable('#table');
            </script>
        </div>
    </body>
@endsection