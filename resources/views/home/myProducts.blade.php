@extends('layout')

@section('title', 'Homepage')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endpush

@section('content')

    <div class="row">
        @foreach($products as $product)

            <div class="col">
                <div class="card position-relative" style="width: 18rem;">
                    <img src="{{$product->image->url()}}" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->title}}</h5>
                        <p class="card-text">{{$product->description}}</p>
                        <p class="card-text">Category: {{$product->category->name}}</p>
                        <p class="card-text">Type: {{$product->type->name}}</p>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{$product->file->url()}}" class="btn btn-primary active" aria-current="page">Download
                                Product</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
