<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $type['title'] ?>-<?php echo $GLOBALS['S']['title'] ?></title>
<meta name="keywords" content="<?php echo $type['keywords'] ?> " />
<meta name="description" content="<?php echo $type['description'] ?> " />
<link href="<?php echo $GLOBALS['skin'] ?>style/g.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $GLOBALS['skin'] ?>style/product.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $GLOBALS['WWW'] ?>include/js/jquery.myapp.min.js"></script>
<script type="text/javascript" src="<?php echo $GLOBALS['WWW'] ?>include/js/jquery.jqzoom-core.js"></script>
<script type="text/javascript">
$(function() {
	//$(".jqzoom").jqzoom();
	$('.jqzoom').jqzoom({
		zoomWidth: 510,
		zoomHeight: 460,
		xOffset: 17,
		yOffset: 0,
		zoomType: 'reverse',
		lens:true,
		preloadImages:true,
		alwaysOn:false
	});
	$("#proNumJia").bind("click",function(){
		var store_num=7;//数据库中商品数
		var num = $('#proBuyNum').val();
		//if(sku!=''){
			if(parseInt(num)<parseInt(store_num)){
				$('.pro_buynum .nostock').hide().siblings('span').show();
				$("#proBuyNum").val(Number($("#proBuyNum").val())+1);
			}else{
				$('.pro_buynum .stock').hide().siblings('span').show();
			}
		//}else{
			//alert("请选择尺码");
			//halert('warning',0,"请选择尺码");
		//}
	});
	//购物车单击-1
	$("#proNumJian").bind("click",function(){
		var store_num=7;//数据库中商品数
		var num = $('#proBuyNum').val();
		//if(sku!=''){
			if(parseInt(num)<=1){
				$("#proBuyNum").val("1");
			}else if(parseInt(num)>parseInt(store_num)){
				$('.pro_buynum .stock').hide().siblings('span').show();
				$("#proBuyNum").val(Number($("#proBuyNum").val())-1);
			}else{
				$('.pro_buynum .nostock').hide().siblings('span').show();
				$("#proBuyNum").val(Number($("#proBuyNum").val())-1);
			}
		//}else{
			//alert("请选择尺码");
			//halert('warning',0,"请选择尺码");
		//}
	});
	//图片集左右翻滚
	$("#propicSelectTop").bind("click",function(){
		if(-$("#proLitpic").css("margin-left").replace(/px/,"")>=$("#proLitpic li:first").width()+11){
			$("#proLitpic").css("margin-left",Number($("#proLitpic").css("margin-left").replace(/px/,""))+Number($("#proLitpic li:first").width()+11)+"px");
		}
	});
	$("#propicSelectBot").bind("click",function(){
		if(5*($("#proLitpic li:first").width()+11)-$("#proLitpic").css("margin-left").replace(/px/,"")<$("#proLitpic").width()+10){
			$("#proLitpic").css("margin-left",Number($("#proLitpic").css("margin-left").replace(/px/,""))-Number($("#proLitpic li:first").width()+11)+"px");
		}
	});
});
</script>
</head>
<body>
<div id="page">
<div id="header" >
  <div id="headerCon"  class="hasSubLogo" >
    <h1 id="mallLogo" > <span class="mlogo"><a href="<?php echo $GLOBALS['WWW'] ?>" title="金丝缘"><s></s>金丝缘</a></span> <span class="slogo"> <a href="<?php echo $GLOBALS['WWW'] ?>">金丝缘内衣专卖店 <span class="flagship-icon">品牌直销</span> </a> </span> </h1>
    <div id="jsySearch" style="display:none;">
      <form name="searchTop" action="?" class="mallSearch-form">
        <fieldset>
          <legend>金丝缘缘搜索</legend>
          <div class="mallSearch-input clearfix">
            <label for="mq">搜索 金丝缘 商品/店铺</label>
            <input type="text" name="q" accesskey="s" value="" id="mq" autocomplete="off"/>
            <button class="currShopBtn" type="button">搜本店<s></s></button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
  <div class="headerNav">
    <div class="headerNav-con">
      <div id="shop-info-new">
        <div class="main-info">
          <label class="shop">店铺：</label>
          <span class="dsr-info">您可以收藏本网站 <em class="count">^_^</em></span> <i class="icon-triangle"></i> </div>
      </div>
    </div>
  </div>
</div>

<div id="content" class="head-expand">
    <!--BEGIN all-->
    <!--导航菜单模块-->
    <div id="hd">
  <div class="skin-box jsy-banner">
    <div class="skin-box-bd">
      <p class="l"><img style="float:none;margin:0px;" src="<?php echo $GLOBALS['skin'] ?>images/logo.gif"/></p>
      <p class="r"><img style="float:none;margin:0px;" src="<?php echo $GLOBALS['skin'] ?>images/top-ad.gif"/></p>
    </div>
    <div class="banner-box">
      <ul>
        <li class="first"><a href="javascript:;">本店商品精彩展示</a></li>
        <li><a href="<?php echo $GLOBALS['WWW'] ?>">首页</a></li>
        <?php $vn=0;$tablev=syClass("syModel")->findSql("select tid,molds,pid,classname,gourl,litpic,title,keywords,description,orders,mrank,htmldir,htmlfile,mshow from qx_classtype where  mshow='1' and pid=0  order by orders desc,tid limit 7");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["classname"]=stripslashes($v["classname"]);$v["description"]=stripslashes($v["description"]); $v["url"]=html_url("classtype",$v); ?>
          <li><a href="<?php echo $v['url'] ?>"><?php echo $v['classname'] ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</div>

    <div id="bd" >
		<div class="layout grid-m" style="padding-top:10px;">
		<div class="col-main">
		<div class="main-wrap">
			<div class="J_TModule" data-title="产品详情">
            <!--pro_info-->
            <div class="pro_info clearfix">
              <div class="pro_picview">
                <!---图片循环--->
                <div class="pro_bigpic" id="proCurpic"><a class="jqzoom" rel='gal1' title="男装" href="http://img1.heilanhome.com/sources/goods/HMHW3B039/HMHW3B039_C0244_1.jpg" > <img class="pro_normalpic" src="http://img1.heilanhome.com/sources/goods/HMHW3B039/HMHW3B039_C0244_1--w_460_h_460.jpg"></a></div>
    
    
    
                <div class="pro_litpic clearfix">
                  <div class="pro_litpic_t" id="propicSelectTop"></div>
                  <div class="pro_litpic_m">
                    <ul id="proLitpic">
                      <li class="hover" code=""><a rel="{gallery:'gal1',smallimage:'http://img1.heilanhome.com/sources/goods/HMHW3B039/HMHW3B039_C0244_1--w_460_h_460.jpg',largeimage:'http://img1.heilanhome.com/sources/goods/HMHW3B039/HMHW3B039_C0244_1.jpg'}" href="javascript:void(0);" class=""><img src="http://img1.heilanhome.com/sources/goods/HMHW3B039/HMHW3B039_C0244_1--w_74_h_74.jpg"/></a> </li>
                      <li class="" code=""><a rel="{gallery:'gal1',smallimage:'http://img1.heilanhome.com/sources/goods/HMHW3B039/HMHW3B039_C0244_6--w_460_h_460.jpg',largeimage:'http://img1.heilanhome.com/sources/goods/HMHW3B039/HMHW3B039_C0244_6.jpg'}" href="javascript:void(0);" class=""><img src="http://img1.heilanhome.com/sources/goods/HMHW3B039/HMHW3B039_C0244_6--w_74_h_74.jpg"/></a> </li>
                      <li class="" code=""><a rel="{gallery:'gal1',smallimage:'uploads/2013/11/091051015647.jpg',largeimage:'uploads/2013/11/091051015647.jpg'}" href="javascript:void(0);"><img src='uploads/2013/11/091051015647.jpg' /></a></li>
                      <li style="display:none;" code="C0154"> <a href="javascript:;" rel="{gallery:'gal1',smallimage:'http://img1.heilanhome.com/sources/goods/HMHW3B039/HMHW3B039_C0244_1--w_460_h_460.jpg',largeimage:'http://img1.heilanhome.com/sources/goods/HMHW3B039/HMHW3B039_C0244_1.jpg'}" > <img title="橄榄绿" src="http://img1.heilanhome.com/sources/goods/HMHW3B039/HMHW3B039_C0244_1--w_74_h_74.jpg" /> </a> </li>
                      <li style="display:none;" code="C0131"> <a href="javascript:;"  rel="{gallery:'gal1',smallimage:'uploads/2013/11/091030068244.jpg',largeimage:'uploads/2013/11/091030068244.jpg'}" > <img title="蓝底白点" src="uploads/2013/11/091030068244.jpg" /> </a> </li>
    
                     </ul>
                  </div>
                  <div class="pro_litpic_b" id="propicSelectBot"></div>
                </div>
              </div>
              <div class="pro_attr">
                <div class="pro_title">[新品]【轻熟风】秋装新款时尚印花灯芯绒长袖衬衫</div>
                <div class="pro_num">
                	<u>商品编号</u> HMHW3B039 
                </div>
                <div class="pro_price">
                	<u>售价</u>  &yen; <strong>189.00</strong> 
                </div>
                <div class="pro_color">
                  <div class="pro_colorname" style="color:#CCC">选择种类</div>
                  <ul>
                    <li class="select1"> <a href="javascript:;"><img src="uploads/2013/11/091030065483.jpg" /><i></i></a> </li>
                  </ul>
                </div>
                <div class="pro_border" style="display:;">
                  <div class="pro_color">
                    <div class="pro_colorname">颜色分类</div>
                    <ul id="proColor">
                      <li> <a id="" index='0' href="javascript:;" type='' name='color' value='橄榄绿' picbig="uploads/2013/11/091030065483.jpg"  code ="C0154" cname='颜色'> <img title="橄榄绿" src="uploads/2013/11/091030065483.jpg" /><i></i></a> </li>
                      <li> <a id="" index='0' href="javascript:;" type='' name='color' value='蓝底白点' picbig="uploads/2013/11/091030065483.jpg" code ="C0131" cname='颜色'> <img title="蓝底白点" src="uploads/2013/11/091030068244.jpg" /><i></i></a> </li>
                    </ul>
                  </div>
                  <div class="pro_size_name"><u>尺码</u><strong>请选择适合您的尺寸</strong></div>
                  <ul class="pro_size" id="proSize">
                    <li><a href="javascript:;" class="size_chioce_curr" name='size' value='165/84A(38)' code ="s" cname='尺码'>s<span>(165/84A)</span><i></i></a></li>
                    <li><a href="javascript:;" class="size_chioce_curr" name='size' value='170/88A(39)' code ="m" cname='尺码'>m<span>(170/88A)</span><i></i></a></li>
                    <li><a href="javascript:;" class="size_chioce_curr" name='size' value='175/92A(40)' code ="l" cname='尺码'>l<span>(175/92A)</span><i></i></a></li>
    
                  </ul>
                  <div class="pro_buynum"> 
                  	<span class="tit">数量</span>
                    <span>
                    	<span id="proNumJian" class="btn">-</span>
                        <span class="input">
                            <input id="proBuyNum" type="text" value="1" />
                            <input id='hidden7' type="hidden" value=127 />
                        </span>
                        <span id="proNumJia" class="btn">+</span>
                    </span>
                    <span>件</span> 
                    <span class="stock"></span>
                    <span class="nostock" style="display:none;">库存不足</span>
                  </div>
                  <div class="pro_subarea clearfix">
                    <div class="pro_submit ">
                      <a  class="pro_submitB" href="javascript:;">加入购物袋</a> <a  class="pro_submitA" href="javascript:;">立即购买</a>
                    </div>
                  </div>
                  <div class="pro_fav">
                  	<div class="shoucang clearfix">
                    <a href="javascript:void(0);" onclick="return add_collect_goods('HMHW3B039')">收藏该商品</a><span></span>
                    </div>
                  </div>
                  <div class="pro_share">
                    <!-- Baidu Button BEGIN -->
                    <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
                    <a class="bds_tsina"></a>
                    <a class="bds_qzone"></a>
                    <a class="bds_tqq"></a>
                    <a class="bds_renren"></a>
                    <a class="bds_t163"></a>
                    <a class="bds_sqq"></a>
                    <a class="bds_taobao"></a>
                    <a class="bds_copy"></a>
                    <span class="bds_more">更多</span>
                    </div>
                    <!-- Baidu Button END -->
                  </div>
                </div>
              </div>
            </div>
    
            <!--pro_detail-->
            <div class="pro_detail clearfix" style="clear:both">
              <div class="detail_main">
                <ul class="detail_tab">
                  <li class="bg_detail current">商品详情</li>
                </ul>
                <div class="detail_con">
                  <div class="detail_con_title">产品详细图 <span>注：商品实际颜色以静物图为准</span></div>
                  <div class="detail_con_pictxt">
                    <img src="http://img02.taobaocdn.com/imgextra/i2/693060164/T2LikHXoBaXXXXXXXX_!!693060164.jpg" width="780" /> <img src="http://img02.taobaocdn.com/imgextra/i2/693060164/T2xyWwXhdcXXXXXXXX_!!693060164.jpg" width="780" /> <img src="http://img04.taobaocdn.com/imgextra/i4/693060164/T2F_s1Xb4aXXXXXXXX_!!693060164.jpg" width="780" /> <img src="http://img01.taobaocdn.com/imgextra/i1/693060164/T2lcwPXjFaXXXXXXXX_!!693060164.jpg" width="780" /> <img src="http://img03.taobaocdn.com/imgextra/i3/693060164/T2C0.1XiXaXXXXXXXX_!!693060164.jpg" width="780" /> <img src="http://img03.taobaocdn.com/imgextra/i3/693060164/T20sQLXa8aXXXXXXXX_!!693060164.jpg" width="780" /> <img src="http://img04.taobaocdn.com/imgextra/i4/693060164/T2MAFrXixOXXXXXXXX_!!693060164.jpg" width="780" /> <img src="http://img01.taobaocdn.com/imgextra/i1/693060164/T2zP.2XaVXXXXXXXXX_!!693060164.jpg" width="780" />
                  </div>
                </div>
              </div>
              <!--left bar-->
              <div class="detail_bar">
                <div class="detail_bar_title"><img src="skin/default/images/left_bar1.png" alt="热销排行" /></div>
                <div class="detail_bar_con">
                  <ul>
                    <li><a href="#"><img src="http://img3.heilanhome.com/sources/goods/HTSD3B101/HTSD3B101_ad--w_160_h_160.jpg" /></a>
                      <div class="name"><a href="#">2013新款 韩版休闲纯色长袖T恤 HTSD3B101</a></div>
                      <div class="price">售价 <strong>&yen;98.00</strong></div>
                    </li>
                    
                  </ul>
                </div>
              </div>
            </div>
      		</div>
		</div>
        </div>
		</div>
    </div>
</div>
<div id="copyright">
  <div class="shop-info"> <span class="designer">金丝缘专卖店:您的最佳选择 | 制作By <a target="_blank" href="#">ley</a></span> </div>
</div>
<div id="footer">
  <div id="mall-desc">
    <dl id="ensure">
      <dt><span>加盟我们</span></dt>
      <dd> <span>欢迎您加入金丝缘</span> <span>充满发展，值得信赖</span> <span>您的最佳选择</span></dd>
    </dl>
    <dl id="beginner">
      <dt><span>关于我们</span></dt>
      <dd><?php $vn=0;$tablev=syClass("syModel")->findSql("select tid,molds,pid,classname,gourl,litpic,title,keywords,description,orders,mrank,htmldir,htmlfile,mshow from qx_classtype where  tid='1'  order by orders desc,tid");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["classname"]=stripslashes($v["classname"]);$v["description"]=stripslashes($v["description"]); $v["url"]=html_url("classtype",$v); ?><a href="<?php echo $v['url'] ?>">公司介绍</a><?php } ?>
      <?php $vn=0;$tablev=syClass("syModel")->findSql("select tid,molds,pid,classname,gourl,litpic,title,keywords,description,orders,mrank,htmldir,htmlfile,mshow from qx_classtype where  tid='1'  order by orders desc,tid");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["classname"]=stripslashes($v["classname"]);$v["description"]=stripslashes($v["description"]); $v["url"]=html_url("classtype",$v); ?><a href="<?php echo $v['url'] ?>">产品介绍</a><?php } ?>
      <?php $vn=0;$tablev=syClass("syModel")->findSql("select tid,molds,pid,classname,gourl,litpic,title,keywords,description,orders,mrank,htmldir,htmlfile,mshow from qx_classtype where  tid='1'  order by orders desc,tid");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["classname"]=stripslashes($v["classname"]);$v["description"]=stripslashes($v["description"]); $v["url"]=html_url("classtype",$v); ?><a href="<?php echo $v['url'] ?>">团队力量</a><?php } ?>
      <?php $vn=0;$tablev=syClass("syModel")->findSql("select tid,molds,pid,classname,gourl,litpic,title,keywords,description,orders,mrank,htmldir,htmlfile,mshow from qx_classtype where  tid='1'  order by orders desc,tid");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["classname"]=stripslashes($v["classname"]);$v["description"]=stripslashes($v["description"]); $v["url"]=html_url("classtype",$v); ?><a href="<?php echo $v['url'] ?>">公司荣誉</a><?php } ?>
      </dd>
    </dl>
    <dl id="payment">
      <dt><span>支付方式</span></dt>
      <dd> <a href="#" target="_blank">支付宝快捷支付</a> <a href="#" target="_blank">支付宝余额付款</a> <a href="#" target="_blank">支付宝卡付款</a> <a href="#" target="_blank">货到付款</a> </dd>
    </dl>
    <dl id="seller">
      <dt><span>商家服务</span></dt>
      <dd> <a href="#" target="_blank" >商家中心</a> <a href="#" target="_blank" >金丝缘智库</a> <a href="#" target="_blank" >金丝缘规则</a> <a href="#" target="_blank" >物流服务</a> </dd>
    </dl>
    <h4 class="go-home"><a href="#" target="_blank" title="返回金丝缘首页" >返回金丝缘首页</a></h4>
  </div>
  <div id="copyright">
    <p id="footer-tmallinfo"><?php $vn=0;$tablev=syClass("syModel")->findSql("select tid,molds,pid,classname,gourl,litpic,title,keywords,description,orders,mrank,htmldir,htmlfile,mshow from qx_classtype where  mshow='1' and pid=0  order by orders desc,tid limit 7");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["classname"]=stripslashes($v["classname"]);$v["description"]=stripslashes($v["description"]); $v["url"]=html_url("classtype",$v); ?><a href="<?php echo $v['url'] ?>"><?php echo $v['classname'] ?></a> | <?php } ?> 金丝缘，您的独家选择</p>
    <p id="footer-otherlink"> 友情链接： <?php $tablev=syClass("syModel")->findSql("select * from qx_links where isshow=1  order by orders desc,id desc");foreach($tablev as $v){ $v["name"]=stripslashes($v["name"]); ?><a href="<?php echo $v['gourl'] ?>" target="_blank"><?php echo $v['name'] ?></a> | <?php } ?> <a href="<?php echo $GLOBALS['WWW'] ?>" target="_blank">金丝缘本店</a></p>
    <p>Copyright&nbsp;2012-2013, 版权所有 JSY.COM <br />
      网络文化经营许可证：<a href="#" target="_blank">金丝缘[2013]0234-028号</a></p>
  </div>
</div>
<!--顶部login滚动和返回顶部 srt-->
<a href="#" target="_self" id="toTop" title="返回顶部" onclick="window.scrollTo(0,0);return false" style="display:none;"></a>
<script type="text/javascript">function toTopHide(){document.documentElement.scrollTop+document.body.scrollTop>630?document.getElementById("toTop").style.display="block":document.getElementById("toTop").style.display="none"}window.onscroll=toTopHide;</script>
<!--[if lte IE 6]><style type="text/css">#toTop{position:absolute;right:15px;bottom:45px;}</style><![endif]-->
<!--[if lte IE 6]>
<script type="text/javascript">function topFixed(){document.documentElement.scrollTop>400?document.getElementById("toTop").style.display="block":document.getElementById("toTop").style.display="none",document.getElementById("toTop").style.top=document.documentElement.clientHeight+document.documentElement.scrollTop-document.getElementById("toTop").clientHeight-45+"px"}window.onscroll=topFixed,window.resize=topFixed,topFixed()</script>
<![endif]-->
<!--顶部login滚动和返回顶部 end-->

<script type="text/javascript" >
var select_value=[];
var select_value="";
var request_c='12';//加载时默认选中的颜色
$("#proColor li").bind("click",function(){
	share_code = $(this).children('a').attr('code');
	//去除缩略图下拉无法返回
	//$("#proLitpic").removeAttr("style");
	//颜色值
	select_value[0] = $(this).children('a').attr("value");
	select_value[2] = $(this).children('a').attr("code");
	//图片展示
	//picbig=$(this).children('a').attr('picbig');
	//$(".jqzoom").attr("href",picbig);
	//$(".pro_normalpic").attr("src",picbig);
	ccolor=$(this).children('a').attr('code');
	$('li[code="'+$(this).children("a").attr('code')+'"]').addClass("hover").siblings().removeClass();
	$('li[code="'+ccolor+'"]').children().click();
	//$("#selected_color").html(select_value[0]);//选中的值页面上显示
	//$("#current_img").parent().attr('href', $(this).children("a img").attr('source'));
	//显示缩略图中相应的颜色
	//$("#proLitpic li").hide();
	//$('li[code="'+$(this).children("a").attr('code')+'"]').show();
	//$('li[code="'+$(this).children("a").attr('code')+'"]:first').addClass("hover").siblings().removeClass();
	//缩略图绑定click事件
	/*$("#proLitpic li").each(function(){
		if($(this).is(":visible")){
			$(this).children().click();
			return false;//执行一个便结束
		}
	});*/
	//尺码初始化
	if(typeof(select_value[1]) != "undefined"){
		$('#proSize li').each(function(){
			$(this).attr("class","");
			select_value[1] = '';
			select_value[3] = '';
			$("#selected_size").html('');
		});
	}
	$("#selected_value").show();
	$("#proBuyNum").val("1");//默认购买数量
	if($(this).children().is("div")){
	}else{
		$(this).append("<div class='bg_detail'></div>").attr("class","select").siblings("li").attr("class","").children("div").remove();
	}
	//商品库存不足时尺码变灰
	$("#proSize li").removeClass();
	var inventorys={"C0154":{"s":5,"m":0,"l":0},"C0131":{"s":0,"m":3,"l":8}};
	$("#proSize li").each(function(){
		if(inventorys[share_code][$(this).children('a').attr('code')]<=0){
			$(this).addClass("nostock");
			$(this).attr("title","此码没有库存");
		}
	})
	/*Ajax.call('/?app_act=goods/get_inventory_num&app_page=null&goods_sn='+ request_goods_sn +'&c='+$(this).children('a').attr('code'), '',
		function (s){
			s=eval('('+s+')');
			//库存样式设置（无库存显示灰色）
			$("#proSize li").each(function(){
				//是预售商品
					$is_presale=s[$(this).children('a').attr('code')]['is_presale'];
					if($is_presale == 1){
						$presale_count=s[$(this).children('a').attr('code')]['presale_count'];
						if($presale_count<=0){
							$(this).addClass("nostock");
							$(this).attr("title","此码没有库存");
						}
					}else{
						$actual_count=s[$(this).children('a').attr('code')]['actual_count'];
						if($actual_count<=0){
							$(this).addClass("nostock");
							$(this).attr("title","此码没有库存");
						}
					}
				});
			}, 'GET', '');
		jiathis_config = {
			pic:"http://localhost:aaa.jpg"
		}
	*/
});
$("#proLitpic li img").bind("click",function(){
	$(this).parent("a").parent("li").addClass("hover").siblings("li").removeClass("hover");
});
$("#proSize li").bind("click",function(){
	if($(this).hasClass("nostock")){
	}else{
		var actual=0;
		$("#proBuyNum").val("1");
		//库存提示
		$("span[class='nostock']").hide();
		$("span[class='stock']").show();
		//$('.pro_submit_alert,.pro_submit_alert2,.pro_submit_alert3').hide();
		$(this).addClass("select").siblings("li").removeClass("select");
	}
});
</script>
<!-- Baidu Button BEGIN -->
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;mini=1&amp;uid=770615" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>
<!-- Baidu Button END -->
</div>
</body>
</html>
