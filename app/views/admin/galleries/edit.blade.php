@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-12">
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
        <div class="row">
          <div class="col-xs-6">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', $gallery->title, array(
                  'class' => 'form-control',
                  'id' => 'title',
                  'required' => true,
                  'value' => $gallery->title))}}

          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-xs-6">
            {{ Form::label('project_id', 'Project:') }}
            {{ Form::select('project_id', $options, $gallery->project_id, array(
            'class' => 'form-control',
            'id' => 'type',
            // 'required' => true,
            'placeholder' => ''))}}
          </div>
        </div>
      </div>
      <div class="row-gap-medium"></div>

      <div class="row">
        @for ($i = 0; $i < count($images); $i++)
          <div class="col-xs-2">
              <label>Image URL:</label>

              {{ Form::hidden('image['.$images[$i]->id.'][id]', $images[$i]->id, array(
                            'class' => 'form-control',
                            'required' => true,
                            'value' => $images[$i]->id))}}

              {{ Form::text('image['.$images[$i]->id.'][url]', $images[$i]->url, array(
                            'class' => 'form-control',
                            'required' => true,
                            'value' => $images[$i]->url))}}
                            <br>
              <label>Image thumb:</label>
              {{ Form::text('image['.$images[$i]->id.'][thumb_url]', $images[$i]->thumb_url, array(
                            'class' => 'form-control',
                            'required' => true,
                            'value' => $images[$i]->thumb_url))}}
                            <br>
              <label>Image name:</label>
              {{ Form::text('image['.$images[$i]->id.'][name]', $images[$i]->name, array(
                            'class' => 'form-control',
                            'required' => true,
                            'value' => $images[$i]->name)) }}
                            <br>
              <label>Image title:</label>
              {{ Form::text('image['.$images[$i]->id.'][title]', $images[$i]->title, array(
                            'class' => 'form-control',
                            'required' => true,
                            'value' => $images[$i]->title)) }}
              <br>
              <img class="img-responsive" src="{{$images[$i]->url}}">
              <br>
              <a href="#" class="btn btn-danger delete" data-image-id="{{$images[$i]->id}}">delete</a>
          </div>
        @endfor
      </div>

      <div class="row-gap-medium"></div>
      <label>Include this gallery into the following page(s):</label>
      <div class="row">
        <div class="col-xs-2">
          <div class='checkbox'>
            <?php $is_checked = false; ?>
            <label>
              @foreach ($gallery_menus as $gallery_menu)
                @if (($gallery->id == $gallery_menu->gallery_id) && ($gallery_menu->menu_id == 1))
                  <input name="menu-1" type="checkbox" checked> trang chủ
                  <?php $is_checked = true; ?>
                @endif
              @endforeach
              @if (!$is_checked)
                <input name="menu-1" type="checkbox"> trang chủ
              @endif
            </label>
          </div>
        </div>

        <div class="col-xs-2">
          <div class='checkbox'>
            <?php $is_checked = false; ?>
            <label>
              @foreach ($gallery_menus as $gallery_menu)
                @if (($gallery->id == $gallery_menu->gallery_id) && ($gallery_menu->menu_id == 2))
                  <input name="menu-2" type="checkbox" checked> kiến thức xây dựng
                  <?php $is_checked = true; ?>
                @endif
              @endforeach
              @if (!$is_checked)
                <input name="menu-2" type="checkbox"> kiến thức xây dựng
              @endif
            </label>
          </div>
        </div>

        <div class="col-xs-2">
            <div class='checkbox'>
              <?php $is_checked = false; ?>
              <label>
                @foreach ($gallery_menus as $gallery_menu)
                  @if (($gallery->id == $gallery_menu->gallery_id) && ($gallery_menu->menu_id == 3))
                    <input name="menu-3" type="checkbox" checked> vật liệu hoàn thiện
                    <?php $is_checked = true; ?>
                  @endif
                @endforeach
                @if (!$is_checked)
                  <input name="menu-3" type="checkbox"> vật liệu hoàn thiện
                @endif
              </label>
            </div>
        </div>

        <div class="col-xs-2">
            <div class='checkbox'>
              <?php $is_checked = false; ?>
              <label>
                @foreach ($gallery_menus as $gallery_menu)
                  @if (($gallery->id == $gallery_menu->gallery_id) && ($gallery_menu->menu_id == 4))
                    <input name="menu-4" type="checkbox" checked> shop nội thất
                    <?php $is_checked = true; ?>
                  @endif
                @endforeach
                @if (!$is_checked)
                  <input name="menu-4" type="checkbox"> shop nội thất
                @endif
              </label>
            </div>
        </div>

        <div class="col-xs-2">
            <div class='checkbox'>
              <?php $is_checked = false; ?>
              <label>
                @foreach ($gallery_menus as $gallery_menu)
                  @if (($gallery->id == $gallery_menu->gallery_id) && ($gallery_menu->menu_id == 6))
                    <input name="menu-6" type="checkbox" checked> giới thiệu
                    <?php $is_checked = true; ?>
                  @endif
                @endforeach
                @if (!$is_checked)
                  <input name="menu-6" type="checkbox"> giới thiệu
                @endif
              </label>
            </div>
        </div>
      </div>

      <div class="row-gap-small"></div>

      <label>Include this gallery into the following panel(s):</label>
      <div class="row">
        <div class="col-xs-2">
          <div class='checkbox'>
            <label>
              @foreach ($gallery_panels as $gallery_panel)
                @if (($gallery->id == $gallery_panel->gallery_id) && ($gallery_panel->panel_id == 1))
                  <input name="menu-1" type="checkbox" checked> trang chủ
                  <?php $is_checked = true; ?>
                @endif
              @endforeach
              @if (!$is_checked)
                <input name="menu-1" type="checkbox"> trang chủ
              @endif
            </label>
          </div>
        </div>

      <!-- Add more images to gallery -->
      <div class='form-group'>
        <div class="row">
          <div class="col-xs-3">
            <a href="#" class="btn btn-primary add-image">Add more image to gallery</a>
          </div>
          <div class="col-xs-6 hidden add-image-form">
            <label>Image URL:</label>
            {{ Form::hidden('new_image', false, array('id' => 'new_image_watcher'))}}
            {{ Form::text('image[0][url]', null, array(
                  'class' => 'form-control',
                  'id' => 'image[0][url]',
                  'placeholder' => 'Enter image url'))}}

            <label>Image thumb:</label>
            {{ Form::text('image[0][thumb_url]', null, array(
                  'class' => 'form-control',
                  'id' => 'image[0][thumb_url]',
                  'placeholder' => 'Enter image thumb_url'))}}

            <label>Image name:</label>
            {{ Form::text('image[0][name]', null, array(
                  'class' => 'form-control',
                  'id' => 'image[0][name]',
                  'placeholder' => 'Enter image name'))}}

            <label>Image title:</label>
            {{ Form::text('image[0][title]', null, array(
                  'class' => 'form-control',
                  'id' => 'image[0][title]',
                  'placeholder' => 'Enter image title'))}}
          </div>
        </div>
      </div>
      <!-- End of adding images to gallery form -->
      <div class="row-gap-small"></div>

      <button class='btn btn-primary' type="submit">Update</button>&nbsp;
      <a class='btn btn-warning' href='/galleries'>Back</a>
      {{ Form::close() }}
      <div class="row-gap-medium"></div>
    </div>
  </div>
  <script type="text/javascript">
    $(function () {

      $('.add-image').click(function (e) {
        e.preventDefault();
        if ($('#new_image_watcher').val() == false) {
          $('.add-image-form').removeClass('hidden');
          $('#new_image_watcher').val(true);
          $(this).text('Cancel');
          $(this).removeClass('btn-primary').addClass('btn-warning').text('Cancel');
        } else {
          $('.add-image-form').addClass('hidden');
          $('#new_image_watcher').val('');
          $(this).addClass('btn-primary').removeClass('btn-warning').text('Add more image to gallery');
        }
      });


      $('body').on('click', 'a.delete', function (e) {
        var id = $(this).data('image-id');
        var confirmed = confirm('Are you sure to delete this?');
        if (confirmed) {
          $.ajax({
            method: 'delete',
            url: '/photos/' + id,
            success: function () {
              location.reload();
            }
          });
          e.preventDefault();
        }
      });
    })
  </script>
@stop