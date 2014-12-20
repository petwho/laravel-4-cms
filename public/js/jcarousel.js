// JavaScript Document
function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

jQuery(document).ready(function() {
    jQuery('#Mycarousel01').jcarousel({
        auto: 1,
		scroll: 1,
		animation: "slow",
        wrap: 'circular',
        initCallback: mycarousel_initCallback
    });
	 jQuery('#Mycarousel02').jcarousel({
        auto: 1,
		scroll: 1,
		animation: "slow",
        wrap: 'circular',
        initCallback: mycarousel_initCallback
    });
		 jQuery('#Mycarousel03').jcarousel({
        auto: 1,
		scroll: 1,
		animation: "slow",
        wrap: 'circular',
        initCallback: mycarousel_initCallback
    });
		 jQuery('#Mycarousel04').jcarousel({
        auto: 1,
		scroll: 1,
		animation: "slow",
        wrap: 'circular',
        initCallback: mycarousel_initCallback
    });
		 jQuery('#Mycarousel05').jcarousel({
        auto: 1,
		scroll: 1,
		animation: "slow",
        wrap: 'circular',
        initCallback: mycarousel_initCallback
    });
		 jQuery('#Mycarousel06').jcarousel({
        auto: 1,
		scroll: 1,
		animation: "slow",
        wrap: 'circular',
        initCallback: mycarousel_initCallback
    });
		 jQuery('#Mycarousel07').jcarousel({
        auto: 1,
		scroll: 1,
		animation: "slow",
        wrap: 'circular',
        initCallback: mycarousel_initCallback
    });
		 jQuery('#Mycarousel08').jcarousel({
        auto: 1,
		scroll: 1,
		animation: "slow",
        wrap: 'circular',
        initCallback: mycarousel_initCallback
    });
		 jQuery('#Mycarousel09').jcarousel({
        auto: 1,
		scroll: 1,
		animation: "slow",
        wrap: 'circular',
        initCallback: mycarousel_initCallback
    });
		 jQuery('#Mycarousel10').jcarousel({
        auto: 1,
		scroll: 1,
		animation: "slow",
        wrap: 'circular',
        initCallback: mycarousel_initCallback
    });
});

