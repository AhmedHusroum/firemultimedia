@extends('layouts.app')
@section('content')
    <div class="overflow-x-auto w-auto px-64">
        <table id="table" class="table">
            <!-- head -->
            <thead>
            <tr>
                <th></th>
                <th>Klant</th>
                <th>Product</th>
                <th>Bedrijfsnaam</th>
                <th>Datum</th>
                <th>Bekijk</th>
            </tr>
            </thead>
            <tbody>
            <!-- row 1 -->
            @foreach($quotes as $quote)
                <tr>
                    <td>
                        #{{$quote->id}}
                    </td>
                    <td>
                        {{$quote->customer->name}}
                    </td>
                    <td>
                        {{$quote->products_id}}
                    </td>
                    <td>
                        {{$quote->companyname}}
                    </td>
                    <td>
                        {{$quote->created_at}}
                    </td>
                    <td>
                        <a href="{{route('quote.edit', $quote->id)}}" class="btn btn-primary">Bekijk</a>
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
