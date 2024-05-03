@extends('layouts.guest')
@section('content')
        <div class="w-10/12 mx-auto border border-1 border-white rounded-lg p-6">
            <div class="text-center">
                <h2 class="text-3xl font-bold mb-8 text-white">Onze Producten</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $product)
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        @isset($product->image_path)
                            <img src="{{ asset('images/' . $product->image_path) }}" class="w-54 rounded-md drop-shadow-lg" alt="{{ $product->name }} afbeelding">
                        @else
                            <img src="{{ asset('images/no_image_.png') }}" class="w-54 rounded-md drop-shadow-lg" alt="Placeholder afbeelding">
                        @endisset
                        <h3 style="color:black" class="text-xl font-bold mb-2 mt-4">{{ $product->name }}</h3>
                        <p style="color:black">{{ $product->description }}</p>
                        <a href="{{ route('quote.show', $product->id) }}" class="mt-4 inline-block border-2 border-yellow-400 hover:bg-yellow-400 duration-200 text-black font-bold py-2 px-6 rounded-full">Offerte</a>
                    </div>
                @endforeach
            </div>
        </div>
@endsection
