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

class ExercicioController extends AbstractController
{
    public function __construct()
    {
        $this->form = 'Academia\Form\ExercicioForm';
        $this->controller = 'ExercicioController';
        $this->route = 'exercicio';
        $this->service = 'Academia\Service\ExercicioService';
        $this->entity = 'Academia\Entity\Exercicio';
    }
    
    public function listarAction($where = ""){
        $nome = $this->params()->fromPost("nome");
                
        $where = "where (t.nomeExercicio like '%".$nome."%' or '".$nome."' = '') ";
             
        return parent::listarAction($where);
    }
}
