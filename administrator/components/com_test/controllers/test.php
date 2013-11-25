<?php
/**
 * @version     1.0.0
 * @package     com_test
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Gala <galina.ck@gmail.com> - http://
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Test controller class.
 */
class TestControllerTest extends JControllerForm
{

    function __construct() {
        $this->view_list = 'tests';
        parent::__construct();
    }

}