@extends('admin.layouts.app')
@section('page-name', 'Product-Create')
@section('product', 'active')
@section('content')
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">--}}
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">--}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 mt-2">
                    <h4>Products</h4>
                </div>

            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header" style="background-color: #003e80">
                            <h2 class="card-title">Add New Product</h2>
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
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                            </div>
                        @endif
                        <form action="{{route('addMultipleImages')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="category_id" value="{{$product->category->id}}">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                </div>
                                <div class="form-group">
                                    <label for="product_name">Product: </label>
                                    <input type="text" name="product_name" value="{{$product->name}}"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="product_code">Product Code: </label>
                                    <input type="text" name="product_code" value="{{$product->code}}"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="image">Upload Image:</label>
                                    <div class="input-group control-group increment">
                                        <input type="file" name="image[]" class="form-control" multiple>
                                        <div class="input-group-btn">
                                            <button class="btn btn-success" type="button"><i
                                                        class="glyphicon glyphicon-plus"></i>Add
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clone hide">
                                        <div class="control-group input-group" style="margin-top:10px">
                                            <input type="file" id="image_0" name="image[]"
                                                   class="form-control">
                                            <div class="input-group-btn">
                                                <button class="btn btn-danger" type="button"><i
                                                            class="glyphicon glyphicon-remove"></i> Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group text-center">
                                    <a class="btn btn-primary btn-xs" href="#"> Back</a>
                                    <button type="submit" class="btn btn-primary btn-xs">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $("#category").change(function () {
            var cat_id = $(this).val();
            if (cat_id) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('get-products') }}?category_id=" + cat_id,
                    success: function (data) {
                        console.log(data);
                        if (data) {
                            $("#product").empty();
                            $("#product").append('<option>Select Product</option>');
                            $.each(data, function (key, value) {
                                $("#product").append('<option value="' + key + '">' + value + '</option>');
                            });
                        } else {
                            $("#product").empty();
                        }
                    }
                });
            } else {
                $("#product").empty();
                $("#product").empty();
            }
        });
        $(document).ready(function () {
            // count = 0;
            $(".btn-success").click(function () {
                // count++;
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click", ".btn-danger", function () {
                $(this).parents(".control-group").remove();
            });

        });

                @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }

        @endif

    </script>

@endsection