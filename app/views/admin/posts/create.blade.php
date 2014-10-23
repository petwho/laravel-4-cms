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
                    'rows' => 5,
                    'required' => true,
                    'placeholder' => 'Sample summary'))}}
            </div>
            <div class='form-group'>
              {{ Form::label('image', 'Image:') }}
              <br>
              <input class='hidden' name='image' value="/images/index/img_pj01.jpg">
              <img class='main-image img-thumbnail' src="/images/index/img_pj01.jpg" style="width: 190px; height: 118px">
              <a href='#' class='btn btn-default btn-xs change-image' data-toggle="modal" data-target="#myModal">Change</a>&nbsp;
            </div>
            <div class="form-group">
              {{ Form::label('category_id', 'Category:') }}
              {{ Form::select('category_id', $options, null, array(
              'class' => 'form-control',
              'id' => 'type',
              'required' => true,
              'placeholder' => ''))}}
            </div>
          </div>
          <div class="col-xs-6">
            <div class='form-group'>
              {{ Form::label('content', 'Content:') }}
              {{ Form::textarea('content', '', array(
                    'class' => 'form-control',
                    'id' => 'content',
                    'rows' => 20,
                    'required' => true,
                    'placeholder' => 'Sample content'))}}
            </div>
          </div>
        </div>
        <button class='btn btn-primary' type="submit">Update</button>&nbsp;
        <a class='btn btn-warning' href='/posts'>Back</a>
      {{ Form::close() }}
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
                  <img class="img-thumbnail" src="/images/projects/{{ basename($images[$i]) }}" width=100 height=81 style="width: 100px; height: 81px">
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
  </div>
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