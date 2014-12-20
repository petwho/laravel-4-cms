@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-4">
      <h1>Create Category</h1>
      {{ Form::open(array('url' => '/categories', 'method' => 'post', 'role' => 'form')) }}
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
          {{ Form::label('name', 'Name:') }}
          {{ Form::text('name', null, array(
                'class' => 'form-control',
                'id' => 'name',
                'required' => true,
                'placeholder' => 'Sample name'))}}
        </div>
        <button class='btn btn-primary' type="submit">Create</button>&nbsp;
        <a class='btn btn-warning' href='/categories'>Back</a>
      {{Form::close()}}
    </div>
  </div>
@stop