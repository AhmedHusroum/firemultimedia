@extends('layouts.app')

@section('content')
<body class="bg-gray-100 p-4">
    <div class="overflow-x-auto w-auto px-64">
        <table id="table" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Beschrijving</th>
                    <th>Startdatum</th>
                    <th>Einddatum</th>
                    <th>Type</th>
                    <th>Ondertekend</th>
                    <th>Actie</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leaseContracts as $contract)
                    <tr>
                        <td>{{ $contract->id }}</td>
                        <td>{{ $contract->name }}</td>
                        <td>{{ $contract->description }}</td>
                        <td>{{ $contract->start_date }}</td>
                        <td>{{ $contract->end_date }}</td>
                        <td>{{ $contract->type }}</td>
                        @if ($contract->is_signed == false)
                            <td>Nee</td>
                        @else
                            <td>Ja</td>
                        @endif   
                        <td><a href="{{ route('customers.show_lease_contract', ['id' => $contract->id]) }}">Bekijk</a></td>  
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
