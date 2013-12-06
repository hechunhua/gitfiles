function labels(t,c,w,o){
	$(t).nextAll(c).addClass("current");
	$(t).prevAll(c).addClass("current");
	$(t).removeClass("current");
	$("."+w).addClass("none");
	$("#"+o).removeClass("none");
}
function winbox(c,w){
	$("#winbox").remove();
	if(w=='')w=400;
	$("body").append('<div id="winbox" style="width:'+w+'px;">'+c+'</div>');
	winbox_tl();
	$(window).bind("resize scroll", function(){
		winbox_tl()
	});
}
function winbox_tl(){
	$t=Math.round(($(window).height()-$("#winbox").height())/2);
	$l=Math.round(($(window).width()-$("#winbox").width())/2);
	$("#winbox").css("top",$t+$(document).scrollTop());
	$("#winbox").css("left",$l+$(document).scrollLeft());
}
function closebox(){
	$("#winbox").remove();
}
function member_login(id,template){
	$.ajax({
		url: site_dir+'index.php?c=ajax&a=member_login',type: 'post',
		cache: false,
		data: "template="+template,
		success: function(html){
			$("#"+id).html(html);
		}
	});
}
function ajax_comment(id,molds,aid,page,template){
	$.ajax({
		url: site_dir+'index.php?c=ajax&a=comment',type: 'post',
		cache: false,
		data: "id="+id+"&template="+template+"&molds="+molds+"&aid="+aid+"&comment_page="+page,
		success: function(html){
			$("#"+id).html(html);
		}
	});
}
function ajax_record(id,aid,page,template){
	$.ajax({
		url: site_dir+'index.php?c=ajax&a=record',type: 'post',
		cache: false,
		data: "template="+template+"&aid="+aid+"&record_page="+page,
		success: function(html){
			$("#"+id).html(html);
		}
	});
}
function mycart_info(id,template){
	$.ajax({
		url: site_dir+'index.php?c=ajax&a=mycart',type: 'post',
		cache: false,
		data: "template="+template,
		success: function(html){
			mycart_total();
			$("#"+id).html(html);
		}
	});
}
function mycartdel(id){
	if(confirm('确认删除购物车中的本商品吗？')==true) {
		$.ajax({
			type: "POST",
			url: site_dir+"index.php?c=pay&a=cartdel",
			async: false,
			cache: false,
			data: "id="+id,
			success: function(msg){
				if(msg=='ok'){
					mycart_total();
					$("#cart"+id).remove();
				}else{
					alert('操作失败，请稍后再试。');
				}
			}
		});
	}
}
function mycart_total(){
	$.ajax({
		url: site_dir+'index.php?c=ajax',type: 'post',
		cache: false,
		data: "a=mycart_total",
		success: function(html){
			$("#mycart_total").html(html);
		}
	});
}
$(function() {
	var $xg_container = $('#xg_container'),
	$xg_menu = $xg_container.children('.xg_menu'),
	$xg_preview = $xg_container.children('.xg_preview'),
	$xg_back = $xg_container.children('.xg_back'),
	$xg_next_image = $('#xg_next_image'),
	$xg_prev_image = $('#xg_prev_image'),
	current = 0,
	t,
	$menu_links = $xg_menu.find('a'),
	$bg_images = $xg_container.children('.xg_bgimages').children(),
	$preview_images = $xg_preview.find('.xg_album img');
	var ie = false;
	if ($.browser.msie) {
		ie = true
	}
	$bg_images.preload({
		onComplete: function() {
			initEventHandlers()
		}
	});
	$preview_images.each(function(i) {
		var src = $(this).attr('alt');
		$('<img/>').attr('src', src)
	});
	function initEventHandlers() {
		$menu_links.bind('mouseenter',
		function(e) {
			var $link = $(this);
			if ($xg_menu.is(':animated')) return false;
			$link.find('span').stop().animate({
				backgroundColor: $link.attr('rel')
			},
			1000);
			var $item = $link.parent(),
			pos = $item.index();
			clearTimeout(t);
			t = setTimeout(function() {
				changeBgImage(pos)
			},
			150)
		}).bind('mouseleave',
		function(e) {
			clearTimeout(t);
			var $link = $(this);
			$link.find('span').stop().animate({
				backgroundColor: '#FFFFFF'
			},
			1000)
		}).bind('click',
		function(e) {
			clearTimeout(t);
			if ($xg_menu.is(':animated')) return false;
			var $album = $xg_preview.find('.xg_album').eq(current),
			$current_image;
			var current_idx = $album.data('current');
			if (current_idx) $current_image = $album.children('img').eq(current_idx);
			else {
				$current_image = $album.children('img:first');
				$album.data('current', 0)
			}
			$current_image.css('left', '0px').show();
			if (ie) $xg_menu.hide();
			else $xg_menu.fadeOut(500);
			var $bg_image = $bg_images.eq(current);
			$bg_image.stop().animate({
				'opacity': 0
			},
			1000,
			function() {
				$(this).hide()
			});
			$current_image.css('opacity', '0').stop().animate({
				'opacity': 1
			},
			1000,
			function() {
				if ($current_image.index() > 0) $xg_prev_image.show();
				if ($current_image.nextAll().length > 0) $xg_next_image.show();
				$xg_next_image.unbind('click').bind('click',
				function(e) {
					if ($current_image.nextAll().length == 1) $xg_next_image.hide();
					$xg_prev_image.show();
					var $next_image = $current_image.next();
					if ($next_image.length && !$next_image.is(':animated')) {
						$next_image.show().stop().animate({
							left: '0px'
						},
						800, 'easeInOutExpo',
						function() {
							$current_image.hide();
							$current_image = $next_image;
							$album.data('current', $next_image.index())
						})
					}
					e.preventDefault()
				});
				$xg_prev_image.unbind('click').bind('click',
				function(e) {
					if ($current_image.nextAll().length == 0) $xg_next_image.show();
					if ($current_image.index() == 1) $xg_prev_image.hide();
					var $prev_image = $current_image.prev();
					if ($prev_image.length && !$current_image.is(':animated')) {
						$prev_image.css('left', '0px').show();
						$current_image.stop().animate({
							left: '800px'
						},
						800, 'easeInOutExpo',
						function() {
							$current_image.hide();
							$current_image = $prev_image;
							$album.data('current', $prev_image.index())
						})
					}
					e.preventDefault()
				});
				$xg_back.show().unbind('click').bind('click',
				function() {
					if ($current_image.is(':animated') || $current_image.next().is(':animated')) return false;
					$xg_back.hide();
					$xg_next_image.hide();
					$xg_prev_image.hide();
					var $bg_image = $bg_images.eq(current);
					$bg_image.attr('src', $current_image.attr('alt'));
					if (ie) $xg_menu.show()
					else $xg_menu.fadeIn(500);
					$bg_image.show().stop().animate({
						'opacity': 0.3
					},
					1000);
					$current_image.stop().animate({
						'opacity': 0
					},
					1000,
					function() {
						$(this).hide()
					})
				})
			});
			e.preventDefault()
		})
	}
	function changeBgImage(pos) {
		if (pos == current) return false;
		$bg_images.eq(current).css({
			'z-index': '1'
		}).stop().animate({
			'opacity': '0'
		},
		600);
		$bg_images.eq(pos).css({
			'opacity': '0',
			'z-index': '999'
		}).show().stop().animate({
			'opacity': '0.5'
		},
		600);
		current = pos
	}
});