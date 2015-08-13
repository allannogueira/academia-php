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
use Zend\View\Model\JsonModel;

class CepbrEnderecoController extends AbstractController
{
    public function __construct()
    {
         // $this->form = 'Academia\Form\AlunoForm';
        $this->controller = 'CepbrEnderecoController';
       // $this->route = 'cadastrarAluno';
        $this->service = 'Academia\Service\CepbrEnderecoService';
        $this->entity = 'Academia\Entity\CepbrEndereco';
    }
	
    public function getCepAction(){
        
        $query = $this->getEm()->createQuery("SELECT c FROM Academia\Entity\CepbrEndereco c where c.cep='".$_REQUEST['cep']."'");
        
        
        $query = $query->getResult(\Doctrine\ORM\AbstractQuery::HYDRATE_ARRAY);
      //  echo var_dump($query);exit;
        //  echo var_dump($query[0]);exit;
        return new JsonModel($query);
    }
}
