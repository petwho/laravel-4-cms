@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-4">
      <h1>Create User</h1>
      {{ Form::open(array('url' => '/users', 'method' => 'post', 'role' => 'form')) }}
        @if (count($errors))
          <div class='alert alert-warning'>
            @foreach($errors->all('<p>:message</p>') as $message)
              {{ $message }}
            @endforeach
          </div>
        @endif
        @if (Session::get('message'))
          <div class='alert alert-success'>
            {{ Session::get('message') }}
          </div>
        @endif
        <div class='form-group'>
          {{ Form::label('username', 'Username:') }}
          {{ Form::text('username', null, array(
                'class' => 'form-control',
                'id' => 'username',
                'required' => true,
                'placeholder' => 'example'))}}
        </div>
        <div class='form-group'>
          {{ Form::label('email', 'Email:') }}
          {{ Form::text('email', null, array(
                'class' => 'form-control',
                'id' => 'email',
                'required' => true,
                'placeholder' => 'me@example.com'))}}
        </div>
        <div class='form-group'>
          {{ Form::label('password', 'Password:') }}
          <input class='form-control' type="password" name="password" placeholder="Password" required>
        </div>
        <button class='btn btn-primary' type="submit">Create</button>
        <a href='/users/' class='btn btn-warning' type="submit">Back</a>
      {{ Form::close() }}
    </div>
  </div>
@stop
