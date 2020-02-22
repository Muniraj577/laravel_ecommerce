@extends('admin.layouts.app')
@section('page-name', 'Product-Image-Edit')
@section('product', 'active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Image</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="background-color: #003e80">
                            <h3 class="card-title">
                                Image
                            </h3>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('product_images.update', $productImage->id)}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{--<input type="hidden" value="{{$product_image->product_id}}" name="product_id">--}}
                                {{--<input type="hidden" value="{{$product_image->category_id}}" name="category_id">--}}
                                <div class="form-group">
                                    <label for="image">Choose Image</label>
                                    <input type="file" class="form-control-file" name="image">
                                    @if ($errors->has('image'))
                                        <p class="error alert-danger">{{ $errors->first('image') }}</p>
                                    @endif
                                </div>
                                <div class="form-group text-center">
                                    {{--<a class="btn btn-primary btn-xs" href="{{ route('products.home') }}"> Back</a>--}}
                                    <button type="submit" class="btn btn-primary btn-xs">Save Image</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection