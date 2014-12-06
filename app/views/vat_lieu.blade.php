@include('static_blocks.header')
<body id="Top">
<div id="Container">
  @include('static_blocks.navbar')
  <!-- / #Header -->
  @include('static_blocks.vat_lieu.images')
  @include('static_blocks.footer')
</div>
<style type="text/css">
  a.vat-lieu {
    background: url(../images/common/nav_hover.png) repeat-x;
    color: #fff !important;
  }
</style>
<!-- Additional css and js blocks -->
<link rel="stylesheet" type="text/css" href="css/vatlieu.css" media="all" />
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
$('#Shop-box').css("background-image", "url(images/vatlieu/bg_01.jpg)"); 
}); 
$('#Link-02').hover(function() 
{ 
$('#Shop-box').css("background-image", "url(images/vatlieu/bg_02.jpg)"); 
}); 
$('#Link-03').hover(function() 
{ 
$('#Shop-box').css("background-image", "url(images/vatlieu/bg_03.jpg)"); 
}); 
$('#Link-04').hover(function() 
{ 
$('#Shop-box').css("background-image", "url(images/vatlieu/bg_04.jpg)"); 
}); 
$('#Link-05').hover(function() 
{ 
$('#Shop-box').css("background-image", "url(images/vatlieu/bg_05.jpg)"); 
}); 
</script>
</body>
</html>
