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

//Load css file
$doc = & JFactory::getDocument();
$doc->addStyleSheet(JURI::root(true) . "/components/com_student/style.css");

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_student', JPATH_ADMINISTRATOR);
$canEdit = JFactory::getUser()->authorise('core.edit', 'com_student');
if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_student')) {
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>
<?php if ($this->item) : ?>

    <div class="item_fields">

        <ul class="fields_list">


			<li><!--<?php echo JText::_('COM_STUDENT_FORM_LBL_ACADEMICACHIEVEMENT_NAME'); ?>:-->
			    <h3><?php echo $this->item->name; ?></h3></li>
            <li><!--<?php echo JText::_('COM_STUDENT_FORM_LBL_ACADEMICACHIEVEMENT_PHOTO'); ?>:-->
                <img src="<?php echo $this->item->photo; ?>"></li>
			<li><?php echo JText::_('COM_STUDENT_FORM_LBL_ACADEMICACHIEVEMENT_GENERAL_INFORMATION'); ?> information:
			    <p><?php echo $this->item->general_information; ?></p></li>
			<li><?php echo JText::_('COM_STUDENT_FORM_LBL_ACADEMICACHIEVEMENT_DATE_OF_BIRTH'); ?>:
			    <p><?php echo $this->item->date_of_birth; ?></p></li>
            <li><?php echo JText::_('COM_STUDENT_FORM_LBL_ACADEMICACHIEVEMENT_SEX'); ?>:
                <p><?php echo $this->item->sex; ?></p></li>
			<li><?php echo JText::_('COM_STUDENT_FORM_LBL_ACADEMICACHIEVEMENT_GROUP'); ?>:
			    <p><?php echo $this->item->group; ?></p></li>
			<li><?php echo JText::_('COM_STUDENT_FORM_LBL_ACADEMICACHIEVEMENT_STUDENT_CREDIT_BOOK'); ?>:
			    <p><?php echo $this->item->student_credit_book; ?></p></li>
			<li><?php echo JText::_('COM_STUDENT_FORM_LBL_ACADEMICACHIEVEMENT_THE_AVERAGE_SCORE'); ?>:
			    <p><?php echo $this->item->the_average_score; ?></p></li>

            <!--<li><?php echo JText::_('COM_STUDENT_FORM_LBL_ACADEMICACHIEVEMENT_ID'); ?>:
                <?php echo $this->item->id; ?></li>
            <li><?php echo JText::_('COM_STUDENT_FORM_LBL_ACADEMICACHIEVEMENT_ORDERING'); ?>:
                <?php echo $this->item->ordering; ?></li>
			<li><?php echo JText::_('COM_STUDENT_FORM_LBL_ACADEMICACHIEVEMENT_CREATED_BY'); ?>:
			<?php echo $this->item->created_by; ?></li>
			<li><?php echo JText::_('COM_STUDENT_FORM_LBL_ACADEMICACHIEVEMENT_STATE'); ?>:
			<?php echo $this->item->state; ?></li>
			<li><?php echo JText::_('COM_STUDENT_FORM_LBL_ACADEMICACHIEVEMENT_CHECKED_OUT'); ?>:
			<?php echo $this->item->checked_out; ?></li>-->


        </ul>

    </div>
    <?php if($canEdit): ?>
		<a href="<?php echo JRoute::_('index.php?option=com_student&task=academicachievement.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_STUDENT_EDIT_ITEM"); ?></a>
	<?php endif; ?>
								<?php if(JFactory::getUser()->authorise('core.delete','com_student')):
								?>
									<a href="javascript:document.getElementById('form-academicachievement-delete-<?php echo $this->item->id ?>').submit()"><?php echo JText::_("COM_STUDENT_DELETE_ITEM"); ?></a>
									<form id="form-academicachievement-delete-<?php echo $this->item->id; ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_student&task=academicachievement.remove'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
										<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
										<input type="hidden" name="jform[name]" value="<?php echo $this->item->name; ?>" />
										<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
										<input type="hidden" name="jform[general_information]" value="<?php echo $this->item->general_information; ?>" />
										<input type="hidden" name="jform[sex]" value="<?php echo $this->item->sex; ?>" />
										<input type="hidden" name="jform[date_of_birth]" value="<?php echo $this->item->date_of_birth; ?>" />
										<input type="hidden" name="jform[group]" value="<?php echo $this->item->group; ?>" />
										<input type="hidden" name="jform[student_credit_book]" value="<?php echo $this->item->student_credit_book; ?>" />
										<input type="hidden" name="jform[the_average_score]" value="<?php echo $this->item->the_average_score; ?>" />
										<input type="hidden" name="jform[photo]" value="<?php echo $this->item->photo; ?>" />
										<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />
										<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />
										<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
										<input type="hidden" name="option" value="com_student" />
										<input type="hidden" name="task" value="academicachievement.remove" />
										<?php echo JHtml::_('form.token'); ?>
									</form>
								<?php
								endif;
							?>
<?php
else:
    echo JText::_('COM_STUDENT_ITEM_NOT_LOADED');
endif;
?>
