@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-12">
      <h3>New Projects</h3>
      {{ Form::open(array('url' => '/projects', 'method' => 'post', 'role' => 'form')) }}
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
          {{ Form::label('name', 'Name:') }}
          {{ Form::text('name', null, array(
                'class' => 'form-control',
                'id' => 'name',
                'required' => true,
                'placeholder' => 'Enter name'))}}
        </div>

        <div class='form-group'>
          {{ Form::label('image', 'Image URL:') }}
          {{ Form::text('image', null, array(
                'class' => 'form-control',
                'id' => 'image',
                'required' => true,
                'placeholder' => 'Enter image url'))}}
        </div>
        <button class='btn btn-primary' type="submit">Create</button>
        <a href='/projects/' class='btn btn-warning' type="submit">Back</a>
      {{ Form::close() }}
    </div>
  </div>
@stop