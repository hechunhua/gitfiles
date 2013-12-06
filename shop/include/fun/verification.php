<?php
function verification($type){
	switch ($type){
		case 1:
			return  '<p></p><a href="http://blog.sina.com.cn/uley" target="_blank">博客留言</a>';
		break;
		case 2:
			return ' | <a href="http://blog.sina.com.cn/uley" target="_blank">博客留言</a> | 邮箱留言：qxwwly@vip.qq.com';
		break;
		case 3:
			return '<tr><td width="80">友情提示：</td><td class="tdleft">感谢您的合作，邮箱留言：qxwwly@vip.qq.com</td></tr><tr><td width="80">系统制作：</td><td class="tdleft">ley制作</td></tr>  <tr><td width="80">系统版本：</td><td class="tdleft">金丝缘 <strong>'.syExt('version').'</strong> - '.syExt('update').'</td></tr><tr><td width="80">给我留言：</td><td class="tdleft"><a href="http://blog.sina.com.cn/uley" target="_blank">http://blog.sina.com.cn/uley</a></td></tr><tr><td>Email：</td><td class="tdleft">qxwwly@vip.qq.com</td></tr>';
		break;
		case 4:
			return '&nbsp;&nbsp;<a href="http://blog.sina.com.cn/uley" target="_blank">LEY</a> 金丝缘 '.syExt('version').' - '.syExt('update').' Powered by <a href="http://blog.sina.com.cn/uley" target="_blank">ley</a> © 2013';
		break;
		case 5:
			return '<a href="http://blog.sina.com.cn/uley" target="_blank">博客留言</a>';
		break;
		case 6:
		return 'href="http://blog.sina.com.cn/uley" class="v" target="_blank"';
		break;
		case 7:
		return ' log';
		break;
		case 8:
		return '网站制作';
		break;
	}
}
?>