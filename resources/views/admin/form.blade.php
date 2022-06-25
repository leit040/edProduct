@extends('admin.adminLayout')

@section('title', 'Homepage')


@section('content')
    <h1>Create Product</h1>
    <form action="{{route('createProduct')}}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Product title</span>
            <input type="text" class="form-control" placeholder="Product title" aria-label="Product title"
                   aria-describedby="basic-addon1" name="title">
        </div>
            @if($errors->has('title'))
                @foreach($errors->get('title') as $error)
                    <div class="alert alert-danger" role="alert">
                        <p class="warning_inner">{{$error}}</p>
                    </div>
                @endforeach
            @endif

        <div class="input-group mb-3">
            <span class="input-group-text">Product description</span>
            <textarea class="form-control" aria-label="With textarea" name="description"></textarea>
        </div>
        @if($errors->has('description'))
            @foreach($errors->get('description') as $error)
                <div class="alert alert-danger" role="alert">
                    <p class="warning_inner">{{$error}}</p>
                </div>
            @endforeach
        @endif
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Price ($)</span>
            <input type="text" class="form-control" placeholder="Product price" aria-label="Product price"
                   aria-describedby="basic-addon1" name="price">
        </div>
        @if($errors->has('price'))
            @foreach($errors->get('price') as $error)
                <div class="alert alert-danger" role="alert">
                    <p class="warning_inner">{{$error}}</p>
                </div>
            @endforeach
        @endif
        <div class="input-group mb-3">
            <span class="input-group-text">Product category</span>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="category_id">
                <option selected>Product category</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
            @if($errors->has('category_id'))
                @foreach($errors->get('category_id') as $error)
                    <div class="alert alert-danger" role="alert">
                        <p class="warning_inner">{{$error}}</p>
                    </div>
                @endforeach
            @endif

        <div class="input-group mb-3">
        <span class="input-group-text">Product type</span>
        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="type_id">
            <option selected>Product type</option>
            @foreach($types as $type)
            <option value="{{$type->id}}">{{$type->name}}</option>
            @endforeach
        </select>
        </div>
            @if($errors->has('type_id'))
                @foreach($errors->get('type_id') as $error)
                    <div class="alert alert-danger" role="alert">
                        <p class="warning_inner">{{$error}}</p>
                    </div>
                @endforeach
            @endif

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Product image</span>
            <input type="file" class="form-control" placeholder="Product image" aria-label="Product image"
                   aria-describedby="basic-addon1" name="image_id">
        </div>
        @if($errors->has('image_id'))
            @foreach($errors->get('image_id') as $error)
                <div class="alert alert-danger" role="alert">
                    <p class="warning_inner">{{$error}}</p>
                </div>
            @endforeach
        @endif
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Product file</span>
            <input type="file" class="form-control" placeholder="Product file" aria-label="Product file"
                   aria-describedby="basic-addon1" name="file_id">
        </div>
        @if($errors->has('file_id'))
            @foreach($errors->get('file_id') as $error)
                <div class="alert alert-danger" role="alert">
                    <p class="warning_inner">{{$error}}</p>
                </div>
            @endforeach
        @endif
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
