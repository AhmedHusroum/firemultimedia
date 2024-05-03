@extends('layouts.app')
@section('content')

<div class="container mx-auto mt-8">
    <div class="max-w-md mx-auto bg-white p-8 border rounded shadow-md">
        <h1 class="text-2xl font-bold mb-6">Storingsaanvraag indienen</h1>

        <form method="POST" action="{{ route('customers.malfunction_request_store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-semibold text-gray-600">Title:</label>
                <input type="text" id="title" name="title" class="form-input mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-semibold text-gray-600">Beschrijving</label>
                <textarea id="description" name="description" class="form-input mt-1 block w-full" required></textarea>
            </div>
            
            <div class="mb-4">
                <label for="comments" class="block text-sm font-semibold text-gray-600">Opmerkingen:</label>
                <input type="text" id="comments" name="comments" class="form-input mt-1 block w-full" required>
            </div>
            
            <div class="mb-4">
                <label for="products" class="block text-sm font-semibold text-gray-600">Categorie</label>
                <select id="product_id" name="product_id" class="form-select mt-1 block w-full">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Opslaan</button>
            </div>
        </form>
    </div>
</div>

@endsection