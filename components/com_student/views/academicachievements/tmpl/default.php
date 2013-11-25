<?php
/**
 * @version     1.0.2
 * @package     com_student
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Gala <galina.ck@gmail.com> - http://
 */
// no direct access
defined('_JEXEC') or die;
?>
<script type="text/javascript">
    function deleteItem(item_id){
        if(confirm("<?php echo JText::_('COM_STUDENT_DELETE_MESSAGE'); ?>")){
            document.getElementById('form-academicachievement-delete-' + item_id).submit();
        }
    }
</script>

<div class="items">
    <ul class="items_list">
<?php $show = false; ?>
        <?php foreach ($this->items as $item) : ?>

            
				<?php
					if($item->state == 1 || ($item->state == 0 && JFactory::getUser()->authorise('core.edit.own',' com_student'))):
						$show = true;
						?>
							<li>
								<a href="<?php echo JRoute::_('index.php?option=com_student&view=academicachievement&id=' . (int)$item->id); ?>"><?php echo $item->name; ?></a>
								<?php
									if(JFactory::getUser()->authorise('core.edit.state','com_student')):
									?>
										<a href="javascript:document.getElementById('form-academicachievement-state-<?php echo $item->id; ?>').submit()"><?php if($item->state == 1): echo JText::_("COM_STUDENT_UNPUBLISH_ITEM"); else: echo JText::_("COM_STUDENT_PUBLISH_ITEM"); endif; ?></a>
										<form id="form-academicachievement-state-<?php echo $item->id ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_student&task=academicachievement.save'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
											<input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>" />
											<input type="hidden" name="jform[name]" value="<?php echo $item->name; ?>" />
											<input type="hidden" name="jform[ordering]" value="<?php echo $item->ordering; ?>" />
											<input type="hidden" name="jform[general_information]" value="<?php echo $item->general_information; ?>" />
											<input type="hidden" name="jform[sex]" value="<?php echo $item->sex; ?>" />
											<input type="hidden" name="jform[date_of_birth]" value="<?php echo $item->date_of_birth; ?>" />
											<input type="hidden" name="jform[group]" value="<?php echo $item->group; ?>" />
											<input type="hidden" name="jform[student_credit_book]" value="<?php echo $item->student_credit_book; ?>" />
											<input type="hidden" name="jform[the_average_score]" value="<?php echo $item->the_average_score; ?>" />
											<input type="hidden" name="jform[photo]" value="<?php echo $item->photo; ?>" />
											<input type="hidden" name="jform[state]" value="<?php echo (int)!((int)$item->state); ?>" />
											<input type="hidden" name="jform[checked_out]" value="<?php echo $item->checked_out; ?>" />
											<input type="hidden" name="option" value="com_student" />
											<input type="hidden" name="task" value="academicachievement.save" />
											<?php echo JHtml::_('form.token'); ?>
										</form>
									<?php
									endif;
									if(JFactory::getUser()->authorise('core.delete','com_student')):
									?>
										<a href="javascript:deleteItem(<?php echo $item->id; ?>);"><?php echo JText::_("COM_STUDENT_DELETE_ITEM"); ?></a>
										<form id="form-academicachievement-delete-<?php echo $item->id; ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_student&task=academicachievement.remove'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
											<input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>" />
											<input type="hidden" name="jform[name]" value="<?php echo $item->name; ?>" />
											<input type="hidden" name="jform[ordering]" value="<?php echo $item->ordering; ?>" />
											<input type="hidden" name="jform[general_information]" value="<?php echo $item->general_information; ?>" />
											<input type="hidden" name="jform[sex]" value="<?php echo $item->sex; ?>" />
											<input type="hidden" name="jform[date_of_birth]" value="<?php echo $item->date_of_birth; ?>" />
											<input type="hidden" name="jform[group]" value="<?php echo $item->group; ?>" />
											<input type="hidden" name="jform[student_credit_book]" value="<?php echo $item->student_credit_book; ?>" />
											<input type="hidden" name="jform[the_average_score]" value="<?php echo $item->the_average_score; ?>" />
											<input type="hidden" name="jform[photo]" value="<?php echo $item->photo; ?>" />
											<input type="hidden" name="jform[created_by]" value="<?php echo $item->created_by; ?>" />
											<input type="hidden" name="jform[state]" value="<?php echo $item->state; ?>" />
											<input type="hidden" name="jform[checked_out]" value="<?php echo $item->checked_out; ?>" />
											<input type="hidden" name="option" value="com_student" />
											<input type="hidden" name="task" value="academicachievement.remove" />
											<?php echo JHtml::_('form.token'); ?>
										</form>
									<?php
									endif;
								?>
							</li>
						<?php endif; ?>

<?php endforeach; ?>
        <?php
        if (!$show):
            echo JText::_('COM_STUDENT_NO_ITEMS');
        endif;
        ?>
    </ul>
</div>
<?php if ($show): ?>
    <div class="pagination">
        <p class="counter">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </p>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
<?php endif; ?>


									<?php if(JFactory::getUser()->authorise('core.create','com_student')): ?><a href="<?php echo JRoute::_('index.php?option=com_student&task=academicachievement.edit&id=0'); ?>"><?php echo JText::_("COM_STUDENT_ADD_ITEM"); ?></a>
	<?php endif; ?>