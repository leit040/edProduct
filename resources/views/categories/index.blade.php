@extends('admin.adminLayout')

@section('title', 'Homepage')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endpush

@section('content')
    <a href="{{route('categories.create')}}" class="btn btn-primary active" aria-current="page">Create Type</a>
    <div class="row">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>

            </tr>
            </thead>
            <tbody>

            @foreach($categories as $type)
                <tr>
                    <th scope="row">{{$type->id}}</th>
                    <td>{{$type->name}}</td>
                    <td>{{$type->description}}</td>
                    <td> <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="{{route('categories.edit',$type->id)}}" method="get"><button type="submit" class="btn btn-warning">Edit</button></form>
                            <form action="{{route('categories.destroy',$type->id)}}" method="POST">@method('DELETE') @csrf <button type="submit" class="btn btn-danger">Delete</button></form>
                        </div></td>
                </tr>
    @endforeach
            </div>

@endsection
