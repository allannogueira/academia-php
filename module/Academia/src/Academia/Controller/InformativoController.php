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

class InformativoController extends AbstractController
{
    public function __construct()
    {
        $this->form = 'Academia\Form\InformativoForm';
        $this->controller = 'InformativoController';
        $this->route = 'cadastrarInformativo';
        $this->service = 'Academia\Service\InformativoService';
        $this->entity = 'Academia\Entity\Informativo';
    }
	
}
