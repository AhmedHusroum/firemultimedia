@extends('layouts.guest')
@section('content')
    <div class="container mx-auto">
        <div class="text-center">
            <h2 class="text-3xl font-bold mb-8">Offerte aanvraag verzonden!</h2>
            <h6 class="text-xl font-bold mb-8">Je wordt over 5 seconden automatisch teruggestuurd!</h6>
            <script>setTimeout(() => {
                window.location = "{{route('products.index')}}"
                }, 5000);</script>
        </div>
    </div>
@endsection
