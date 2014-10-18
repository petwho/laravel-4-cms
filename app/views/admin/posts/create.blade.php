@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-12">
      <h3>Create Post</h3>
      {{ Form::open(array(
            'url' => '/posts/',
            'method' => 'post',
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
        <div class="row">
          <div class="col-xs-6">
            <div class='form-group'>
              {{ Form::label('title', 'Title:') }}
              {{ Form::text('title', '', array(
                    'class' => 'form-control',
                    'id' => 'title',
                    'required' => true,
                    'placeholder' => 'Sample title'))}}
            </div>
            <div class='form-group'>
              {{ Form::label('summary', 'Summary:') }}
              {{ Form::textarea('summary', '', array(
                    'class' => 'form-control',
                    'id' => 'summary',
                    'required' => true,
                    'placeholder' => 'Sample summary'))}}
            </div>
          </div>
          <div class="col-xs-6">
            <div class='form-group'>
              {{ Form::label('content', 'Content:') }}
              {{ Form::textarea('content', '', array(
                    'class' => 'form-control',
                    'id' => 'content',
                    'rows' => 22,
                    'required' => true,
                    'placeholder' => 'Sample content'))}}
            </div>
          </div>
        </div>
        <button class='btn btn-primary' type="submit">Update</button>&nbsp;
        <a class='btn btn-warning' href='/posts'>Back</a>
      {{ Form::close() }}
    </div>
  </div>
@stop