@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-12">
      <h3>Manage Category</h3>
      <a href='/categories/create' class="btn btn-primary">Add Category</a>
      <div class="row-gap-small"></div>
      <div class='alert alert-warning alert-dismissible hidden error-deletion'>
        <button type="button" class="close" data-dismiss="alert">
          <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span></button>
        <p>There are posts that belong to this category. Please remove them first.</p>
      </div>
      <div class='alert alert-warning alert-dismissible hidden success-deletion'>
        <button type="button" class="close" data-dismiss="alert">
          <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span></button>
        <p>Category deleted successfully.</p>
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
            <th>Name</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Manage</th>
          <tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          @if (count($categories))
            @foreach ($categories as $category)
              <?php $i++; ?>
              <tr>
                <td>{{$i}}</td>
                <td>{{ $category->name }}</td>
                <td>{{ date('d/m/Y', strtotime($category->created_at)) }}</td>
                <td>{{ date('d/m/Y', strtotime($category->updated_at)) }}</td>
                <td colspan="2">
                  <a class='link text-primary edit' href="/categories/{{ $category->id }}/edit" title='edit'><i class="fa fa-edit"></i> edit</a>
                  <a class='link text-danger delete' data-category-id="{{ $category->id }}" href='#' title='delete'><i class="fa fa-times-circle"></i> delete</a>
                </td>
             </tr> 
            @endforeach
          @else
            <tr>
              <td colspan="5">No categories found!</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
  <script type="text/javascript">
  $(function () {
    $('body').on('click', '.delete', function (e) {
      var id = $(this).data('category-id');
      var that = this;
      var confirmed = confirm('Are you sure to delete this?');
      if (confirmed) {
        $.ajax({
          method: 'delete',
          url: '/categories/' + id,
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