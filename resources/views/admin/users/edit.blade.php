@extends('layouts.admin')

@section('content')

    <h1>Edit User</h1>
    <div class="row">
        <div class="col-sm-4">
            <img width="310" class="img-reponsive img-rounded" src="{{ $user->photo ? $user->photo->file : '/images/no_photo.jpg'}}" alt="">
        </div>

        <div class="col-sm-7">
            {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', ['' => 'Chose Options'] + $roles, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Upload image:') !!}
                {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            <div class="row col-sm-3">
                {!! Form::submit('Edit User', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminUsersController@destroy', $user->id], ]) !!}
            <div class="row col-sm-2">
                {!! Form::submit('Delete User', ['class'=>'btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}
        </div>

    </div>
    <div class="row">
        @include('includes.fom_error')
    </div>

@stop

