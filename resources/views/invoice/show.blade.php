@extends('layouts.app')
@section('content')
    <div class="container mx-auto w-full">
        <div class="items-center">
            <div class="grid grid-cols-2 gap-4 w-full">
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">Klantgegevens:</h2>
                        <p>Bedrijfsnaam: {{$invoice->quotation->companyname}}</p>
                        <p>Adres en huisnummer: {{$invoice->quotation->street}} {{$invoice->quotation->number}}</p>
                        <p>Postcode en plaats: {{$invoice->quotation->postalcode}} {{$invoice->quotation->city}}</p>
                        <p>Telefoon: {{$invoice->quotation->phonenumber}}</p>
                        <p>Email: {{$invoice->quotation->email}}</p>
                    </div>
                </div>
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">Bedrijfsgegevens:</h2>
                        <p>Bedrijfsnaam: Barroc Intens</p>
                        <p>Adres en huisnummer: Mooieweg 1a</p>
                        <p>Postcode en plaats: 1234AB Breda</p>
                        <p>Telefoon: 1234567890</p>
                        <p>Email: invoice@barroc-intens.nl</p>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 w-full mt-8">
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>
                                    Product
                                </th>
                                <th>
                                    Aantal
                                </th>
                                <th>
                                    Prijs per stuk
                                </th>
                                <th>
                                    Prijs totaal
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    @foreach ($invoice->products as $product)
                                        {{$product->name}}
                                    @endforeach
                                </td>
                                <td>
                                    {{$invoice->quotation->amount}}
                                </td>
                                <td>
                                    @foreach ($invoice->products as $product)
                                        {{$product->price}}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($invoice->products as $product)
                                        {{$product->pivot->subtotal}}
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 w-full pt-8">
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">Factuur verzonden door:</h2>
                        <p>Naam: {{$invoice->finance->name}}</p>
                        <p>Email: {{$invoice->finance->email}}</p>
                    </div>
                </div>
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">Notities:</h2>
                        <p>{{$invoice->info}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
