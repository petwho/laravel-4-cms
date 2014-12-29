@include('static_blocks.header')
<body id="Top">
<div id="Container">
  @include('static_blocks.navbar')
  <div id="Content" class="pb-30" style="min-height: 500px;">
    <div id="Content-wrap">
      <div id="Top-content">
        <div class="grid-850 breadcrums">
          / <a href="/home">Home</a> / <a href="/projects/{{$project->id}}">{{$project->name}}</a>
        </div>
      </div>
    </div>
    <div class="grid-850">
      @if ($project->info)
        <p>{{$project->info}}</p>
      @else
        <p>No info found</p>
      @endif
    </div>
  </div>
  @include('static_blocks.footer')
</div>
<!--Container-->
<style type="text/css">
  a.phong-thuy {
    background: url(../images/common/nav_hover.png) repeat-x;
    color: #fff !important;
  }
  #Top-content {
    height: 50px;
  }
</style>
<link rel="stylesheet" type="text/css" href="/css/phongthuy.css" media="all" />
<link rel="stylesheet" type="text/css" href="/css/colorbox.css" media="all" /> 
<link rel="stylesheet" type="text/css" href="/css/jquery.jscrollpane.css" media="all" />
<!--javascript--> 

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> 
<script type="text/javascript" src="/js/opacity-rollover2.1.js"></script> 
<script type="text/javascript" src="/js/common.js"></script> 
<script type="text/javascript" src="/js/tab.js"></script> 
<script  type="text/javascript"src="/js/jquery.colorbox.js"></script> 
<script type="text/javascript">
      $(document).ready(function(){
        $(".inline").colorbox({inline:true, width:"960px",height:"700px"});
      });
    </script> 
<script type="text/javascript" src="js/jquery.mousewheel.js"></script> 
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script> 
<script type="text/javascript">
      $(function()
      {
        $('.scroll-pane').jScrollPane();
      });
</script>
</body>
</html>
