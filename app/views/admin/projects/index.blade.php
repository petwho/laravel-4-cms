@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-12">
      <h3>Manage Projects</h3>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Manage</th>
          </tr>
        </thead>
        <tbody>
          @foreach($projects as $project)
            <tr>
              <td>{{ $project->name }}</td>
              <td><img src="{{ $project-> image }}"></td>
              <td>
                <a class='link text-primary edit' href="/projects/{{ $project->id }}/edit" title='edit'><i class="fa fa-edit"></i> edit</a>
                |
                <a class='link text-danger delete' data-project-id="{{ $project->id }}" href='#' title='delete'><i class="fa fa-times-circle"></i> delete</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@stop