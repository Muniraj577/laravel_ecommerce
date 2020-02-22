@extends('admin.layouts.app')
@section('page-name', 'Create-Role')
@section('roles', 'active')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Add New Role</h3>
                    </div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                    <div class="card-body">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>

                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br/>
                            @foreach($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{ $value->name }}</label>
                                <br/>
                            @endforeach
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection