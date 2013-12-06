<?php
define("APP_PATH",dirname(__FILE__));
define("LEY_PATH",APP_PATH."/include");
@date_default_timezone_set('PRC');
$leyConfig = array(

'db' => array(
'host' => '127.0.0.1',			//数据库地址
'port' => 3306,					//数据库端口
'database' => 'leyshop',		//数据库名
'login' => 'root',				//数据库帐号
'password' => '',			//数据库密码
'prefix' => 'qx_',				//数据库表前缀
),

'ext' => array(
'version' => 'SHOP',
'update' => '20131102',
'auto_update' => 1,
'http_path' => 'http://blog.sina.com.cn/uley',
'site_title' => '金丝缘商务系统',
'site_keywords' => '金丝缘 保暖内衣 衣服',
'site_description' => '金丝缘商务系统-保暖内衣',
'secret_key' => 'daaf1e80e2b220669e0146f40bf6b2c8',	//站内安全密钥，安装时会随机生成，一旦生成请勿修改，并请牢记，否则可能造成某些数据无法取回。
'view_themes' => 'default',
'site_html' => 0,
'site_html_dir' => 'a',
'site_html_rules' => '[mold]/[file].html',
'site_html_suffix' => '.html',
'site_html_index' => 0,
'enable_gzip' => 0,
'enable_gzip_level' => 6,
'cache_auto' => 1,
'cache_time' => 0,
'filetype' => 'jpg,gif,jpeg,bmp,png,swf,flv,wmv,wma,mp3,mp4,rar,zip,7z,txt,doc,docx,xls,xlsx',
'filesize' => 10485760,
'imgwater' => 0,
'imgwater_t' => 3,
'imgcaling' => 0,
'img_w' => 1000,
'img_h' => 800,
'comment_audit' => 1,
'comment_user' => 0,
),
);