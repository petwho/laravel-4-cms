@extends('layouts.admin')
@section('content')
  <h3>Manage menu</h3>
  <table class="table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Alias</th>
        <th>Manage</th>
      <tr>
    </thead>
      @foreach ($menus as $menu)
        <tr>
            <td>{{ $menu->title }}</td>
            <td>{{ $menu->alias }}</td>
        </tr>
      @endforeach
    <tbody>
    </tbody>
  </table>
@stop