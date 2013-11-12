text
<?php
defined('_JEXEC') or die;

$document=JFactory::getDocument();
$document->addScript('/modules/mod_ww_popup2/tmpl/jquery.js');
$document->addStyleSheet(JURI::root(true).'/modules/mod_ww_popup2/tmpl/popup.css');
$document->addScript('/modules/mod_ww_popup2/tmpl/popup.js');



?>
<a class="popup-link-1" href="">Click me</a>

<div class="popup-box" id="popup-box-1">
    <div class="close">X</div>
    <div class="top">
        <h2>Some Title Goes Here:</h2>
    </div>
    <div class="bottom">
        Some more content, for when you want to add a little bit more
    </div>
</div>