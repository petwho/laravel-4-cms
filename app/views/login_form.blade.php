@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-4 col-xs-offset-4">
      <h1>Login</h1>
      <form action="{{ url('login') }}" method="post" role="form">
        <div class='form-group'>
          <label for="username">Username:</label>
          <input class='form-control' type="text" name="username" placeholder="Username">
        </div>
        <div class='form-group'>
          <label for="password">Password:</label>
          <input class='form-control' type="password" name="password" placeholder="Password" />
        </div>
        <button class='btn btn-primary' type="submit">Login</button>
        <div class="checkbox">
          <label>
            <input type="checkbox">Remember me
          </label>
        </div>
      </form>
    </div>
  </div>
@stop