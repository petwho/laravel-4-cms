<link rel="stylesheet" type="text/css" href="/css/reset.css" media="all" />
<link rel="stylesheet" type="text/css" href="/css/module.css" media="all" />
<link rel="stylesheet" type="text/css" href="/css/common.css" media="all" />
<link rel="stylesheet" type="text/css" href="/css/slider-index.css" media="all" />
<div id="Content-wrap">
    <div id="Top-content">
        <div class="grid-1000 pt-20">
            <div id="Jslidernews1" class="lof-slidecontent ac-contents" style="width:1000px; height:577px;"> 
                
                <!-- MAIN CONTENT -->
                <div class="main-slider-content" style="width:695px; height:405px;">
                    <ul class="sliders-wrap-inner">
                        @foreach ($menu->galleries as $gallery)
                            @if ($gallery->id == $id)
                                @foreach ($gallery->images as $image)
                                    @if ($subcat)
                                    <!-- Only show images with subcat equal to selected query -->
                                        @if ($image->subcat == $subcat)
                                            <li>
                                                <img width=700 height=405 src="{{$image->thumb_url}}">
                                            </li>
                                        @endif
                                    @else
                                        <li>
                                            <img width=700 height=405 src="{{$image->thumb_url}}">
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </ul>
                    @foreach ($menu->galleries as $gallery)
                        @if ($gallery->id == $id && $gallery->has_subcat)
                            <ul class="sub-menu cf">
                                <li><a href="/home?gallery={{$id}}&subcat=1">Phòng khách</a></li>
                                <li><a href="/home?gallery={{$id}}&subcat=2">Phòng ngủ</a></li>
                                <li><a href="/home?gallery={{$id}}&subcat=3">Phòng trẻ em</a></li>
                                <li><a href="/home?gallery={{$id}}&subcat=4">Phòng vệ sinh</a></li>
                                <li><a href="/home?gallery={{$id}}&subcat=5">Bếp</a></li>
                                <li class="last"><a href="/home?gallery={{$id}}&subcat=6">Góc nhà đẹp</a></li>
                            </ul>
                        @endif
                    @endforeach
                </div>
                <!-- END MAIN CONTENT --> 
                <!-- NAVIGATOR -->
                <div class="navigator-content">
                    <div  class="button-previous alpha">Previous</div>
                    <div class="navigator-wrapper">
                        <ul class="navigator-wrap-inner">
                            @foreach ($menu->galleries as $gallery)
                                @if ($gallery->id == $id)
                                    @foreach ($gallery->images as $image)
                                        @if ($subcat)
                                        <!-- Only show images with subcat equal to selected query -->
                                            @if ($image->subcat == $subcat)
                                                <li>
                                                    <img width=700 height=405 src="{{$image->thumb_url}}">
                                                </li>
                                            @endif
                                        @else
                                            <li>
                                                <img width=700 height=405 src="{{$image->thumb_url}}">
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
<!--                             <li><img src="../images/index/thumb_mv01.jpg" /></li>
                            <li><img src="../images/index/thumb_mv02.jpg" /></li>
                            <li><img src="../images/index/thumb_mv03.jpg" /></li>
                            <li><img src="../images/index/thumb_mv04.jpg" /></li>
                            <li><img src="../images/index/thumb_mv05.jpg" /></li>
                            <li><img src="../images/index/thumb_mv01.jpg" /></li> -->
                        </ul>
                    </div>
                    <div class="button-next alpha">Next</div>
                </div>
            </div>
        </div>
        <!-- / .grid-1000 --> 
    </div>
    <!-- / #Top-content --> 
</div>
<!-- Container --> 
<!-- javascript --> 

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> 
<script type="text/javascript" src="/js/opacity-rollover2.1.js"></script> 
<script type="text/javascript" src="/js/common.js"></script> 
<script type="text/javascript" src="/js/jquery.easing.1.3.js"></script> 
<script language="javascript" type="text/javascript" src="/js/script.js"></script> 
<script type="text/javascript">
 $(document).ready( function(){ 
        // buttons for next and previous item                        
        var buttons02 = { previous:$('#Jslidernews1 .button-previous') ,
                        next:$('#Jslidernews1 .button-next') };         
         $('#Jslidernews1').lofJSidernews( { interval : 4000,
                                            direction       : 'opacitys',   
                                            easing          : 'easeInOutExpo',
                                            duration        : 1200,
                                            auto            : true,
                                            maxItemDisplay  : 5,
                                            navPosition     : 'horizontal', // horizontal
                                            navigatorHeight : 122,
                                            navigatorWidth  : 186,
                                            mainWidth       : 695,
                                            buttons         : buttons02 } );    
            
    });
</script>
