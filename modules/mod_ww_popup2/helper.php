<?php

defined('_JEXEC') or die;

class modPHelper
{
    public static function getData(){
        $session = JFactory::getSession();
        $firstSession = $session->get('atFirstSession',true);
        $items = $firstSession;
        if ($firstSession == true){
            $firstSession = false;
            $session->set('atFirstSession',$firstSession);
        }
        echo $firstSession;
        return $items;
    }
}
?>