<?php
class modTestHelper
{
        public static function getData($params)
        {
                $db = JFactory::getDbo();
                $query = $db->getQuery(true)->select('id, title')->from('#__content');
                $db->setQuery($query);
                $result = $db->loadObjectList();
                return $result;
        }
}
?>