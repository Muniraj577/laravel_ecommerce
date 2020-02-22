@extends('admin.layouts.app')
@section('page-name', 'Product-Show')
@section('product', 'active')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 mt-2">
                    <h5>Product Detail</h5>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title float-left">Product in Detail</h3>
            </div>
            <div class="card-body">
                <form role="form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input class="form-control" type="text" name="name"
                                           value="{{ $product->name }}">
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Category:</strong>
                                    <input type="text" class="form-control" name="category"
                                           value=" {{ $product->category->name }}">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Description:</strong>
                                    <input class="form-control" type="text" name="description"
                                           value="{{ $product->description}}">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <table class="table-bordered">
                                        <tbody>
                                        <tr>
                                            <td style="text-align: center">
                                                <img src="{{asset('images/product/'.$product->image)}}"
                                                     alt="" width="50px">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="productImage">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th width="70px">ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($product->product_images)
                        @foreach($product->product_images as $product_image)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td><img src="{{asset('/images/products/'.$product_image->image)}}" alt="" width="20">
                                </td>

                                <td>
                                    <a href="{{route('product_images.edit', $product_image->id)}}" class="btn btn-sm" style="color: royalblue;"><i class="fa fa-edit"></i></a>
                                    <form action="{{route('product_images.destroy', $product_image->id)}}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm" style="color:red;"><i
                                                    class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <div class="form-group text-center mt-4">
                    <a class="btn btn-primary btn-xs" href="{{ route('products.index') }}"><i class="fas fa-arrow-left"></i></a>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    <script>
        $("#productImage").DataTable({
            searching: false,
            sLengthMenu: false,
        });
    </script>
@endsection