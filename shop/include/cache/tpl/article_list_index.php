<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $type['title'] ?>-<?php echo $GLOBALS['S']['title'] ?></title>
<meta name="keywords" content="<?php echo $type['keywords'] ?> " />
<meta name="description" content="<?php echo $type['description'] ?> " />
<link href="<?php echo $GLOBALS['skin'] ?>style/g.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $GLOBALS['skin'] ?>style/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $GLOBALS['WWW'] ?>include/js/jquery.myapp.min.js"></script>
</head>
<body>
<div id="page"> <div id="header" >
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

  <div id="content" class="head-expand" style="background:#f3f3f3;"> 
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

    <div class="wpm">
      <div class="main" >
        <div class="content">
          <div class="position">当前位置：<?php echo $positions ?></div>
          <ul class="c list">
            <?php foreach( $lists as $v){ ?>
            <li><span<?php if(newest($v['addtime'],24)){ ?> style="color:red"<?php } ?>>[<?php echo date('Y-m-d',$v['addtime']) ?>]</span><a href="<?php echo $v['url'] ?>" style="<?php echo $v['style'] ?>" target="_blank"><?php echo $v['title'] ?></a></li>
            <?php } ?>
          </ul>
      </div>
    </div>
    </div>
    <div class="clearfix" style="background:#FFF; border-bottom:1px solid #ddd; padding:20px 0; line-height:30px;">
    	<div class="wpm clearfix" style="background:#FFF; width:990px; margin:0 auto">
          <p> <span style="line-height:1.5;"> </span> </p>
          <div class="col-sub" style="margin:0px 30px 0px 0px;padding:0px;float:left;zoom:1;width:230px;overflow:hidden;color:#404040;font-family:tahoma, arial, 宋体, sans-serif;white-space:normal;"> <img title="" src="<?php echo $type['litpic'] ?>" width="230" /> </div>
          <div class="col-main" style="margin:0px;padding:0px;float:left;width:670px;min-height:1px;font-size:14px;color:#666666;line-height:30px;font-family:tahoma, arial, 宋体, sans-serif;white-space:normal;">
            <?php echo $type['body'] ?>
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
 </div>
</body>
</html>
