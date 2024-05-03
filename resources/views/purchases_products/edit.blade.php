@extends('layouts.app')
@section('content')


    <div class="container mx-auto mt-8">
    <div class="max-w-md mx-auto bg-white p-8 border rounded shadow-md">
        <h1 class="text-2xl font-bold mb-6">Product Toevoegen</h1>

        <form method="POST" action="{{ route('products.update', $product)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold text-gray-600">Naam</label>
                <input value="{{ $product->name }}" type="text" id="name" name="name" class="form-input mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-semibold text-gray-600">Beschrijving</label>
                <textarea value="{{ $product->description }}" id="description" name="description" class="form-input mt-1 block w-full" required></textarea>
            </div>

            {{-- <div class="mb-4">
                <label for="image_path" class="block text-sm font-semibold text-gray-600">Afbeelding Upload</label>
                <input type="file" id="image_path" name="image_path" class="form-input mt-1 block w-full" accept="image/*" >
            </div> --}}

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Current Image(s)</label>
                <div>
                    <img style="width: 200px" src="{{ asset('storage/' . $product->image_path) }}" alt="">
                    <input type="checkbox" name="delete_old_image" value="1"> Verwijder oude afbeelding
                </div>
            </div>
            <div class="mb-4">
                <label for="new_images" class="block text-gray-700 text-sm font-bold mb-2">New Image(s)</label>
                <input type="file" id="new_images" name="new_images[]" multiple class="w-full">
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-semibold text-gray-600">Prijs</label>
                <input type="number" value="{{ $product->price }}" id="price" name="price" class="form-input mt-1 block w-full" step="0.01" required>
            </div>

            <div class="mb-4">
                <label for="stock" class="block text-sm font-semibold text-gray-600">Voorraad</label>
                <input type="number" id="stock" value="{{ $product->stock }}" name="stock" class="form-input mt-1 block w-full" required>
            </div>

            {{-- <div class="mb-4">
                <label for="category" class="block text-sm font-semibold text-gray-600">Categorie</label>
                <select id="product_category_id" name="product_category_id" class="form-select mt-1 block w-full">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div> --}}

            <div class="form-group">
                <label for="category">Categorie</label>
                <select name="product_category_id" id="product_category_id" class="form-control">
                  @foreach ($categories as $category)
                    <option @if($category->id === $product->category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
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
