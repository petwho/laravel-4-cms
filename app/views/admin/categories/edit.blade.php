@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-4">
      <h3>Edit Category</h3>
      {{ Form::open(array(
            'url' => '/categories/'.$category->id,
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
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name', $category->name, array(
              'class' => 'form-control',
              'id' => 'name',
              'required' => true,
              'placeholder' => 'Sample name'))}}
      </div>
      <button class='btn btn-primary' type="submit">Update</button>&nbsp;
      <a class='btn btn-warning' href='/categories'>Back</a>
      {{ Form::close() }}
    </div>
  </div>
@stop