@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
        <div class="text-center">
            <h2 class="text-3xl font-bold mb-8">Offerte voor {{$quote->companyname}}</h2>
        </div>
        <div class="text-center items-center">
            <form class="pr-32 pl-32 w-full" action="{{route('invoice.store')}}" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-10">
                    <div class="w-full container">
                        <div class="card bg-base-100 shadow-xl">
                            <div class="card-body">
                        <h2 class="text-1xl font-bold mb-8">Offertegegevens:</h2>
                        <input type="number" name="quoteid" hidden value="{{$quote->id}}"/>
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="bedrijfsnaam">
                                bedrijfsnaam
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required name="bedrijfsnaam" id="bedrijfsnaam" type="text" placeholder="bedrijfsnaam" value="{{$quote->companyname}}">
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="straat">
                                straat
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required name="straat" id="straat" type="text" placeholder="straat" value="{{$quote->street}}">
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="huisnummer">
                                huisnummer
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required name="huisnummer" id="huisnummer" type="number" placeholder="huisnummer" value="{{$quote->number}}">
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="postcode">
                                postcode
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required name="postcode" id="postcode" type="text" placeholder="postcode" value="{{$quote->postalcode}}">
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="stad">
                                stad
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required name="stad" id="stad" type="text" placeholder="stad" value="{{$quote->city}}">
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="telefoonnummer">
                                telefoonnummer
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required name="telefoonnummer" id="telefoonnummer" type="text" placeholder="telefoonnummer" value="{{$quote->phonenumber}}">
                        </div>
                        <div class="flex flex-wrap -mx-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                                email
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required name="email" id="email" type="email" placeholder="email" value="{{$quote->email}}">
                        </div>
                    </div>
                        </div>
                    </div>

                    <div class="w-full container">
                        <div class="card bg-base-100 shadow-xl">
                            <div class="card-body">
                                <h2 class="text-1xl font-bold mb-8">Offertegegevens:</h2>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="product">
                                        Product naam
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required name="prodname" id="prodname" type="text" placeholder="Product" value="{{$product->name}}">
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="amount">
                                        Aantal
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required name="amount" id="amount" type="number" placeholder="Aantal" value="{{$quote->amount}}">
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="cost">
                                        Installatiekosten
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required name="prodinstallcost" id="prodinstallcost" type="number" placeholder="Product installatie kosten">
                                </div>
                            </div>
                        </div>
                        <div class="card bg-base-100 shadow-xl mt-16 h-auto">
                            <div class="card-body">
                                <h2 class="text-1xl font-bold mb-8">Extra notitie:</h2>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="note">
                                        notitie
                                    </label>
                                    <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="note" id="note" type="textarea" placeholder="Extra notitie" required></textarea>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <input type="submit" class="mt-4 inline-block border-2 border-yellow-400 hover:bg-yellow-400 duration-200 text-black font-bold py-2 px-6 rounded-full" value="Verstuur"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
