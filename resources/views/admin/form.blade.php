@extends('admin.adminLayout')

@section('title', 'Homepage')


@section('content')
    @php
    if(!isset($product))
        $product = null
    @endphp

    <h1>@if(!$product)Create @else Update @endif Product</h1>
    <form method="POST" @if(!$product)  action="{{route('storeProduct')}}"    enctype="multipart/form-data"> @else action="{{route('updateProduct',$product->id)}}" enctype="multipart/form-data"> @method('PUT') @endif

        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Product title</span>
            <input type="text" class="form-control" placeholder="Product title" aria-label="Product title"
                   aria-describedby="basic-addon1" name="title" value="{{old('title')??$product->title??''}}">
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
            <textarea class="form-control" aria-label="With textarea" name="description">{{old('description')??$product->description??''}}</textarea>
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
                   aria-describedby="basic-addon1" name="price" value="{{old('price')??$product->price??''}}">
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

                @if((old('category_id')))
                    {{$select_id=old('category_id')}}
                @else {{$select_id=$product->category_id??''}}
                @endif


                @foreach($categories as $categoryforID)
                    <option class="form-add__category__inner" @if ($categoryforID->id==old('category_id')) selected
                            @endif value="{{$categoryforID->id}}">{{$categoryforID->name}}</option>

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



                @if((old('type_id')))
                    {{$select_id=old('type_id')}}
                @else {{$select_id=$product->type_id??''}}
                @endif


                @foreach($types as $typeforID)
                    <option class="form-add__category__inner" @if ($typeforID->id==old('type_id')) selected
                            @endif value="{{$typeforID->id}}">{{$typeforID->name}}</option>

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
