<?php
require("config.php");
$leyConfig['view']['config']['template_dir'] = APP_PATH.'/template/'.$leyConfig['ext']['view_themes'];
require(LEY_PATH."/sys.php");
spRun();