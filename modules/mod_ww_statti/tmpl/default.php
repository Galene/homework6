<?php
defined('_JEXEC') or die;
?>

<ul>
    List
    <?php foreach ($list as $item) :  ?>
        <li>
            <a href="<?php echo $item->link; ?>">
                <?php echo $item->title; ?></a>
        </li>
    <?php endforeach; ?>

</ul>
