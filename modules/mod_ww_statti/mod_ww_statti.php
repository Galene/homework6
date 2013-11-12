<?php
defined('_JEXEC') or die;
require_once dirname(__FILE__).'/helper.php';

$list = modStattiHelper::getList($params);

require JModuleHelper::getLayoutPath('mod_ww_statti');

?>