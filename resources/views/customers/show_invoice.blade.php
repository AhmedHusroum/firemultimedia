@extends('layouts.app')
@section('content')
    <div class="flex items-center justify-center">
        <div class="bg-white p-4 shadow-md rounded-md max-w-[210mm] max-h-[297mm] w-full">
            <h2 class="text-2xl font-bold mb-4 border-b pb-2">Factuur</h2>
            <div>
                <ul>
                    <li class="pb-2"><strong>Naam klant:</strong> {{$customer->name}}</li>
                    <li class="pb-2"><strong>Naam bedrijf:</strong>@forelse ($companies as $company) {{ $company->name }} @empty Geen bedrijf @endforelse</li>
                    <li class="pb-10"><strong>Datum:</strong> {{$invoice->date}}</li>
                    <li class="pb-2"><strong>Klantnummer:</strong> {{$customer->id}}</li>
                    <li class="pb-2"><strong>Contractnummer:</strong>@forelse ($contracts as $contract){{ $contract->id }}@empty Geen contract @endforelse</li>
                    <li class="pb-10"><strong>Factuurnummer:</strong> {{$invoice->id}} </li>
                    <li class="border-b-4 border-yellow-400 pb-2"></li>
                </ul>
            </div>
            <div>
                <ul>
                    <li class="pb-2 mt-4"><strong>Naam product:</strong> {{$product->name}} </li>
                    <li class="pb-2"><strong>Prijs:</strong> {{$product->price}}</li>
                    <li class="pb-2"><strong>Aantal:</strong> {{$productInvoice->amount}} </li>
                    <li class="pb-2"><strong>Subtotaal:</strong> {{$productInvoice->price}}</li>
                </ul>
                <p class="mt-12 italic">Te betalen binnen 14 dagen na dagtekening.</p>
            </div>
        </div>
    </div>
@endsection
