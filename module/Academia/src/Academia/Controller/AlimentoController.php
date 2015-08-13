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

class AlimentoController extends AbstractController
{
    public function __construct()
    {
        $this->form = 'Academia\Form\AlimentoForm';
        $this->controller = 'AlimentoController';
        $this->route = 'cadastrarAlimento';
        $this->service = 'Academia\Service\AlimentoService';
        $this->entity = 'Academia\Entity\Alimentos';
    }
	
}
