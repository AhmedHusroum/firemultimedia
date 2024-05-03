@extends('layouts.app')
@section('content')
    <div class="container mx-auto w-full">
        <div class="items-center">
            <div class="card w-full bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">{{$quote->companyname}}</h2>
                    <p>{{$quote->street}} {{$quote->number}}</p>
                    <p>{{$quote->postalcode}} {{$quote->city}}</p>
                    <p>{{$quote->phonenumber}}</p>
                    <p>{{$quote->email}}</p>
                    <div class="card-actions justify-end">
                        <a href="{{route('quote.index')}}" class="btn btn-warning">Terug</a>
                        <a href="{{route('invoice.show', $quote->id)}}" class="btn btn-primary">Factuur sturen</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
