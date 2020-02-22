@extends('admin.layouts.app')
@section('page-name', 'Product-Edit')
@section('product', 'active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Edit Product</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content" style="margin-left: 50px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Product</h3>
                        </div>
                        <form action="{{route('products.update', $product->id)}}" role="form" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category">Select Category</label>
                                    <select name="category_id" id="category" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->name == $product->category->name ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" value="{{$product->name}}" class="form-control" id="product_name"
                                           placeholder="Enter Product Name">
                                    @if($errors->has('name'))
                                        <p class="error alert alert-danger">{{$errors->first('name')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" value="{{$product->price}}" class="form-control" id="price"
                                           placeholder="Enter Product Price">
                                    @if($errors->has('price'))
                                        <p class="error alert alert-danger">{{$errors->first('price')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="name">Quantity</label>
                                    <input type="text" name="qty" value="{{$product->qty}}" class="form-control" id="qty"
                                           placeholder="Enter Product qty">
                                    @if($errors->has('qty'))
                                        <p class="error alert alert-danger">{{$errors->first('qty')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" style="width: 100%">{{$product->description}}</textarea>
                                    @if($errors->has('description'))
                                        <p class="error alert alert-danger">{{$errors->first('description')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Choose Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="product_image"
                                                   name="image">
                                            <label class="custom-file-label" for="image">Choose File</label>
                                        </div>
                                    </div>
                                    <img src="{{asset('images/product/'.$product->image)}}" alt="Product Image" style="width: 100px;">
                                    @if($errors->has('image'))
                                        <p class="error alert alert-danger">{{$errors->first('image')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection