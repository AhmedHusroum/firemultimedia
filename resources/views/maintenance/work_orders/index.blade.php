@extends('layouts.app')

@section('content')
    <body class="bg-gray-100 p-4">
        <div class="overflow-x-auto w-auto px-64">
            <h1 class="text-3xl mb-4">Werkbonnen Overzicht</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th class="border py-2 px-4">ID</th>
                        <th class="border py-2 px-4">Title</th>
                        <th class="border py-2 px-4">Description</th>
                        <th class="border py-2 px-4">Work Order Date</th>
                        <th class="border py-2 px-4">Gebruikt materiaal (tussen haakjes hoeveel)</th>
                        <th class="border py-2 px-4">Wie</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($workOrders as $workOrder)
                        <tr>
                            <td class="border py-2 px-4">{{ $workOrder->id }}</td>
                            <td class="border py-2 px-4">{{ $workOrder->title }}</td>
                            <td class="border py-2 px-4">{{ $workOrder->description }}</td>
                            <td class="border py-2 px-4">{{ $workOrder->work_order_date }}</td>
                            <td class="border py-2 px-4">
                                @foreach ($workOrder->materials as $material)
                                    {{ $material->name }} ({{ $material->pivot->material_amount }})<br>
                                @endforeach
                            </td>
                            <td class="border py-2 px-4">
                                @if ($workOrder->user)
                                    {{ $workOrder->user->name }}
                                @else
                                    Geen gebruiker toegewezen
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
@endsection
