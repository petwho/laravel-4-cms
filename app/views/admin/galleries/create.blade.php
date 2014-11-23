@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-4">
      <h1>Create Gallery</h1>
      {{ Form::open(array('url' => '/galleries', 'method' => 'post', 'role' => 'form')) }}
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
          {{ Form::text('title', null, array(
                'class' => 'form-control',
                'id' => 'title',
                'required' => true,
                'placeholder' => 'Enter title'))}}
        </div>

        <div class="form-group">
          {{ Form::label('project_id', 'Project:') }}
          {{ Form::select('project_id', $options, null, array(
          'class' => 'form-control',
          'id' => 'type',
          'required' => true,
          'placeholder' => ''))}}
        </div>

        <button class='btn btn-primary' type="submit">Create</button>&nbsp;
        <a class='btn btn-warning' href='/galleries'>Back</a>
      {{Form::close()}}
    </div>
  </div>
@stop