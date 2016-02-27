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

class DietaGeralController extends AbstractController
{
    public function __construct()
    {
        $this->form = 'Academia\Form\DietaGeralForm';
        $this->controller = 'DietaGeralController';
        $this->route = 'dietaGeral';
        $this->service = 'Academia\Service\DietaGeralService';
        $this->entity = 'Academia\Entity\DietaGeral';
    }
 
    public function listarAction($where = ""){
         $nome = $this->params()->fromPost("nome");
                
        $where = "where (t.nomeDieta like '%".$nome."%' or '".$nome."' = '') ";
       
        return parent::listarAction($where);
    }
}
