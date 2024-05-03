@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <div class="max-w-md mx-auto bg-white p-8 border rounded shadow-md">
        <h1 class="text-2xl font-bold mb-6">Afspraak plannen</h1>

        <form method="POST" action="{{ route('maintenance.store') }}">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-semibold text-gray-600">Titel:</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="mb-4">
                <label for="start_date" class="block text-sm font-semibold text-gray-600">Startdatum:</label>
                <input type="datetime-local" id="start_date" name="start_date" class="form-control" required>
            </div>

            <div class="mb-4">
                <label for="end_date" class="block text-sm font-semibold text-gray-600">Einddatum:</label>
                <input type="datetime-local" id="end_date" name="end_date" class="form-control" required>
            </div>

            <div class="mb-4">
                <label for="company_id" class="block text-sm font-semibold text-gray-600">Bedrijf:</label>
                <select id="company_id" name="company_id" class="form-control" required>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="remark" class="block text-sm font-semibold text-gray-600">Opmerking:</label>
                <textarea id="remark" name="remark" class="form-control" required></textarea>
            </div>

            <div class="mb-4">
                <label for="product_category_id" class="block text-sm font-semibold text-gray-600">Productcategorie:</label>
                <select id="product_category_id" name="product_category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="maintenance_type" class="block text-sm font-semibold text-gray-600">Onderhoudstype:</label>
                <select id="maintenance_type" name="maintenance_type" class="form-control" required>
                    @foreach($maintenanceTypes as $type)
                        <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="assigned" class="block text-sm font-semibold text-gray-600">Toegewezen medewerker:</label>
                <select id="assigned" name="assigned" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-6">
                <button type="submit" class="btn btn-primary">Opslaan</button>
            </div>
        </form>
    </div>
</div>
@endsection
