@extends('layouts.admin')
@section('content')
  <h3>Dashboard</h3>
  <!-- User manual -->
  <div class="row">
    <div class="col-xs-12">
      <div class="alert alert-white">
        <h3>Xin chào, <em>{{$user->username}}</em>!</h3>
        <div class="row-gap-small"></div>
        <p class="text-muted">Hướng dẫn nhanh cách sử dụng:</p>
        <div class="row">
          <div class="col-xs-3">
            <h5 class="text-info"><i class="fa fa-th-large"></i>&nbsp;&nbsp;Projects</h5>
            <p>Quản lý các dự án trong trang.</p>
          </div>
          <div class="col-xs-3 col-xs-offset-1">
            <h5 class="text-info"><i class="fa fa-newspaper-o"></i>&nbsp;&nbsp;Posts</h5>
            <p>Quản lý các bài viết trong trang.</p>
          </div>
          <div class="col-xs-3 col-xs-offset-1">
            <h5 class="text-info"><i class="fa fa-users"></i>&nbsp;&nbsp;Users</h5>
            <p>Quản lý người dùng trong trang.</p>
          </div>
        </div>
        <div class="row-gap-small"></div>
        <div class="row">
          <div class="col-xs-12">
            <a href="/posts/create" class="btn btn-primary btn-lg">Thêm Bài Viết</a>
          </div>
        </div>
        <div class="row-gap-small"></div>
      </div>
    </div>
  </div>
  <!-- End of User Manual -->
  <!-- Stat -->
  <div class="row">
    <div class="col-xs-8">
      <!-- Thống kê nhanh -->
      <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-info panel-white">
              <div class="panel-heading">Thống kê nhanh</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-xs-4">
                    <i class="fa fa-users"></i>&nbsp;&nbsp;{{count($users)}} người dùng
                  </div>
                  <div class="col-xs-4">
                    <i class="fa fa-newspaper-o"></i>&nbsp;&nbsp;{{count($posts)}} bài viết
                  </div>
                  <div class="col-xs-4">
                    <i class="fa fa-th-large"></i>&nbsp;&nbsp;{{count($projects)}} dự án
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
      <!-- End of Thống kê nhanh -->
      <!-- Latest Footer -->
      <div class="row">
        <div class="col-xs-12">
          <div class="row">
            <div class="col-xs-6">
              <div class="panel panel-info panel-white">
                <div class="panel-heading">Bài viết mới nhất</div>
                <div class="panel-body">
                  {{str_limit($posts[0]->summary, 100, '...')}}
                </div>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="panel panel-info panel-white">
                <div class="panel-heading">Dự án mới nhất</div>
                <div class="panel-body">
                  <div class="pull-left">
                    <img class="img-thumbnail" src="{{$projects[0]->image}}" width=60 height=60 style="width: 60px; height: 60px">
                  </div>
                  <div class="project-des-right">
                    <p>Tên dự án: <em>{{str_limit($projects[0]->name, 100, '...')}}</em></p>
                    <p>Ngày tạo: <em>{{str_limit($projects[0]->created_at, 100, '...')}}</em></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End of Latest Footer -->
    </div>
    <!-- Left Footer -->
    <div class="col-xs-4">
      <div class="panel panel-primary panel-white">
        <div class="panel-heading">
          Copyright
        </div>
        <div class="panel-body">
          <p class="text-muted">
            <strong>NetCMS</strong> <em>&copy; 2014</em> phiên bản 1.0 viết bởi  Tran Khanh. Trong phiên bản này có sử dụng Laravel framework version 4.2, PHP phiên bản 5.3 và cơ sở dữ liệu MySQL  phiên bản 5.1.<br><br>
             Mọi thắc mắc xin vui lòng liên hệ theo địa chỉ email: <em>trankhanh.tk.kt@gmail.com</em>
             <br>
          </p>
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