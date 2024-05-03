@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-bold mb-6">Bewerk Afspraak: {{ $maintenanceAppointment->title }}</h1>
        <form method="post" action="{{ route('maintenance.update', $maintenanceAppointment->id) }}" class="max-w-md mx-auto bg-white p-8 border rounded shadow-md">
            @csrf
            @method('PUT')

            <!-- Form groups with Tailwind CSS classes -->
            <div class="mb-4">
                <label for="title" class="block text-lg font-semibold">Titel:</label>
                <input type="text" id="title" name="title" value="{{ $maintenanceAppointment->title }}" class="form-control" required>
            </div>

            <div class="mb-4">
                <label for="start_date" class="block text-lg font-semibold">Startdatum:</label>
                <input type="datetime-local" id="start_date" name="start_date" value="{{ \Carbon\Carbon::parse($maintenanceAppointment->start_date)->format('Y-m-d\TH:i') }}" class="form-control" required>
            </div>

            <div class="mb-4">
                <label for="end_date" class="block text-lg font-semibold">Einddatum:</label>
                <input type="datetime-local" id="end_date" name="end_date" value="{{ \Carbon\Carbon::parse($maintenanceAppointment->end_date)->format('Y-m-d\TH:i') }}" class="form-control" required>
            </div>

            <div class="mb-4">
                <label for="company_id" class="block text-lg font-semibold">Bedrijf:</label>
                <select name="company_id" class="form-control" required>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" {{ $maintenanceAppointment->company_id == $company->id ? 'selected' : '' }}>
                            {{ $company->company_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="remark" class="block text-lg font-semibold">Opmerking:</label>
                <textarea id="remark" name="remark" class="form-control" required>{{ $maintenanceAppointment->remark }}</textarea>
            </div>

            <div class="mb-4">
                <label for="product_category_id" class="block text-lg font-semibold">Productcategorie:</label>
                <select name="product_category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $maintenanceAppointment->product_category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="maintenance_type" class="block text-lg font-semibold">Onderhoudstype:</label>
                <select name="maintenance_type" class="form-control" required>
                    @foreach($maintenanceTypes as $type)
                        <option value="{{ $type }}" {{ $maintenanceAppointment->maintenance_type == $type ? 'selected' : '' }}>
                            {{ ucfirst($type) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="assigned" class="block text-lg font-semibold">Toegewezen medewerker:</label>
                <select name="assigned" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $maintenanceAppointment->assigned == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-6">
                <button type="submit" class="btn btn-primary">Opslaan</button>
            </div>
        </form>
    </div>
@endsection