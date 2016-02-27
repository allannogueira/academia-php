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

class MedidaController extends AbstractController
{
    public function __construct()
    {
        $this->form = 'Academia\Form\MedidaForm';
        $this->controller = 'TreinoController';
        $this->route = 'medida';
        $this->service = 'Academia\Service\MedidaService';
        $this->entity = 'Academia\Entity\Medida';
        $this->listarAction = "medidasAction";//nome da chamada no webservice
    }
    
   
    

}
