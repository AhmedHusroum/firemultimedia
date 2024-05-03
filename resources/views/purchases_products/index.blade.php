@extends('layouts.app')
@section('content')

<body class="bg-gray-100 p-4">
<div class="overflow-x-auto w-auto px-64">
    <table id="table" class="table">
        <thead>
        <tr>
            <th class="border py-2 px-4">ID</th>
            <th class="border py-2 px-4">Naam</th>
            <th class="border py-2 px-4">Omschrijving</th>
            <th class="border py-2 px-4">Afbeelding</th>
            <th class="border py-2 px-4">Prijs</th>
            <th class="border py-2 px-4">Voorraad</th>
            <th class="border py-2 px-4">Categorie</th>
            <th class="border py-2 px-4">Bewerken</th>
            <th class="border py-2 px-4">Verwijderen</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td><img style="width: 100px" src="{{asset('storage/' . $product->image_path)}}" alt=""></td>
                <td>{{$product->price}}</td>
                <td style="color: {{$product->stock < 10 ? 'red' : 'inherit'}}; border: {{$product->stock < 10 ? '1px solid red' : 'inherit'}};">{{$product->stock}}</td>
                <td>{{$product->category->name}}</td>
                <td><a href="{{ route('purchases_products.edit', $product) }}" class="btn btn-primary">Bewerken</a></td>
                <td>
                    @if (!$product->isUsedInLeaseContract())
                    <form method="post" class="btn btn-danger" action="{{ route('products.destroy', $product)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="delete">
                    </form>
                @else
                    <span class="btn btn-danger disabled">product in gebruik</span>
                @endif
                </td>
            </tr>
        @endforeach
        </tbody>
        <a href="{{route('purchases_products.create')}}" class="btn btn-success mb-2 text-white">Nieuw</a>
    </table>
        <script>
            let table = new DataTable('#table');
        </script>
</div>
@endsection
