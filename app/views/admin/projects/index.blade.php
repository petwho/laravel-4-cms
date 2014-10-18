@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-12">
      <h3>Manage Projects</h3>
      <h3><a href='/projects/create' class="btn btn-primary" role="button">Add Project</a></h3>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Image</th>
            <th>Created at</th>
            <th>Manage</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          @foreach($projects as $project)
            <?php $i++; ?>
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $project->name }}</td>
              <td><img src="{{ $project-> image }}" class="img-thumbnail" style="width: 90px; width: 58px;"></td>
              <td>{{ date('Y/m/d', strtotime($project->created_at)) }}</td>
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