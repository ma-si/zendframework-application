<?php

/**
 * Zend Framework Application (http://mateuszsitek.com/projects/zendframework-application).
 *
 * @link      http://github.com/ma-si/zendframework-application for the canonical source repository
 *
 * @copyright Copyright (c) 2006-2016 Aist Internet Technologies (http://aist.pl) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class IndexController.
 */
class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}
