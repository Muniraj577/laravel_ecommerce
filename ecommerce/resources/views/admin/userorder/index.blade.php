@extends('admin.layouts.app')
@section('page-name','Order')
@section('order','active')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Orders</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Order</li>
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
                        <h3 class="card-title float-right">
                            <a href="{{ route('user_orders.create') }}" class="btn btn-success float-right"><i
                                        class="fas fa-plus-circle"></i> Add New </a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped user_order mt-5" id="user_order">
                            <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Product</th>
                                <th>Weight</th>
                                <th>Rate</th>
                                <th>Price</th>
                                <th width="280px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user_orders as $user_order)
                                @foreach ($user_order->order_items as $order_item)
                                    <tr>
                                        <td>{{++$id}}</td>
                                        <td>{{$user_order->order_code}}</td>
                                        <td>{{ $user_order->customer_name }}</td>
                                        <td>{{$order_item->product['name']}}</td>
                                        <td>{{$order_item->weight}}</td>
                                        <td>{{$order_item->rate}}</td>
                                        <td>{{$order_item->price}}</td>
                                        <td>
                                            <form action="{{ route('deleteUserOrderItems', $user_order->id)}}"
                                                  method="post">
                                                <a class="btn" style="color: royalblue;"
                                                   href="{{ route('user_orders.showOrder',$user_order->id) }}"><i
                                                            class="fas fa-info-circle"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn" style="color: red;" type="submit"><i
                                                            class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                            </tbody>
                            @endforeach
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $('#user_order').DataTable();

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