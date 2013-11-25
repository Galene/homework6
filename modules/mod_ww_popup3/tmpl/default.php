<?php
        defined('_JEXEC') or die('Restricted access');
        
        $doc = JFactory::getDocument();
        $doc->addStyleSheet(JURI::root(true)."/modules/mod_ww_popup3/tmpl/popup.css");
        $doc->addScript("http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js");
        $doc->addScript(JURI::root(true)."/modules/mod_ww_popup3/tmpl/popup.js");
 ?>

