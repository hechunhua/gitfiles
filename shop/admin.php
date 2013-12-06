<?php
require("config.php");
$leyConfig['launch'] = array('router_prefilter' => array(array('syauser','check'),),);
$leyConfig['ext']['view_admin']= 'admin';
$leyConfig['view']['config']['template_dir'] = APP_PATH.'/source/admin/template';
$leyConfig['controller_path'] = APP_PATH.'/source/admin';

require(LEY_PATH."/sys.php");
import(APP_PATH.'/include/fun/fun_admin.php');
spRun();