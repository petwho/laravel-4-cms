@include('static_blocks.header')
<body id="Top">
<div id="Container">
  @include('static_blocks.navbar')
  <!-- / #Header -->
  @include('static_blocks.shop_noi_that.images')
  @include('static_blocks.footer')
</div>
<style type="text/css">
  a.shop-noi-that {
    background: url(../images/common/nav_hover.png) repeat-x;
    color: #fff !important;
  }
</style>
<link rel="stylesheet" type="text/css" href="css/shopnoithat.css" media="all" />
<link rel="stylesheet" type="text/css" href="css/colorbox.css" media="all" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> 
<script type="text/javascript" src="js/opacity-rollover2.1.js"></script>  
<script type="text/javascript" src="js/common.js"></script> 
<script  type="text/javascript"src="js/jquery.colorbox.js"></script> 
<script type="text/javascript">
			$(document).ready(function(){
				$(".iframe").colorbox({iframe:true, width:"950px", height:"700px"});
        // $('.iframe').click(function (e) {
        //   e.preventDefault();
        // })
			});
	</script> 
<script> 
$('#Link-01').hover(function() 
{ 
$('#Shop-box').css("background-image", "url(images/shopnoithat/bg_01.jpg)"); 
}); 
$('#Link-02').hover(function() 
{ 
$('#Shop-box').css("background-image", "url(images/shopnoithat/bg_02.jpg)"); 
}); 
$('#Link-03').hover(function() 
{ 
$('#Shop-box').css("background-image", "url(images/shopnoithat/bg_03.jpg)"); 
}); 
</script> 
</body>
</html>