<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\CadastrarAluno; 
use Application\Form\CadastrarAcademia; 

class CadastrarAlunoController extends AbstractActionController
{
    public function cadastrarAlunoAction()
    {
         $form = new CadastrarAluno();
		 return array('form' => $form);
    }

    public function addAction(){
          $request = $this->getRequest(); 
        $result = array(); 
        if($request->isPost()) { 
            try{ 
                $aluno = new \Application\Model\Aluno(); 
                $aluno->setNome($request->getPost("nome")); 
                $aluno->setCpf($request->getPost("cpf")); 
                $aluno->setRg($request->getPost("rg")); 
                $aluno->setEmail($request->getPost("email")); 
                $aluno->setObjetivo($request->getPost("objetivo")); 
                
                
                $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager"); 
                $em->persist($aluno); 
                $em->flush(); 
                return $this->redirect()->toRoute('cadastrarAluno'); 
                
            } catch (Exception $e){ 
                
            } 
            
        }
    }
    
    public function listarAction(){
        $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager"); 
        $lista = $em->getRepository("Application\Model\Aluno")->findAll();         
        return new ViewModel(array('lista' => $lista));
    }
    
    public function excluirAction() { 
        $id = $this->params()->fromRoute("id", 0); 
       // echo var_dump($id);
        $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager"); 
        $aluno = $em->find("Application\Model\Aluno", $id); 
        $em->remove($aluno); 
        $em->flush(); 
        return $this->redirect()->toRoute('cadastrarAluno',['action'=>'listar']); 
    } 
    
    public function editarAction() { 
        $id = $this->params()->fromRoute("id", 0); 
        $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager"); 
        $funcionario = $em->find("Application\Model\Funcionario", $id); 
        return new ViewModel(array('f' => $funcionario));
    } 



}
