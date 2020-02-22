@extends('admin.layouts.app')
@section('page-name', 'Dashboard')
@section('dashboard', 'active')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <section class="content">
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif


                    <div class="card-body">
                        <table id="products" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Code</th>
                                <th>Category Name</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{++$id}}</td>
                                    <td>{{$product->code}}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->qty}}</td>
                                    <td>{{$product->description}}</td>
                                    <td style="width: 100%">
                                        <img src="{{asset('images/product/'.$product->image)}}" alt="Product Image"
                                             style="width: 10%">
                                    </td>
                                    <td>
                                        <form action="{{route('products.destroy', $product->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm" style="color:red;"><i
                                                        class="fas fa-trash"></i></button>
                                        </form>
                                        <div>
                                            <a href="{{route('products.edit', $product->id)}}" class="btn btn-sm"
                                               style="color: royalblue;"><i class="fa fa-edit"></i></a>
                                        </div>
                                        <div>
                                            <a href="{{route('products.show', $product->id)}}" class="btn btn-sm"
                                               style="color: royalblue;"><i class="fa fa-eye"></i></a>
                                        </div>
                                        <div>
                                            <a href="{{route('addImages', $product->id)}}" class="btn btn-sm"
                                               data-title="Add Images" style="color: royalblue;"><i
                                                        class="fa fa-plus-circle"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{route('products.index')}}">
                            <i class="fa fa-history mt-3"> View More...</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="categories" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{++$id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td style="width: 100%">
                                        <img src="{{asset('images/category/'.$category->image)}}" alt="Category Image"
                                             style="width: 10%">
                                    </td>
                                    <td>
                                        <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm" style="color:red;"><i class="fas fa-trash"></i></button>
                                        </form>
                                        <div>
                                            <a href="{{route('categories.edit', $category->id)}}" class="btn btn-sm" style="color: royalblue;"><i class="fa fa-edit"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{route('categories.index')}}">
                            <i class="fa fa-history mt-3"> View More...</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $("#products").DataTable();
        $("#categories").DataTable();
    </script>
@endsection
