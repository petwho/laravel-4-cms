@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-4 col-xs-offset-4">
      <h1>Create Menu</h1>
      {{ Form::open(array('url' => '/menus', 'method' => 'post', 'role' => 'form')) }}
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
          {{ Form::label('title', 'Title:') }}
          {{ Form::text('title', null, array(
                'class' => 'form-control',
                'id' => 'title',
                'required' => true,
                'placeholder' => 'Sample Menu'))}}
        </div>
        <div class='form-group'>
          {{ Form::label('alias', 'Alias:') }}
          {{ Form::text('alias', null, array(
                'class' => 'form-control',
                'id' => 'alias',
                'required' => true,
                'placeholder' => 'sample-alias'))}}
        </div>
        <button class='btn btn-primary' type="submit">Create</button>
      {{ Form::close() }}
    </div>
  </div>
@stop
