@extends('layouts.app')
@section('content')
<div class="flex items-center justify-center">
    <div class="bg-white p-4 shadow-md rounded-md max-w-[210mm] max-h-[297mm] w-full">
        <h2 class="text-2xl font-bold mb-4 border-b pb-2">Contract en Klant Details</h2>
        <div>
            <ul>
                <li class="pb-2"><strong>Naam contract:</strong> {{ $contract->name }}</li>
                <li class="pb-10"><strong>Beschrijving:</strong> {{ $contract->description }}</li>
                <li class=""><strong>Startdatum:</strong> {{ $contract->start_date }}</li>
                <li class="pb-10"><strong>Einddatum:</strong> {{ $contract->end_date }}</li>

                <li><strong>Producten:</strong>@foreach($products as $product) {{$product->name}},@endforeach</li>
                <li class="pb-10"><strong>Type:</strong> {{ $contract->type }}</li>
                <li class="pb-10 border-b pb-2"><strong>Ondertekend:</strong> @if ($contract->is_signed) Ja @else Nee @endif</li>
            </ul>
        </div>
        <div class="mt-4">
            <ul>
                <li class="pb-2"><strong>Naam klant:</strong> {{$customer->name}}</li>
                <li><strong>Bedrijf:</strong> {{$company->name}}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
