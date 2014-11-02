@extends('layouts.admin')
@section('content')
  <div class="row upload-section">
    <div class="col-xs-12">
      <div class="row-gap-small"></div>
      <h3>Manage Assets</h3>
      {{ Form::open(array('url' => '/uploads/', 'method' => 'post', 'enctype' => 'multipart/form-data', 'role' => 'form', 'class' => 'hidden', 'id' => 'form-upload')) }}
        <input class="hidden file" type="file" name="uploadFile">
        <input class="hidden" type="text" value="" name="dirname">
        <input class="submit-btn hidden" type="submit" value="Upload"></input>
      {{ Form::close() }}
      <button id="upload" class="btn btn-primary">Upload</button>
      <div>
        @if (count($errors))
          <div class='alert alert-warning alert-dismissible'>
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            @foreach($errors->all('<p>:message</p>') as $message)
              {{ $message }}
            @endforeach
          </div>
        @endif
        @if (Session::get('message'))
          <div class='alert alert-success alert-dismissible'>
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            {{ Session::get('message') }}
          </div>
        @endif
      </div>
      <!-- Begin project images -->
      <div class="project-image image-list">
        <h5 class='text-info'><i class="fa fa-folder-open"></i>&nbsp;Project Images</h5>
        <ul>
          @for($i = $k = 0; $i < count($images = glob('../public/images/projects/*')); $i++)
            <li>
              <img class="img-thumbnail" src="/images/projects/{{ basename($images[$i]) }}" data-img-name="{{ basename($images[$i]) }}" data-dir="projects" data-src="/images/projects/{{ basename($images[$i]) }}" width=100 height=81 style="width: 100px; height: 81px">
              <div class='manage-asset'>
                {{ Form::open(array('url' => '/uploads/'.basename($images[$i]), 'method' => 'put', 'enctype' => 'multipart/form-data', 'role' => 'form', 'class' => 'pull-left', 'data-img-name'=> basename($images[$i]))) }}
                  <input type="button" class="btn btn-xs btn-primary btn-change" value="change">
                  <input class="hidden file" type="file" name="uploadFile">
                  <input class="hidden" type="text" value="projects" name="dirname">
                  <input class="submit-btn hidden" type="submit" value="Upload"></input>
                {{ Form::close() }}
                <button class="btn btn-xs btn-danger btn-delete">delete</button>
                <button class="btn btn-xs btn-primary btn-save hidden">save</button>
                <button class="btn btn-xs btn-warning btn-cancel hidden">cancel</button>
              </div>
            </li>
          @endfor
        </ul>
      </div>
      <div class="clearfix"></div>
      <!-- End of project images -->
      <!-- Begin post images -->
      <div class="post-image image-list">
        <h5 class='text-info'><i class="fa fa-folder-open"></i>&nbsp;Post Images</h5>
        @for($i = $k = 0; $i < count($images = glob('../public/images/posts/*')); $i++)
          <td>
            <ul>
              <li>
                <img class="img-thumbnail" src="/images/posts/{{ basename($images[$i]) }}" data-img-name="{{ basename($images[$i]) }}" data-dir="posts" data-src="/images/posts/{{ basename($images[$i]) }}" width=100 height=81 style="width: 100px; height: 81px">
                <div class='manage-asset'>
                  {{ Form::open(array('url' => '/uploads/'.basename($images[$i]), 'method' => 'put', 'enctype' => 'multipart/form-data', 'role' => 'form', 'class' => 'pull-left', 'data-img-name'=> basename($images[$i]))) }}
                    <input type="button" class="btn btn-xs btn-primary btn-change" value="change">
                    <input class="hidden file" type="file" name="uploadFile">
                    <input class="hidden" type="text" value="posts" name="dirname">
                    <input class="submit-btn hidden" type="submit" value="Upload"></input>
                  {{ Form::close() }}
                  <button class="btn btn-xs btn-danger btn-delete">delete</button>
                  <button class="btn btn-xs btn-primary btn-save hidden">save</button>
                  <button class="btn btn-xs btn-warning btn-cancel hidden">cancel</button>
                </div>
              </li>
            </ul>
          </td>
        @endfor
      </div>
      <!-- End of post images -->
      <div class="clearfix"></div>
      <!-- Begin general images -->
      <div class="post-image image-list">
        <h5 class='text-info'><i class="fa fa-folder-open"></i>&nbsp;General Images</h5>
        @for($i = 0; $i < count($images = glob('../public/general/posts/*')); $i++)
          <td>
            <ul>
              <li>
                <img class="img-thumbnail" src="/images/general/{{ basename($images[$i]) }}" data-img-name="{{ basename($images[$i]) }}" data-dir="general" data-src="/images/general/{{ basename($images[$i]) }}" width=100 height=81 style="width: 100px; height: 81px">
                <div class='manage-asset'>
                  {{ Form::open(array('url' => '/uploads/'.basename($images[$i]), 'method' => 'put', 'enctype' => 'multipart/form-data', 'role' => 'form', 'class' => 'pull-left', 'data-img-name'=> basename($images[$i]))) }}
                    <input type="button" class="btn btn-xs btn-primary btn-change" value="change">
                    <input class="hidden file" type="file" name="uploadFile">
                    <input class="hidden" type="text" value="general" name="dirname">
                    <input class="submit-btn hidden" type="submit" value="Upload"></input>
                  {{ Form::close() }}
                  <button class="btn btn-xs btn-danger btn-delete">delete</button>
                  <button class="btn btn-xs btn-primary btn-save hidden">save</button>
                  <button class="btn btn-xs btn-warning btn-cancel hidden">cancel</button>
                </div>
              </li>
            </ul>
          </td>
        @endfor
        @if ($i == 0)
          <div class="no-image-notice">There are no images</div>
        @endif
      </div>
      <!-- End of general images -->
    </div>
  </div>
  <script type="text/javascript">
    $(function () {
      $('.btn-change').click(function (e) {
        $(this).parent().parent().find('.file').trigger('click');
      });
      $('.file').change(function (e) {
        var target = e.target || window.event.srcElement, files = target.files;
        var that = this;
        // if browser supports FileReader
        if (FileReader && files && files.length) {
          var fr = new FileReader();
          fr.onload = function () {
            $img = $(that).parent().parent().parent().find('img');
            // update src
            $img.attr('src', fr.result);
            // show (hide) related buttons
            $(that).parent().parent().find('.btn.btn-change').addClass('hidden');
            $(that).parent().parent().find('.btn.btn-delete').addClass('hidden');
            $(that).parent().parent().find('.btn.btn-save').removeClass('hidden');
            $(that).parent().parent().find('.btn.btn-cancel').removeClass('hidden');
          }
          fr.readAsDataURL(files[0]);
        } else {
          alert('Your browser does not support image upload API, please upgrade it.')
        }
      });
      // on cancel changes
      $('.btn-cancel').click(function (e) {
        $img = $(this).parent().parent().find('img');
        $(this).parent().find('.btn-save').addClass('hidden');
        $(this).parent().find('.btn-cancel').addClass('hidden');
        $(this).parent().find('.btn-change').removeClass('hidden');
        $(this).parent().find('.btn-delete').removeClass('hidden');
        $img.attr('src', $img.data('src'));
        $(this).parent().parent().parent().find('.file').val('');
      });
      // on save changes
      $('.btn-save').click(function (e) {
        $form = $(this).parent().parent().find('form');
        $form.trigger('submit');
      });

      $('#upload').click(function (e) {
        $('#form-upload input[name="file"]').trigger('click')
      })
    });
  </script>
@stop
