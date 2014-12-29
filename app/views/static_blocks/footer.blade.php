<div id="Footer">
    <div id="Footer-wrap">
      <div class="grid-890 pt-20">
        <div class="footer-info cf">
          <div class="left fl-left ml-20">
            <p class="company-name">CÔNG TY TNHH TƯ VẤN THIẾT KẾ XÂY DỰNG XUYÊN Á</p>
            <p class="bold">Văn phòng chính</p>
            <p>Số 10 Quốc Lộ 1A, phường Thạnh lộc, quận 12, <br />
              Tp. HCM<br />
              ĐT:     (84.8) 35895732<br />
              Fax:    (84.8) 35895733<br />
              Email: xuyena@xaydungxuyena.com<br />
              Website: www.xaydungxuyena.com</p>
            <p class="bold mt-30">Chi nhánh</p>
            <p> 146/20/8 Đường số 8, phường 11, Quận Gò vấp, <br />
              Tp. HCM<br />
              ĐT: (84.8) 35895732 </p>
          </div>
          <!-- / .left -->
          <form class="right fl-right" action="/contact" method="post">
            <p class="hotline">Hot line: 090 887 70 79</p>
            <p class="comment mt-10">Hãy gửi thắc mắc của bạn để chúng tôi tư vấn trực tiếp qua Email:</p>
            <dl class="cf form">
              <dt>Họ &amp; Tên <span>(*)</span>:</dt>
              <dd>
                <input required type="text" name="fullname" size="30" class="input-txt" value=""/>
              </dd>
              <dt>Địa chỉ Email <span>(*)</span>:</dt>
              <dd>
                <input required type="text" name="email" size="30" class="input-txt" value=""/>
              </dd>
              <dt>Số điện thoại <span>(*)</span>:</dt>
              <dd>
                <input required type="text" name="phone" size="30" class="input-txt" value=""/>
              </dd>
              <dt>Nội dung <span>(*)</span>:</dt>
              <dd>
                <textarea required class="area" name="content" rows="7" cols="50"></textarea>
              </dd>
              <dt>&nbsp;</dt>
              <dd>
                <input type="submit" value="Gửi" id="Submit" class="alpha"  />
                <!-- <input type="reset" value="Xóa" id="Cancel" class="alpha"/> -->
                <!-- <input type="button" value="Chọn file" id="Choose" class="alpha"  /> -->
                <input type="file" class="hidden real-file-input">
              </dd>
            </dl>
          </form>
          <!-- / .right --> 
        </div>
        <div class="footer-icon"> <a href="index.html" id="F-logo"><img src="/images/common/logo_footer.png" alt="" class="over4"/></a>
          <p id="Copyright">&copy; 2014 by <span>XUYEN A CONSTUCTION</span></p>
          <ul class="f-social cf">
            <li><a href="#"><img src="/images/common/icon_social01.png" alt="" class="over4"/></a></li>
            <li><a href="#"><img src="/images/common/icon_social02.png" alt="" class="over4"/></a></li>
          </ul>
        </div>
        <!-- / .footer-icon --> 
        
      </div>
    </div>
    <!-- / #Footer-wrap --> 
  </div>
  <!-- / #Footer -->
  <div id="Pagetop">
    <p><a href="#Top" class="over4" style="opacity: 1;"></a></p>
  </div>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
  <style type="text/css">
  .breadcrums {
    color: #ccc;
    margin-top: 15px;
  }
  .breadcrums a {
    color: #ccc;
    text-decoration: none;
  }
  body {
    font-family: 'Roboto', sans-serif;
    font-weight: 300 !important;
  }
  </style>

  <script type="text/javascript">
    $(document).ready(function () {
      $('#Choose').click(function (e) {
        e.preventDefault();
        $('.real-file-input').trigger('click');
      })
    })
  </script>