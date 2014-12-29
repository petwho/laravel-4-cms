@include('static_blocks.header_intro')
  
  <div id="Intro">
    <div class="grid-1010">
      <div id="Intro-content">
        <div id="Slogan" style="display: none;">Cảm ơn khách hàng đã đồng hành cùng Xuyên Á trong suốt 12 năm vừa qua</div>
        <div id="bx-pager"> <a data-slide-index="0" href="" class="click achor-01"><img src="images/intro/achor.png" class="over4" /></a> <a data-slide-index="1" href="" class="click achor-02"><img src="images/intro/achor.png" class="over4" /></a> <a data-slide-index="2" href="" class="click achor-03"><img src="images/intro/achor.png" class="over4" /></a> <a data-slide-index="3" href="" class="click achor-04"><img src="images/intro/achor.png" class="over4" /></a> <a data-slide-index="4" href="" class="click achor-05"><img src="images/intro/achor.png" class="over4" /></a> <a data-slide-index="7" href="" class="click achor-06"><img src="images/intro/achor.png" class="over4" /></a> <a data-slide-index="12" href="" class="click achor-07"><img src="images/intro/achor.png" class="over4" /></a> <a data-slide-index="13" href="" class="click achor-08"><img src="images/intro/achor.png" class="over4" /></a> </div>
        <div class="list-slider hidden">
          <div class="slider4">

            @foreach ($projects as $project)
              <div class="slide">
                <p class="pr-title"><a href="/iframe/{{$project->id}}" class="iframe">{{$project->name}}</a></p>
                <div class="pr-box cf">
                  <div class="left fl-left"> <a href="/iframe/{{$project->id}}" class="iframe"><img src="{{$project->image}}" alt="" class="over4" width=132 height=146/></a> </div>
                  <!-- / .left -->
                  <div class="right fl-right">
                    {{$project->summary}}
                    <!-- <dl class="pr-info cf">
                      <dt>Diện tích đất</dt>
                      <dd>7,5 x 30 m2</dd>
                      <dt>Diện tích xây dựng </dt>
                      <dd>131.25 m2</dd>
                      <dt>Quy mô</dt>
                      <dd>hầm, Trệt, lững, 6 lầu; 32 phòng, tiêu chuẩn 3 sao</dd>
                      <dt>Mức đầu tư </dt>
                      <dd>10.2 tỷ</dd>
                      <dt>Chủ đầu tư</dt>
                      <dd>Công ty CP Đại An</dd>
                    </dl>
                    <p class="pr-info">Địa chỉ : 9-9A Trường sơn, quận Tân Bình, Hcm</p> -->
                  </div>
                  <!-- / .right --> 
                </div>
                <!-- / .pr-box --> 
              </div>
              <!-- / .slide -->
            @endforeach
            
          </div>
        </div>
      </div>
      <!-- / #Intro-content -->
      <p id="Copyright-intro">Trụ Sở : Số 10 Quốc Lộ 1A, Phường Thạnh Lộc, Quận 12, Tp.HCM<br />
        Chi Nhánh : 146/20/8 Đường Số 8, Phường 11, Quận Gò Vấp, Tp.HCM</p>
    </div>
  </div>
  <!-- / #Intro -->
  <div id="Pagetop">
    <p><a href="#Top" class="over4" style="opacity: 1;"></a></p>
  </div>
  <!-- / #Pagetop --> 
</div>
<!--Container--> 
<!--javascript--> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js" type="text/javascript"></script>
<script src="http://iamdanfox.github.io/typetype/jquery.typetype.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/modernizr.custom.86080.js"></script> 
<script type="text/javascript" src="js/opacity-rollover2.1.js"></script> 
<script type="text/javascript" src="js/common.js"></script> 
<script type="text/javascript" src="js/jquery.bxslider.min.js"></script> 
<script type="text/javascript" src="js/jquery.bxslider.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
  $(".click").click(function(){
    $(".list-slider").removeClass('hidden');
  });
  setTimeout(show,18000);
  $('.slider4').bxSlider({
    auto: true,
    slideWidth: 420,
    minSlides: 2,
    maxSlides: 2,
    moveSlides: 1,
    slideMargin: 10,
   pagerCustom: '#bx-pager'
  });
  // $('#Slogan').typetype(
  //   'Cảm ơn khách hàng đã đồng hành cùng Xuyên Á trong suốt 12 năm vừa qua', {
  //   t: 60,
  //   e: 0
  // })
  $('#Slogan').fadeIn(3000).fadeOut(4000);
});
function show() {
      $(".list-slider").removeClass('hidden');
    }

</script> 
<script type="text/javascript"src="js/jquery.colorbox.js"></script> 
<script type="text/javascript">
      $(document).ready(function(){
        $(".iframe").colorbox({iframe:true, width:"748px", height:"518px"});
      });
    </script>
</body>
</html>
