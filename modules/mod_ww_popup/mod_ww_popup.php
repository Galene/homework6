<?php
defined('_JEXEC') or die;

$cookiename=$params->get('cookiename');
$user =& JFactory::getUser();

JHTML::_('behavior.mootools');

require(JModuleHelper::getLayoutPath('mod_jdialog'));

?>