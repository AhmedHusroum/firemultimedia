@extends('layouts.app')
@section('content')

    <div class="overflow-x-auto w-auto px-64">
        @if (session('success'))
            <div class="alert alert-success mb-12">
                {{ session('success') }}
            </div>
        @endif
        <table id="table" class="table">
            <!-- head -->
            <thead>
            <tr>
                <th></th>
                <th>Klant</th>
                <th>Product</th>
                <th>Bedrijfsnaam</th>
                <th>Prijs</th>
                <th>Datum</th>
                <th>Status</th> <!-- Nieuwe kolom voor de status -->
                <th>Bekijk</th>
            </tr>
            </thead>
            <tbody>
            <!-- row 1 -->
            @foreach($invoices as $invoice)
                <tr>
                    <td>
                        #{{$invoice->id}}
                    </td>
                    <td>
                        {{$invoice->customer->name}}
                    </td>
                    <td>
                        {{$invoice->product_id}}
                    </td>
                    <td>
                        {{$invoice->quotation->companyname}}
                    </td>
                    <td>
                        {{$invoice->install_cost}}
                    </td>
                    <td>
                        {{$invoice->created_at}}
                    </td>
                    <td>
                        <!-- Formulier om de status bij te werken -->
                        <form method="POST" action="{{ route('invoice.updateStatus', $invoice->id) }}">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="this.form.submit()">
                                <option value="Niet betaald" {{ $invoice->status == 'Niet betaald' ? 'selected' : '' }}>Niet betaald</option>
                                <option value="Betaald" {{ $invoice->status == 'Betaald' ? 'selected' : '' }}>Betaald</option>
                            </select>
                        </form>
                        
                    </td>
                    <td>
                        <a href="{{ route('invoice.edit', $invoice->id) }}" class="btn btn-primary">Bekijk</a>
                    </td>
                </tr>
            @endforeach
            <script>
                let table = new DataTable('#table');
            </script>
            </tbody>
        </table>
    </div>
@endsection

