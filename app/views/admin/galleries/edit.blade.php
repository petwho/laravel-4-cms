@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-4">
      <h3>Edit Gallery</h3>
      {{ Form::open(array(
            'url' => '/galleries/'.$gallery->id,
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
        {{ Form::label('title', 'Title:') }}
        {{ Form::text('title', $gallery->title, array(
              'class' => 'form-control',
              'id' => 'title',
              'required' => true,
              'value' => $gallery->title))}}
      </div>

      <div class="form-group">
        {{ Form::label('project_id', 'Project:') }}
        {{ Form::select('project_id', $options, $gallery->project_id, array(
        'class' => 'form-control',
        'id' => 'type',
        'required' => true,
        'placeholder' => ''))}}
      </div>

      <button class='btn btn-primary' type="submit">Update</button>&nbsp;
      <a class='btn btn-warning' href='/galleries'>Back</a>
      {{ Form::close() }}
    </div>
  </div>
@stop