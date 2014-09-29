<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator Site</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700&subset=latin,vietnamese' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container-fluid">
        <!-- <div class="navbar-header">
        </div> -->
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li>
              <a href="/dashboard"><i class='fa fa-tachometer'></i>&nbsp;Dashboard</a>
            </li>
            <li>
              <a href="/" target="_blank"><i class="fa fa-home"></i>&nbsp;Home</a>
            </li>
            <li><a href="/users/new"><i class="fa fa-users"></i>&nbsp;Users</a></li>
          </ul>
          @if (Auth::check())
            <p class='navbar-text navbar-right'><a href="/logout"><i class="fa fa-sign-out"></i>&nbsp;Logout</a></p>
          @endif
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div>
    <div class="container-fluid">
      <div class="row">
        @if (Auth::check())
          <div class="col-xs-2">
          </div>
          <div class="col-xs-10">
            @yield('content')
          </div>
        @else
          <div class="col-xs-12">
            @yield('content')
          </div>
        @endif
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>