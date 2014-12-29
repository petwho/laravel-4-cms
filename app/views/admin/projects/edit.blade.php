@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-10">
      <h3>Manage Projects</h3>
      {{ Form::open(array(
            'url' => '/projects/'.$project->id,
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
          {{ Form::text('name', $project->name, array(
                'class' => 'form-control',
                'id' => 'name',
                'required' => true,
                'placeholder' => 'name'))}}
        </div>
        <div class='form-group'>
          {{ Form::label('image', 'Image:') }}
          {{ Form::text('image', $project->image, array(
                'class' => 'form-control',
                'id' => 'image',
                'required' => true,
                'value' => $project->image))}}
        </div>

        <div class='form-group'>
          {{ Form::label('summary', 'Project Summary:') }}
          {{ Form::textarea('summary', $project->summary, array(
                'class' => 'form-control',
                'id' => 'summary',
                'required' => true,
            ))
          }}
        </div>

        <div class='form-group'>
          {{ Form::label('info', 'Project Info:') }}
          {{ Form::textarea('info', $project->info, array(
                'class' => 'form-control',
                'id' => 'info',
                'required' => true,
            ))
          }}
        </div>

        <div class='form-group'>
          {{ Form::label('is_featured', 'Show this project in Intro page:') }}
          {{ Form::checkbox('is_featured', null, $project->is_featured ? true : false) }}
        </div>

        <button class='btn btn-primary' type="submit">Update</button>&nbsp;
        <a class='btn btn-warning' href='/projects'>Back</a>
      {{ Form::close() }}
    </div>
  </div>

  <!-- End of Modal -->
  <style type="text/css">
    .change-image {
      vertical-align: bottom;
    }
    #myModal ul li {
      list-style: none;
      float: left;
      padding: 8px 8px;
    }
    #myModal li.active {
      box-shadow: inset 0 0 2px 3px #f1f1f1,inset 0 0 0 7px #5b9dd9;
      -webkit-box-shadow: inset 0 0 2px 3px #f1f1f1,inset 0 0 0 7px #5b9dd9;
      -moz-box-shadow: inset 0 0 2px 3px #f1f1f1,inset 0 0 0 7px #5b9dd9;
    }
    .clear {
      clear: both;
    }
  </style>
  <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
  <script>
    tinymce.init({selector:'textarea#info'});
    tinymce.init({selector:'textarea#summary'});
  </script>
@stop