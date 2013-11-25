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

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_student/assets/css/student.css');
?>
<script type="text/javascript">
    function getScript(url,success) {
        var script = document.createElement('script');
        script.src = url;
        var head = document.getElementsByTagName('head')[0],
        done = false;
        // Attach handlers for all browsers
        script.onload = script.onreadystatechange = function() {
            if (!done && (!this.readyState
                || this.readyState == 'loaded'
                || this.readyState == 'complete')) {
                done = true;
                success();
                script.onload = script.onreadystatechange = null;
                head.removeChild(script);
            }
        };
        head.appendChild(script);
    }
    getScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',function() {
        js = jQuery.noConflict();
        js(document).ready(function(){
            

            Joomla.submitbutton = function(task)
            {
                if (task == 'academicachievement.cancel') {
                    Joomla.submitform(task, document.getElementById('academicachievement-form'));
                }
                else{
                    
                    if (task != 'academicachievement.cancel' && document.formvalidator.isValid(document.id('academicachievement-form'))) {
                        
                        Joomla.submitform(task, document.getElementById('academicachievement-form'));
                    }
                    else {
                        alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
                    }
                }
            }
        });
    });
</script>

<form action="<?php echo JRoute::_('index.php?option=com_student&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="academicachievement-form" class="form-validate">
    <div class="width-60 fltlft">
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_STUDENT_LEGEND_ACADEMICACHIEVEMENT'); ?></legend>
            <ul class="adminformlist">

                				<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
				<li><?php echo $this->form->getLabel('name'); ?>
				<?php echo $this->form->getInput('name'); ?></li>
				<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
				<li><?php echo $this->form->getLabel('general_information'); ?>
				<?php echo $this->form->getInput('general_information'); ?></li>
				<li><?php echo $this->form->getLabel('sex'); ?>
				<?php echo $this->form->getInput('sex'); ?></li>
				<li><?php echo $this->form->getLabel('date_of_birth'); ?>
				<?php echo $this->form->getInput('date_of_birth'); ?></li>
				<li><?php echo $this->form->getLabel('group'); ?>
				<?php echo $this->form->getInput('group'); ?></li>
				<li><?php echo $this->form->getLabel('student_credit_book'); ?>
				<?php echo $this->form->getInput('student_credit_book'); ?></li>
				<li><?php echo $this->form->getLabel('the_average_score'); ?>
				<?php echo $this->form->getInput('the_average_score'); ?></li>
				<li><?php echo $this->form->getLabel('photo'); ?>
				<?php echo $this->form->getInput('photo'); ?></li>

				<?php if(empty($this->item->created_by)){ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo JFactory::getUser()->id; ?>" />

				<?php } 
				else{ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />

				<?php } ?>				<li><?php echo $this->form->getLabel('state'); ?>
				<?php echo $this->form->getInput('state'); ?></li>


            </ul>
        </fieldset>
    </div>

    

    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
    <div class="clr"></div>

    <style type="text/css">
        /* Temporary fix for drifting editor fields */
        .adminformlist li {
            clear: both;
        }
    </style>
</form>