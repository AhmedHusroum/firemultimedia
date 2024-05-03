@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 border rounded shadow-md">
            <h1 class="text-2xl font-bold mb-4">Details van {{ $maintenanceAppointment->title }}</h1>
            <p><strong class="font-semibold mt-4 block">Naam:</strong> {{ $maintenanceAppointment->title }}</p>
            <p><strong class="font-semibold my-4 block">Start datum:</strong> {{ $maintenanceAppointment->start_date }}</p>
            <p><strong class="font-semibold my-4 block">Eind datum:</strong> {{ $maintenanceAppointment->end_date }}</p>
            <p><strong class="font-semibold my-4 block">Opmerkingen:</strong> {{ $maintenanceAppointment->remark }}</p>
            <p><strong class="font-semibold my-4 block">Type:</strong> {{ $maintenanceAppointment->maintenance_type }}</p>

            @if(auth()->check() && (auth()->user()->role === 'Headmaintenance' || auth()->user()->role === 'Admin'))
            <a href="{{ route('maintenance.edit', $maintenanceAppointment->id) }}" class="bg-blue-500 text-white p-2 rounded">Bewerk</a>
                <form method="post" action="{{ route('maintenance.destroy', $maintenanceAppointment->id) }}" class="inline-block ml-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white p-2 rounded" onclick="return confirm('Weet je zeker dat je deze afspraak wilt verwijderen?')">Verwijderen</button>
                </form>
            @else
                <a href="{{ route('work_orders.create') }}" class="btn btn-primary">Maak Werkbon</a>
            @endif
        </div>
    </div>
@endsection
