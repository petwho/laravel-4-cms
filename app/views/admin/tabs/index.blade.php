@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-12">
      <h3>Manage Tabs</h3>
      <a href='/tabs/create' class="btn btn-primary">Add Tabs</a>
      <div class="row-gap-small"></div>
      <div class='alert alert-warning alert-dismissible hidden success-deletion'>
        <button type="button" class="close" data-dismiss="alert">
          <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span></button>
        <p>Tabs deleted successfully.</p>
      </div>
      @if (Session::get('message'))
        <div class='alert alert-dismissible alert-success'>
          <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span></button>
          {{ Session::get('message') }}
        </div>
      @endif
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Panel</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Manage</th>
          <tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          @if (count($tabs))
            @foreach ($tabs as $tab)
              <?php $i++; ?>
              <tr>
                <td>{{$i}}</td>
                <td>{{ $tab->title }}</td>
                <td>{{ $tab->panel->title }}</td>
                <td>{{ date('d/m/Y', strtotime($tab->created_at)) }}</td>
                <td>{{ date('d/m/Y', strtotime($tab->updated_at)) }}</td>
                <td colspan="2">
                  <a class='link text-primary edit' href="/tabs/{{ $tab->id }}/edit" title='edit'><i class="fa fa-edit"></i> edit</a>
                  <a class='link text-danger delete' data-tab-id="{{ $tab->id }}" href='#' title='delete'><i class="fa fa-times-circle"></i> delete</a>
                </td>
             </tr> 
            @endforeach
          @else
            <tr>
              <td colspan="5">No tabs found!</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
  <script type="text/javascript">
  $(function () {
    $('body').on('click', '.delete', function (e) {
      var id = $(this).data('tab-id');
      var that = this;
      var confirmed = confirm('Are you sure to delete this?');
      if (confirmed) {
        $.ajax({
          method: 'delete',
          url: '/tabs/' + id,
          success: function () {
            $('.success-deletion').removeClass('hidden');
            $(that).parent().parent().remove();
          },
          error: function () {
            $('.error-deletion').removeClass('hidden');
          }
        });
        e.preventDefault();
      }
    });
  });
  </script>
@stop