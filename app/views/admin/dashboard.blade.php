@extends('layouts.admin')
@section('content')
  <h3>Dashboard</h3>
  <div class="row-gap-medium"></div>
  <div class="row">
    <div class="col-xs-12">
      <div class="alert alert-white">
        <h3>Xin chào, <em>{{$user->username}}</em>!</h3>
        <div class="row">
          <div class="col-xs-3">
            <p class="text-muted">Mục projects dùng để quản lý các dự án trong trang chủ. Bạn có thể thêm, chỉnh sửa và xóa các dự án.</p>
          </div>
          <div class="col-xs-3 col-xs-offset-1">
            <p class="text-muted">Mục post dùng để chỉnh sửa các bài viết xuất hiện trong phần kiến thức xây dựng.</p>
          </div>
          <div class="col-xs-3 col-xs-offset-1">
            <p class="text-muted">Để quản lý người dùng click icon biểu tượng người dùng (user) phía góc trên tay phải.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <style type="text/css">
    body {
      background-color: #eee;
    }
  </style>
@stop