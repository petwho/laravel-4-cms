@include('static_blocks.header')
<body id="Top">
<div id="Container">
	@include('static_blocks.navbar')
	
	<div id="Content" class="pb-30">
		@include('static_blocks.home.pill', array('menu' => $menu, 'q_gallery' => isset($q_gallery) ? $q_gallery : false))
		
		<div class="grid-850">
			@include('static_blocks.home.architect')
			<!-- / .section -->
			@include('static_blocks.home.design_process')
			<!-- / .section -->
			<div class="section project mt-30">
				<h2 class="h2-title">DỰ ÁN MỚI NHẤT</h2>
				<ul class="cf list-project">
					@for ($i = 0; $i < count($projects); $i++)
						@if ($i < 8)
							<div class="page-div page-{{ floor($i / 8) + 1 }}">
								@if ($i % 4 == 3)
									<li class="last"><img src="{{ $projects[$i]->image }}" alt=""/>
								@else
									<li><img src="{{ $projects[$i]->image }}" alt=""/>
								@endif
									<p class="project-name">{{ $projects[$i]->name }}</p>
									<p class="detail">Thông tin chi tiết dự án.</p>
									<a href="#" class="link-project">Trọn bộ nội thất dự án. </a>
								</li>
							</div>
						@else
							<div class="page-div page-{{ floor($i / 8) + 1 }} hidden">
								@if ($i % 4 == 3)
									<li class="last"><img src="{{ $projects[$i]->image }}" alt=""/>
								@else
									<li><img src="{{ $projects[$i]->image }}" alt=""/>
								@endif
									<p class="project-name">{{ $projects[$i]->name }}</p>
									<p class="detail">Thông tin chi tiết dự án.</p>
									<a href="#" class="link-project">Trọn bộ nội thất dự án. </a>
								</li>
							</div>
						@endif
					@endfor
				</ul>
				<ul class="navigation cf">
					<li class="invisible"><a href="#"><img src="images/common/prev_nav.png" alt="" class="alpha"/></a></li>
					<li><a href="#"><img src="images/common/first_nav.png" alt="" class="alpha nav-btn nav-first"/></a></li>
					@for ($i = 0; $i < count($projects); $i++)
						@if ($i < 3)
							<div>
								@if ($i % 3 == 2)
									<li data-page="{{ $i + 1 }}" class="no proj-page last"><a href="#">{{ $i + 1 }}</a></li>
								@elseif ($i % 3 == 0)
									<li data-page="{{ $i + 1 }}" class="no proj-page first active"><a href="#">{{ $i + 1 }}</a></li>

								@else
									<li data-page="{{ $i + 1 }}" class="no proj-page"><a href="#">{{ $i + 1 }}</a></li>
								@endif
							</div>
						@else
							<div class='hidden'>
								@if ($i % 3 == 2)
									<li data-page="{{ $i + 1 }}" class="no proj-page"><a href="#">{{ $i + 1 }}</a></li>
								@else
									<li data-page="{{ $i + 1 }}" class="no proj-page"><a href="#">{{ $i + 1 }}</a></li>
								@endif
							</div>
						@endif
					@endfor
					<li><a href="#"><img src="images/common/last_nav.png"alt="" class="alpha nav-btn nav-last"/></a></li>
					<li class="invisible"><a href="#"><img src="images/common/next_nav.png" alt="" class="alpha"/></a></li>
				</ul>
			</div>
			<!-- / .section -->
			<div class="section note-box mt-30">
				<p class="note-title">Ghi chú</p>
				<p class="detail">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
			<!-- / .note-box --> 
		</div>
		<!-- / .grid-960 --> 
		
	</div>
	<!--Content-->
	@include('static_blocks.footer')
	<!-- / #Pagetop --> 
</div>
<style type="text/css">
	a.home {
		background: url(../images/common/nav_hover.png) repeat-x;
		color: #fff !important;
	}
	.navigation li.proj-page.active a{
		font-weight: 700;
	}
</style>
<!--Container--> 
<!--javascript-->
<link rel="stylesheet" type="text/css" href="css/index.css" media="all" />
<link rel="stylesheet" type="text/css" href="css/slider-index.css" media="all" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> 
<script type="text/javascript" src="js/opacity-rollover2.1.js"></script> 
<script type="text/javascript" src="js/common.js"></script> 
<script type="text/javascript" src="js/tab.js"></script> 
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script> 
<script language="javascript" type="text/javascript" src="js/script.js"></script>
<script type="text/javascript">
 $(document).ready( function(){
 		$('.navigation .nav-btn').click(function (e) {
 			e.preventDefault();
 			if ($(this).hasClass('nav-last')) {
 				$('.navigation li.last').trigger('click');
 			}
 			if ($(this).hasClass('nav-first')) {
 				$('.navigation li.first').trigger('click');
 			}
 		});

 		$('.proj-page').click(function (e) {
 			$('.proj-page').removeClass('active');
 			var pageNum = $(this).addClass('active').data('page');
 			$('.page-div').addClass('hidden');
 			$('.page-div.page-' + pageNum).removeClass('hidden');
 			e.preventDefault();
 		});
		// buttons for next and previous item						 
		var buttons02 = { previous:$('#Jslidernews1 .button-previous') ,
						next:$('#Jslidernews1 .button-next') };			
		 $('#Jslidernews1').lofJSidernews( { interval : 4000,
											direction		: 'opacitys',	
											easing			: 'easeInOutExpo',
											duration		: 1200,
											auto		 	: true,
											maxItemDisplay  : 5,
											navPosition     : 'horizontal', // horizontal
											navigatorHeight : 122,
											navigatorWidth  : 186,
											mainWidth		: 695,
											buttons			: buttons02 } );

			
	});
</script>
</body>
</html>
