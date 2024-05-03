@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success mb-12 w-52 mx-auto">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mx-auto mt-16">
        <div class="flex items-center justify-center">
            <div class="bg-white p-8">
                <h1 class="text-4xl font-bold mb-6 text-center">Welkom bij Maintenance</h1>

                <div class="text-center mb-6">
                    <p class="text-lg font-light">Welkom op het Maintenance-platform. Hier kun je onderhoudsafspraken bekijken en beheren met de juiste rechten.</p>
                    <p class="text-lg font-light">Als je een hoofdonderhoudsmedewerker of een beheerder bent, heb je toegang tot alle afspraken.</p>
                    <p class="text-lg font-light">Als je een onderhoudsmedewerker bent, heb je toegang tot het maken van werkbonnen.</p>
                </div>

                <div class="text-center">
                    @if(auth()->check() && (auth()->user()->role === 'Headmaintenance' || auth()->user()->role === 'Admin'))
                        <a href="{{ route('maintenance.headmaintenance') }}" class="btn btn-primary">Bekijk alle afspraken</a>
                    @else
                        <p class="mb-2 text-gray-700">Je moet ingelogd zijn als iemand met de rechten om de afspraken te kunnen bekijken.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary">Inloggen</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
