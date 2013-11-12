<?php

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once( dirname(__FILE__).DS.'helper.php' );
 
$hello = modHelloWorldHelper::getHello( $params );
require( JModuleHelper::getLayoutPath( 'mod_helloworld' ) );
?>