<?php
        defined('_JEXEC') or die('Restricted access');
?>
<ul>
        <?php foreach($data as $item): ?>
        <li><a href="index.php?option=com_content&view=article&id=<?php echo $item->id ?>"><?php print_r($item->title); ?></a></li>
        <?php endforeach; ?>
</ul>