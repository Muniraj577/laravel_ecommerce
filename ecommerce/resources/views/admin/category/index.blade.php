@extends('admin.layouts.app')
@section('page-name', 'Category')
@section('category', 'active')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Category</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <a href="{{route('categories.create')}}" class="btn btn-success float-right"><i class="fa fa-plus-circle"></i> Add Category</a>
                    </div>
                    <div class="card-body">
                        <table id="category" class="table table-bordered table-striped">
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
                                             style="width: 30px">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $("#category").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    </script>
@endsection