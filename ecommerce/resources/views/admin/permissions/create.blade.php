@extends('admin.layouts.app')
@section('page-name', 'Create-Permission')
@section('permissions', 'active')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">
                                Add New Permission
                            </h3>
                        </div>
                        {{ Form::open(array('url' => 'permissions')) }}
                        <div class="card-body">

                            <div class="form-group">
                                {{ Form::label('name', 'Name') }}
                                {{ Form::text('name', '', array('class' => 'form-control')) }}
                            </div>
                            <br>
                            @if(!$roles->isEmpty())
                                <h4>Assign Permission to Roles</h4>

                                @foreach ($roles as $role)
                                    {{ Form::checkbox('roles[]',  $role->id ) }}
                                    {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                                @endforeach
                            @endif
                            <br>
                            {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>






@endsection