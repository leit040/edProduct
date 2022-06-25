@extends('admin.adminLayout')

@section('title', 'Homepage')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endpush

@section('content')
    <a href="{{route('createProduct')}}" class="btn btn-primary active" aria-current="page">Create Product</a>
    <div class="row">
            @foreach($products as $product)

            <div class="col">
        <div class="card position-relative" style="width: 18rem;">
            <img src="{{$product->image->url()}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$product->title}}</h5>
                <p class="card-text">{{$product->description}}</p>
                <p class="card-text">Category: {{$product->category->name}}</p>
                <p class="card-text">Type: {{$product->type->name}}</p>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form action="{{route('editProduct',$product->id)}}" method="get"><button type="submit" class="btn btn-warning">Edit</button></form>
                    <form action="{{route('deleteProduct',$product->id)}}" method="POST">@method('DELETE') @csrf <button type="submit" class="btn btn-danger">Delete</button></form>
                </div>
            </div>
        </div>
            </div>
    @endforeach
            </div>
    <div style=>
        {!! $products->links("pagination::bootstrap-5") !!}
    </div>
@endsection
