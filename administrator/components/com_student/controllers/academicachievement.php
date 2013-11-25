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

jimport('joomla.application.component.controllerform');

/**
 * Academicachievement controller class.
 */
class StudentControllerAcademicachievement extends JControllerForm
{

    function __construct() {
        $this->view_list = 'academicachievements';
        parent::__construct();
    }

}