@extends('admin.adminLayout')

@section('title', 'Homepage')


@section('content')
    @php
    if(!isset($category))
        $category = null
    @endphp

    <h1>@if(!$category)Create @else Update @endif Type</h1>
    <form method="POST" @if(!$category)  action="{{route('categories.store')}}"    enctype="multipart/form-data"> @else action="{{route('categories.update',$category->id)}}" enctype="multipart/form-data"> @method('PUT') @endif

        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Type name</span>
            <input type="text" class="form-control" placeholder="Product title" aria-label="Type name"
                   aria-describedby="basic-addon1" name="name" value="{{old('name')??$type->name??''}}">
        </div>
            @if($errors->has('name'))
                @foreach($errors->get('name') as $error)
                    <div class="alert alert-danger" role="alert">
                        <p class="warning_inner">{{$error}}</p>
                    </div>
                @endforeach
            @endif
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Type description</span>
            <input type="text" class="form-control" placeholder="Type description" aria-label="Type description"
                   aria-describedby="basic-addon1" name="description" value="{{old('description')??$type->description??''}}">
        </div>
        @if($errors->has('description'))
            @foreach($errors->get('description') as $error)
                <div class="alert alert-danger" role="alert">
                    <p class="warning_inner">{{$error}}</p>
                </div>
            @endforeach
        @endif


        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
