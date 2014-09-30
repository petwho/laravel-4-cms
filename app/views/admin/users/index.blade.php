@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-12">
      <h3>Manage Users</h3>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Manage</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
            <tr>
              <td>{{ $user->username }}</td>
              <td>{{ $user->email }}</td>
              <td>
                <a class='link text-primary edit' href="/users/{{ $user->id }}/edit" title='edit'><i class="fa fa-edit"></i> edit</a>
                |
                @if (Auth::user()->email == $user->email)
                  <span class='link text-muted' data-user-id="{{ $user->id }}" href='#' title='delete'><i class="fa fa-times-circle"></i> delete</span>
                @else
                  <a class='link text-danger delete' data-user-id="{{ $user->id }}" href='#' title='delete'><i class="fa fa-times-circle"></i> delete</a>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <a href='/users/create' class="btn btn-primary">Add User</a>
    </div>
  </div>
  <script type="text/javascript">
    $(function () {
      $('body').on('click', '.delete', function (e) {
        var id = $(this).data('user-id');
        var confirmed = confirm('Are you sure to delete this?');
        if (confirmed) {
          $.ajax({
            method: 'delete',
            url: '/users/' + id,
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