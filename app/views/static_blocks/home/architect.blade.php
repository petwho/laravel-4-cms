<div id='partners'>
    <h2 class='h2-title'>ĐỐI TÁC CỦA CHÚNG TÔI</h2>
    <?php
        $partners = [
            'http://www.starwoodhotels.com/sheraton/index.html?language=en_US',
            'http://irishotel.com.vn/',
            'http://ptn.vn/',
            'http://www.muongthanh.vn/vi/home',
            'http://www.vinamilk.com.vn/',
            'http://www.reetech.com.vn/',
            'http://mpc.net.vn/',
        ];
    ?>
    @for($i = 0; $i < count($images = glob('../public/images/partners/*')); $i++)
      <div>
        <a href={{$partners[$i]}} real="nofollow" target="_blank"><img class="img-thumbnail" src="/images/partners/{{ basename($images[$i]) }}" width=100 height=81 style="width: 90%; height: 90%"></a>
      </div>
    @endfor
</div>
<div style='clear: both;'></div>
<style type="text/css">
#partners div {
    padding-top: 15px;
    padding-bottom: 20px;
    display: inline-block; width: 19%; text-align: center; height: 100px;margin: 0 0;
}
#partners a img {
    border: 1px solid #ddd;
    background-color: #fff;
    border-radius: 4px;
    padding: 4px;
    /*display: inline-block;*/
}
</style>