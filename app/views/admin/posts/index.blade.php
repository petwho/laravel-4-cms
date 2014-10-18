@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-12">
      <h3>Manage Posts</h3>
      <h3><a href='/posts/create' class="btn btn-primary" role="button">Add Post</a></h3>
      <a href="/posts" class='link'><span class="text-primary">All</span> <span class='text-muted'>({{ count($posts) }})</span></a>
      |
      <a href="/posts" class='link'><span class="text-primary">Publised</span> <span class='text-muted'>({{ count($published_posts) }})</span></a>
      |
      <a href="/posts" class='link'><span class="text-primary">Trashed</span> <span class='text-muted'>({{ count($trashed_posts) }})</span></a>
      <table class="table table-striped table-bordered" style="margin-top: 5px;">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Manage</th>
          <tr>
        </thead>
        <tbody>
          @if (count($posts))
            <?php $i = 0; ?>
            @foreach ($posts as $menu)
              <?php $i++; ?>
              <tr>
                <td>{{ $i }}</td>
                <td>{{ $menu->title }}</td>
                <td>
                  @if ($menu->trashed())
                    <span class="text-danger">Trashed</span>
                  @else
                    <span class="text-primary">Published</span>
                  @endif
                </td>
                <td>{{ $menu->created_at }}</td>
                <td>{{ $menu->updated_at }}</td>
                <td colspan="2">
                  <a class='link text-primary edit' href="/posts/{{ $menu->id }}/edit" title='edit'><i class="fa fa-edit"></i> edit</a>
                  |
                  @if ($menu->trashed())
                    <a class='link text-info restore' data-menu-id="{{ $menu->id }}" href='#' title='restore'><i class="fa fa-recycle"></i> restore</a>
                  @else
                    <a class='link text-warning trash' data-menu-id="{{ $menu->id }}" href="#" title='trash'><i class="fa fa-trash"></i> trash</a>
                  @endif
                  |
                  <a class='link text-danger delete' data-menu-id="{{ $menu->id }}" href='#' title='delete'><i class="fa fa-times-circle"></i> delete</a>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="5">No posts found!</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
  <script type="text/javascript">
  $(function () {
    $('body').on('click', '.trash', function (e) {
      var id = $(this).data('menu-id');
      $.ajax({
        method: 'delete',
        url: '/posts/' + id + '/trash',
        success: function () {
          location.reload();
        }
      });
      e.preventDefault();
    });

    $('body').on('click', '.delete', function (e) {
      var id = $(this).data('menu-id');
      var confirmed = confirm('Are you sure to delete this?');
      if (confirmed) {
        $.ajax({
          method: 'delete',
          url: '/posts/' + id,
          success: function () {
            location.reload();
          }
        });
        e.preventDefault();
      }
    });

    $('body').on('click', '.restore', function (e) {
      var id = $(this).data('menu-id');
      $.ajax({
        method: 'put',
        url: '/posts/' + id +'/restore',
        success: function () {
          location.reload();
        }
      });
      e.preventDefault();
    });
  });
  </script>
@stop