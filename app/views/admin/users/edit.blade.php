@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-4">
      <h3>Edit User</h3>
      {{ Form::open(array(
            'url' => '/users/'.$user->id,
            'method' => 'put',
            'role' => 'form')) }}
        @if (count($errors))
          <div class='alert alert-warning alert-dismissible'>
            <button type="button" class="close" data-dismiss="alert">
              <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span></button>
            @foreach($errors->all('<p>:message</p>') as $message)
              {{ $message }}
            @endforeach
          </div>
        @endif
        @if (Session::get('message'))
          <div class='alert alert-success alert-dismissible'>
            <button type="button" class="close" data-dismiss="alert">
              <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span></button>
            {{ Session::get('message') }}
          </div>
        @endif
        <div class='form-group'>
          {{ Form::label('username', 'Username:') }}
          {{ Form::text('username', $user->username, array(
                'class' => 'form-control',
                'id' => 'username',
                'required' => true,
                'placeholder' => 'username'))}}
        </div>
        <div class='form-group'>
          {{ Form::label('email', 'Email:') }}
          {{ Form::text('email', $user->email, array(
                'class' => 'form-control',
                'id' => 'email',
                'required' => true,
                'placeholder' => 'email'))}}
        </div>
        <div class='form-group'>
          {{ Form::label('password', 'Password:') }}
          {{ Form::password('password', array(
                'class' => 'form-control',
                'id' => 'password',
                'required' => true))}}
        </div>
        <button class='btn btn-primary' type="submit">Update</button>&nbsp;
        <a class='btn btn-warning' href='/users'>Back</a>
      {{ Form::close() }}
    </div>
  </div>
@stop