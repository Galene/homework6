<?php
/**
 * @version     1.0.2
 * @package     com_student
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Gala <galina.ck@gmail.com> - http://
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of Student.
 */
class StudentViewAcademicachievements extends JViewLegacy
{
	function display($cachable = false, $urlparams = false)
	{
        $model =& $this->getModel();
        $detail = $model->getrecords();

	}
    	
}
