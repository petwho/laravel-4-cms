@include('static_blocks.header')
<body id="Top">
<div id="Container">
	@include('static_blocks.navbar')
	
	<div id="Content" class="pb-30">
		@include('static_blocks.phong_thuy.form_result')

		<div class="grid-850">
			@include('static_blocks.phong_thuy.menu')
			@foreach ($categories as $category)
				<div class="{{{($category->id > 8) ? 'hidden' : ''}}} ac-contents info-01">
					<div class="article schedule">
						<ul class="cf">
							<?php $posts = $category->posts; ?>
							@foreach ($posts as $post)
								<li class="cf">
									<div class="left fl-left"> <img src="{{$post->image}}" alt="" /> </div>
									<!-- / .left -->
									<div class="right fl-right cf">
										<p class="title-post"><a href="/phong-thuy/{{$post->id}}">{{$post->title}}</a></p>
										<p class="date-post">[{{date('Y-m-d', strtotime($post->updated_at))}}]</p>
										<p class="detail-post">{{$post->summary}}</p>
										<a href="/phong-thuy/{{$post->id}}" class="btn-continue">Xem chi tiết</a> </div>
									<!-- .right --> 
								</li>
							@endforeach
						</ul>
					</div>
					<!-- / .schedule--> 
				</div>
			@endforeach
			<!-- / .ac-contents -->
		</div>
		<!-- / .grid-960 --> 
		
	</div>
	<!--Content-->
	@include('static_blocks.footer')
</div>
<!--Container-->
<style type="text/css">
	a.phong-thuy {
		background: url(../images/common/nav_hover.png) repeat-x;
		color: #fff !important;
	}
</style>
<link rel="stylesheet" type="text/css" href="css/phongthuy.css" media="all" />
<link rel="stylesheet" type="text/css" href="css/colorbox.css" media="all" /> 
<link rel="stylesheet" type="text/css" href="css/jquery.jscrollpane.css" media="all" />
<!--javascript--> 

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> 
<script type="text/javascript" src="js/opacity-rollover2.1.js"></script> 
<script type="text/javascript" src="js/common.js"></script> 
<script type="text/javascript" src="js/tab.js"></script> 
<script  type="text/javascript"src="js/jquery.colorbox.js"></script> 
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
