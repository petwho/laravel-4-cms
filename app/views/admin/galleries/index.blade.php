@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-12">
      <h3>Manage Galleries</h3>
      <h3><a href='/galleries/create' class="btn btn-primary" role="button">Add Gallery</a></h3>
      <table class="table table-striped table-bordered" style="margin-top: 5px;">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Pages</th>
            <th>Tabs</th>
            <th>Project</th>
            <!-- <th>Created At</th>
            <th>Updated At</th> -->
            <th>Manage</th>
          <tr>
        </thead>
        <tbody>
          @if (count($galleries))
            <?php $i = 0; ?>
            @foreach ($galleries as $gallery)
              <?php $i++; ?>
              <tr>
                <td>{{ $i }}</td>
                <td>{{ $gallery->title }}</td>
                <td>
                  <?php $temp = ''; ?>
                  @foreach ($gallery->menus as $menu)
                    <?php $temp .= $menu->title.', '; ?>
                  @endforeach
                  <?php $temp = substr($temp, 0, strlen($temp) - 2); ?>
                  {{ $temp }}
                </td>

                <td>
                  <?php $temp = ''; ?>
                  @foreach ($gallery->tabs as $tab)
                    <?php $temp .= $tab->title.', '; ?>
                  @endforeach
                  <?php $temp = substr($temp, 0, strlen($temp) - 2); ?>
                  {{ $temp }}
                </td>

                @if ($gallery->project_id)
                  <td>{{ $project_list[$gallery->project_id] }}</td>
                @else
                  <td class='text-danger'>No project</td>
                @endif
                <!-- <td>{{ date('d/m/Y', strtotime($gallery->created_at)) }}</td>
                <td>{{ date('d/m/Y', strtotime($gallery->updated_at)) }}</td> -->
                <td colspan="2">
                  <a class='link text-primary edit' href="/galleries/{{ $gallery->id }}/edit" title='edit'><i class="fa fa-edit"></i> edit</a>
                  |
                  <a class='link text-danger delete' data-gallery-id="{{ $gallery->id }}" href='#' title='delete'><i class="fa fa-times-circle"></i> delete</a>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="5">No galleries found!</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
  <script type="text/javascript">
  $(function () {

    $('body').on('click', '.delete', function (e) {
      var id = $(this).data('gallery-id');
      var confirmed = confirm('Are you sure to delete this?');
      if (confirmed) {
        $.ajax({
          method: 'delete',
          url: '/galleries/' + id,
          success: function () {
            location.reload();
          }
        });
        e.preventDefault();
      }
    });

  });
  </script>
@stop