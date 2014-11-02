@include('static_blocks.header')
<body id="Top">
<div id="Container">
  @include('static_blocks.navbar')
  <!-- / #Header -->
  
  <div id="Content" class="pb-30">
    <div id="Content-wrap">
      <div id="Top-content">
        <div class="grid-1000 breadcrums" style="width: 850px; margin-top: 15px;">
          / <a href="/kien-thuc/" class="post-title">kiến thức xây dựng</a> / <a href="#" class="post-title">{{$post->title}}</a>
        </div>
      </div>
    </div>
    <div class="grid-850">
      <!-- @include('static_blocks.kien_thuc.menu') -->
      <div class="ac-contents info-01">
        <div class="article schedule">
          <ul class="cf">
              <li class="cf">
                <div class="cf">
                  <h1 class="title-post"><a href="/kien-thuc/{{$post->id}}">{{$post->title}}</a></h1>
                  <p class="date-post">[{{date('Y-m-d', strtotime($post->updated_at))}}]</p>
                  <p class="detail-post">
                    @if ($post->content)
                      {{$post->content}}
                    @else
                      No content found!
                    @endif
                  </p>
                </div>
                <!-- .right --> 
              </li>
          </ul>
        </div>
        <!-- / .schedule--> 
      </div>
    </div>
  </div>
  @include('static_blocks.footer')
</div>

<style type="text/css">
  a.kien-thuc {
    background: url(../images/common/nav_hover.png) repeat-x;
    color: #fff !important;
  }
  #Top-content {
    height: 50px;
    margin-bottom: 10px;
  }
  .post-title {
    color: #fff;
  }
  .schedule li {
    border-bottom: none !important;
  }
  .title-post {
    margin-bottom: 20px;
  }
</style>
<link rel="stylesheet" type="text/css" href="/css/kienthuc.css" media="all" />
<link rel="stylesheet" type="text/css" href="/css/slider.css" media="all" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> 
<script type="text/javascript" src="/js/opacity-rollover2.1.js"></script> 
<script type="text/javascript" src="/js/common.js"></script> 
<script type="text/javascript" src="/js/tab.js"></script> 
<script type="text/javascript" src="/js/jquery.easing.1.3.js"></script> 
<script language="javascript" type="text/javascript" src="/js/script.js"></script>
</body>
</html>