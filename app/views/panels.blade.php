@include('static_blocks.vat_lieu.panel_header')
    <!-- // fancy thing live inside this block -->
    <div id="Content-sub">
        <div id="Pop-01" class="popup">
            <ul id="Tab-box" class="cf">
                <?php $i = 0; ?>
                @foreach ($panels->tabs as $tab)
                    <li class="{{{ ($i == 0) ? 'select' : '' }}}">{{$tab->title}}</li>
                    <?php $i++; ?>
                @endforeach
            </ul>
            <?php $i = 0; ?>
            @foreach ($panels->tabs as $tab)
                <div class="ac-contents {{{ ($i == 0) ? '' : 'hidden' }}}">
                    <?php $i++; ?>
                    @foreach ($tab->galleries as $gallery)
                        @if ($gallery->is_top_panel_gallery)
                            <!-- top gallery -->
                            <div class="slider-wrapper theme-default cf">
                                <div id="Slider0{{$i}}" class="nivoSlider">
                                    @foreach ($gallery->images as $image)
                                        <img src="{{$image->url}}">
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="gallery-product mt-20">
                        <ul id="Mycarousel0{{$i}}" class="jcarousel-skin-tango t-1">
                            @foreach ($tab->galleries as $gallery)
                                @if (!$gallery->is_top_panel_gallery)
                                    <!-- bottom gallery -->
                                    @foreach ($gallery->images as $image)
                                        <li class="slidebase">
                                            <img src="{{$image->url}}" alt="" width=150 height=150>
                                            <p class="pr-name">Silver Pearl</p>
                                        </li>
                                    @endforeach
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@include('static_blocks.vat_lieu.panel_footer')