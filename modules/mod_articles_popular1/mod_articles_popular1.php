<?php
        defined('_JEXEC') or die('Restricted access');
        require_once( dirname(__FILE__).DS.'helper.php' );
        $data = modTestHelper::getData($params);
        require(JModuleHelper::getLayoutPath('mod_articles_popular1'));
?>