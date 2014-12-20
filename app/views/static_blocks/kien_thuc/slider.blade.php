<!-- Slider gallery -->
<div id="Content-wrap">
  <div id="Top-content">
    <div class="grid-1000">
      <div id="Jslidernews1" class="lof-slidecontent" style="width:1000px; height:595px;"> 
        <!-- MAIN CONTENT -->
        <div class="main-slider-content" style="width:1000px; height:466px;">
          <ul class="sliders-wrap-inner">
            @foreach ($menu->galleries as $gallery)
              @foreach ($gallery->images as $image)
                <li><img width="1000" height="466" src="{{$image->url}}" title="" alt="" /></li>
              @endforeach
            @endforeach
          </ul>
        </div>

        <!-- END MAIN CONTENT --> 
        <!-- NAVIGATOR -->
        <div class="navigator-content">
          <div  class="button-previous alpha">Previous</div>
          <div class="navigator-wrapper">
            <ul class="navigator-wrap-inner">
              @foreach ($menu->galleries as $gallery)
                @foreach ($gallery->images as $image)
                  <li><img src="{{$image->thumb_url}}" alt="" /></li>
                @endforeach
              @endforeach
            </ul>
          </div>
          <div class="button-next alpha">Next</div>
        </div>
      </div>
    </div>
    <!-- / .grid-1000 --> 
  </div>
  <!-- / #Top-content --> 
</div><!-- End slide -->