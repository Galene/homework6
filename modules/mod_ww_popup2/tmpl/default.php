<?php
defined('_JEXEC') or die;

$document=JFactory::getDocument();
$document->addScript('/modules/mod_ww_popup2/tmpl/jquery.js');
$document->addStyleSheet(JURI::root(true).'/modules/mod_ww_popup2/tmpl/popup.css');
$document->addScript('/modules/mod_ww_popup2/tmpl/popup.js');

?>
<?php if ($data){ ?>
<div id="boxes">
    <div id="dialog1" class="window">
        Простое окно <br>
	<span><a onclick="return false" href="#" class="close"/>Закрыть</a></span>
    </div>
    <div id="mask"></div>
</div>
<?php } ?>