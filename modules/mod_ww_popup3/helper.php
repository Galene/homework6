<?php
class modSessionTestHelper
{
        public static function getData($params)
        {
                $session = JFactory::getSession();
                $session_variable = $session->get('first_enter', true);
                $result = $session_variable;
                if($session_variable){
                        $session_variable = false;
                        $session->set('first_enter', $session_variable);
                }
                return $result;
        }
}
?>
