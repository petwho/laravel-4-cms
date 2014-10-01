$(function() {
	$("#Tab-box li").click(function() {
		var num = $("#Tab-box li").index(this);
		$(".ac-contents").addClass('hidden');
		$(".ac-contents").eq(num).removeClass('hidden');
		$("#Tab-box li").removeClass('select');
		$(this).addClass('select')
	});
});
$(function() {
	$("#Tab-sub li").click(function() {
		var num = $("#Tab-sub li").index(this);
		$(".s-contents").addClass('hidden');
		$(".s-contents").eq(num).removeClass('hidden');
		$("#Tab-sub li").removeClass('select');
		$(this).addClass('select')
	});
});
$(function() {
	$("#Tab-box li a").click(function() {
		$("#Tab-box li a").removeClass('select');
		$(this).addClass('select')
	});
});
$(function() {
	$("#Shop-box ul li a").click(function() {
		$("#Shop-box ul li a").removeClass('select');
		$(this).addClass('select')
	});
});
