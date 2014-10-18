@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-xs-12">
      <h3 class="text-muted">
        Hướng dẫn sử dụng: <br>
      </h3>
      <div class="jumbotron">
      <h3>Xin chào {{$user->username}}!</h3>
      <p>Để quản lý site vui lòng nhấp vào các menu phía tay trái.
        Để đăng xuất vui lòng nhấp vào biểu tượng logout phía góc trên bên tay phải.
      </p>
      <p>Mục projects dùng để quản lý các dự án trong trang chủ. Bạn có thể thêm, chỉnh sửa và xóa các dự án.</p>
      <p>Mục post dùng để chỉnh sửa các bài viết xuất hiện trong phần kiến thức xây dựng. Tương tự bạn có thể thêm, sửa, xóa bài viết trong mục này.</p>
      <p>Để quản lý người dùng click icon biểu tượng người dùng (user) phía góc trên tay phải.</p>
      </div>
    </div>
  </div>
@stop