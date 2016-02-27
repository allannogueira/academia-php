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

class TreinoGeralController extends AbstractController
{
    public function __construct()
    {
        $this->form = 'Academia\Form\TreinoGeralForm';
        $this->controller = 'TreinoGeralController';
        $this->route = 'treinoGeral';
        $this->service = 'Academia\Service\TreinoGeralService';
        $this->entity = 'Academia\Entity\TreinoGeral';
    }
    
    
   public function listarAction($where = ""){
        $nome = $this->params()->fromPost("nome");
                
        $where = "where (t.nomeTreino like '%".$nome."%' or '".$nome."' = '') ";
             
        return parent::listarAction($where);
    }
}
