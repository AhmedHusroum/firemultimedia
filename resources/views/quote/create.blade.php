@extends('layouts.guest')
@section('content')
<div class="container mx-auto">
    <div class="text-center">
        <h2 class="text-3xl font-bold mb-8">Offerte voor {{$title}}</h2>
    </div>
    <div class="text-center items-center">
        <form class="pr-32 pl-32 w-full" action="{{route('quote.store')}}" method="POST">
            @csrf
            <input type="number" name="productid" hidden value="{{$id}}"/>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="bedrijfsnaam">
                        Bedrijfsnaam
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required name="bedrijfsnaam" id="bedrijfsnaam" type="text" placeholder="bedrijfsnaam">
                </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="straat">
                    Straat
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required name="straat" id="straat" type="text" placeholder="straat">
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="huisnummer">
                    Huisnummer
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required name="huisnummer" id="huisnummer" type="number" placeholder="huisnummer">
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="postcode">
                    Postcode
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required name="postcode" id="postcode" type="text" placeholder="postcode">
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="stad">
                    Stad
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required name="stad" id="stad" type="text" placeholder="stad">
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="telefoonnummer">
                    Telefoonnummer
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required name="telefoonnummer" id="telefoonnummer" type="text" placeholder="telefoonnummer">
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="email">
                    Email
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required name="email" id="email" type="email" placeholder="email">
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="amount">
                    Aantal
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required name="amount" id="amount" type="number" placeholder="aantal">
            </div>
            <input type="submit" class="mt-4 inline-block border-2 text-white border-yellow-400 hover:bg-yellow-400 duration-200 font-bold py-2 px-6 rounded-full" value="Verstuur"/>
        </form>
    </div>
</div>
@endsection
