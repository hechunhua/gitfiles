<?php
require("../../../config.php");
require(LEY_PATH."/sys.php");

$v = syClass('tenpay',null,'tenpay.php');
$g = $v->verify_get();
if($g) {
	$a=$v->success($g);
	message($a['msg'],$a['url']);
}
?>