@extends('admin.layouts.app')
@section('page-name', 'Edit-Permission')
@section('permissions', 'active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Permissions</h1>
                </div>

            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Edit Permission {{$permission->name}}
                            </h3>
                        </div>
                        {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}
                        <div class="card-body">
                            <div class="form-group">
                                {{ Form::label('name', 'Permission Name') }}
                                {{ Form::text('name', null, array('class' => 'form-control')) }}
                            </div>
                            <br>
                            {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
