<?php
defined('_JEXEC') or die('Restricted access');
require_once( dirname(__FILE__).DS.'helper.php' );

$data = modSessionTestHelper::getData($params);
require(JModuleHelper::getLayoutPath('mod_ww_popup3'));
?>