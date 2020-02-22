@extends('admin.layouts.app')
@section('page-name', 'Category-Create')
@section('category', 'active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Create Category</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                            <h3 class="card-title">Add New Category</h3>
                        </div>
                        <form action="{{route('categories.store')}}" role="form" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="text" name="name" class="form-control" id="category_name"
                                           placeholder="Enter Category Name">
                                    @if($errors->has('name'))
                                        <p class="error alert alert-danger">{{$errors->first('name')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Choose Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                            <label class="custom-file-label" for="exampleInputFile">Choose File</label>
                                        </div>
                                    </div>
                                    @if($errors->has('image'))
                                        <p class="error alert alert-danger">{{$errors->first('image')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection