@extends('layouts.app')
@section('content')

<body class="bg-gray-100 p-4">
<div class="overflow-x-auto w-auto px-64">
    <table id="table" class="table">
        <thead>
        <tr>
            <th class="border py-2 px-4">ID</th>
            <th class="border py-2 px-4">Datum</th>
            <th class="border py-2 px-4">Bedrijf</th>
            <th class="border py-2 px-4">Betaald op</th>
            <th class="border py-2 px-4">Actie</th>
        </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{$invoice->id}}</td>
                    <td>{{$invoice->date}}</td>
                    <td>{{$invoice->company_id}}</td>
                    @if ($invoice->paid_at === null)
                        <td>Nog niet betaald</td>
                    @else                    
                        <td>{{$invoice->paid_at}}</td>
                    @endif
                    <td><a href="{{ route('customers.show_invoice', ['id' => $invoice->id]) }}">Bekijk</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
        <script>
            let table = new DataTable('#table');
        </script>
</div>
@endsection
