<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Academia\Controller;

use Base\Controller\AbstractController;

class AcademiaController extends AbstractController
{
    public function __construct()
    {
        $this->form = 'Academia\Form\AcademiaForm';
        $this->controller = 'AcademiaController';
        $this->route = 'cadastrarAcademia';
        $this->service = 'Academia\Service\AcademiaService';
        $this->entity = 'Academia\Entity\Academia';
    }
	
}
