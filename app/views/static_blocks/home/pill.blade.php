<div id="Content-wrap">
  <div id="Top-content">
    <div class="grid-1000">
      <ul id="Tab-box" class="cf">
        <?php $i = 0; ?>
        @foreach ($menu->galleries as $gallery)
            @if ($i == 0)
              <?php $first_gallery_id = $gallery->id; ?>
              <li><a class="{{{($gallery->id == $q_gallery) ? 'select' : ($q_gallery == false) ? 'select' : ''}}}" href="/home?gallery={{$gallery->id}}">Ảnh thực tế sau thi công</a></li>
            @elseif ($i == 1)
              <li><a class="{{{($gallery->id == $q_gallery) ? 'select' : ''}}}" href="/home?gallery={{$gallery->id}}">Biệt thự</a></li>
            @elseif ($i == 2)
              <li><a class="{{{($gallery->id == $q_gallery) ? 'select' : ''}}}" href="/home?gallery={{$gallery->id}}">Căn hộ - Penthonse</a></li>
            @elseif ($i == 3)
              <li><a class="{{{($gallery->id == $q_gallery) ? 'select' : ''}}}" href="/home?gallery={{$gallery->id}}">Nhà phố</a></li>
            @elseif ($i == 4)
              <li><a class="{{{($gallery->id == $q_gallery) ? 'select' : ''}}}" href="/home?gallery={{$gallery->id}}">Khách sạn - Resort</a></li>
            @elseif ($i == 5)
              <li><a  class="last {{{($gallery->id == $q_gallery) ? 'select' : ''}}}" href="/home?gallery={{$gallery->id}}">Spa - Beauty Salon</a></li>
            @endif
            <?php $i++; ?>
        @endforeach
      </ul>
      <ul class="social cf">
        <li><a href="#"><img src="images/common/icon_social01.png" alt="" class="over4"/></a></li>
        <li><a href="#"><img src="images/common/icon_social02.png" alt="" class="over4"/></a></li>
        <!-- <li><a href="#"><img src="images/common/icon_social03.png" alt="" class="over4"/></a></li> -->
      </ul>
      <div class="gallery-box">
        @include('home_gallery', array('id' => $q_gallery ? $q_gallery : $first_gallery_id, 'menu' => $menu, 'subcat' => $q_subcat))
        <!-- <iframe scrolling="no" src="{{{ ($q_gallery) ? '/home/gallery/'.$q_gallery : '/home/gallery/'.$first_gallery_id }}}" width="1000" height="596" frameborder="0" name="gallery"></iframe> -->
      </div>
      <!-- / .gallery-box --> 
      
    </div>
    <!-- / .grid-1000 --> 
  </div>
  <!-- / #Top-content --> 
</div>
<!-- / #Container-wrap -->