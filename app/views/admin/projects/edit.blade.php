@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-12">
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
          <br>
          <input class='hidden' name='image' value="{{ $project->image }}">
          <img class='main-image' src="{{ $project->image }}">
          <a href='#' class='btn btn-primary btn-sm change-image' data-toggle="modal" data-target="#myModal">Change</a>&nbsp;
        </div>
        <button class='btn btn-primary' type="submit">Update</button>&nbsp;
        <a class='btn btn-warning' href='/projects'>Back</a>
      {{ Form::close() }}
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Image Gallery</h4>
        </div>
        <div class="modal-body">
          <ul>
            @for($i = 0; $i < count($images = glob('../public/images/projects/*')); $i++)
              <li>
                <img src="/images/projects/{{ basename($images[$i]) }}" width=100 height=81>
              </li>
            @endfor
          </ul>
          <p class='clear'></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary save">Save changes</button>
        </div>
      </div>
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
  <script type="text/javascript">
    $(function () {
      $('#myModal li').click(function (e) {
        $(this).parent().find('li').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
      });
      $('#myModal .save').click(function (e) {
        var src = $('#myModal li.active img').attr('src');
        $('img.main-image').attr('src', src);
        $('input[name="image"]').val(src);
        $('#myModal').modal('hide');
      });
    })
  </script>
@stop