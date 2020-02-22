@extends('admin.layouts.app')
@section('page-name', 'Permissions')
@section('permissions', 'active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Permissions</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                {{--<h3 class="card-title float-right">--}}
                    {{--@can('permission-create')--}}
                        {{--<a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>--}}
                    {{--@endcan--}}
                {{--</h3>--}}
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered table-striped projects">

                    <thead>
                    <tr>
                        <th>Permissions</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}"
                                   class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                                {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </section>








@endsection