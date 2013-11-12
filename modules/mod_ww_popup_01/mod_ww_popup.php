<?php
defined('_JEXEC') or die;

session_start();
if (!isset($_SESSION['counter'])){
   include("popup.js");
   echo 'hello';
   $_SESSION['counter']=0;
   } else {echo 'popup';}

?>