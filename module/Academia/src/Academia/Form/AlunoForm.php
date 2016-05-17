<?php
namespace Academia\Form;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Zend\Form\Form;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Academia\Entity\Aluno;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Element\File;

class AlunoForm extends Form implements ObjectManagerAwareInterface
{
    private $objectManager;
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name,$options);
        
    }
    
    public function init(){
        $this->setAttribute('class', 'form-inline');
        $this
            ->setHydrator(new DoctrineHydrator($this->getObjectManager()))
            ->setObject(new Aluno())
        ;
        
        $this->setInputFilter(new \Academia\Validation\AlunoFilter($this->getObjectManager()));
        
        $this->setLabel('Dados do Aluno');
        $this->add([
           'name' => 'idAluno',
           'type' => 'hidden'
        ]);
       
        $this->add([
           'name' => 'fotoWebcan',
           'type' => 'hidden'
        ]);
        
        $this->add(array(
            'name' => 'foto',
            'type'  => 'Zend\Form\Element\Image',
            'attributes' => array(
                
                'src'   => "/img/sem-foto.png",
                'height'=> '100',
                'width' => '100',
                'border'=> '0',
                'alt'   => '',
                'class' => 'foto-perfil'
            ),
        ));

        $this->add([
           'name' => 'btnFoto',
           'type' => 'button',
           'options' => [
               'label' => 'Tirar Foto',
           ],
            'attributes' => [
                "data-toggle" => "modal",
                "data-target" => "#myModal",
                "class" => "btn btn-primary"
                
            ]
       ]);
        
        $arquivo = new File('arquivo');
        $arquivo->setLabel('Escolher Foto');
        $arquivo->setAttributes(["class" => "form-control"]);
        $this->add($arquivo);
        
        
        
         
          $this->add([
           'name' => 'nomeAluno',
           'type' => 'text',
           'options' => [
               'label' => 'Nome',
           ],
            'attributes' => [
                'required' => 'required'
            ]
       ]);
       
       $this->add([
           'name' => 'sobrenomeAluno',
           'type' => 'text',
           'options' => [
               'label' => 'Sobrenome',
           ],
            'attributes' => [
                'required' => 'required'
            ]
       ]);
       
       $this->add([
           'name' => 'telefoneAluno',
           'type' => 'text',
           'options' => [
               'label' => 'Telefone',
           ]
       ]);
       
       $this->add([
           'name' => 'celularAluno',
           'type' => 'text',
           'options' => [
               'label' => 'Celular',
           ]
       ]);
       
       $this->add([
           'name' => 'dataNasc',
           'type' => 'date',
           'options' => [
               'label' => 'Data de Nascimento',
           ],
            'attributes' => [
                'required' => 'required'
            ]
       ]);
       
        $this->add([
            'name' => 'cpfAluno',
            'type' => 'text',
            'options' => [
                'label' => 'CPF',
            ],
             'attributes' => [
                 'required' => 'required'
             ]
        ]);
       
       $this->add([
           'name' => 'rgAluno',
           'type' => 'text',
           'options' => [
               'label' => 'RG',
           ],
            'attributes' => [
                'required' => 'required'
            ]
       ]);
       
        $this->add(array(
             'type' => 'Academia\Form\AcademiaFieldset'
         ));

         $this->add(array(
             'type' => 'Academia\Form\FinalidadeFieldset'
         ));
       
       $this->add(array(
             'type' => 'Academia\Form\LoginFieldset'
         ));
       
       $this->add(array(
             'type' => 'Academia\Form\EnderecoFieldset'
         ));
      //  $this->add(new EnderecoFieldset());
       
       
       
       $this->add(array(
             'type' => 'Zend\Form\Element\Csrf',
             'name' => 'csrf',
         ));
       
       $this->add([
           'name' => 'submit',
           'type' => 'submit',
           'options' => [
               'label' => 'Salvar',
           ],
           'attributes' => [
               'class' => 'btn-primary'
           ]
       ]);
       
       
       
       //Validação CPF
      //  echo var_dump($this->getRequest());
       
        $validadorCpf = new \JS\Validator\Cpf(['valid_if_empty' => true]);
        
        // Now get the input filter of the form, and add the validator to the email input
        $cpf = $this->getInputFilter()->get('cpfAluno');
        
       $cpfUnique = new \DoctrineModule\Validator\UniqueObject(array(
            'use_context'       => true,
            'object_repository' => $this->getObjectManager()->getRepository('Academia\Entity\Aluno'),
            'fields'            => 'cpfAluno',
            'object_manager' => $this->getObjectManager(),            
            'fields' => 'cpfAluno',
            'messages' => array(
                'objectNotUnique' => 'este CPF já existe!',
            )
        ));
         $cpf->getValidatorChain()
                 ->attach($validadorCpf)//pega classe que foi criada manualmente
                      ->attach($cpfUnique);
         
    }
    
    public function bind($object, $flags = 17){
        parent::bind($object,$flags);
        //$uf = $this->getObject()->getIdEndereco()->getCepbrEnderecoCep()->getIdCidade()->getUf()->getUf();
          //header("Content-Type: image/jpg");
        if($this->getObject()->getArquivo() != ""){
            $image =  stream_get_contents($this->getObject()->getArquivo());
            //echo $image;
            if($this->getObject()->getArquivo() != ""){
                $foto = str_replace("./public", "", $this->getObject()->getArquivo());
                $this->getElements()['foto']->setAttribute("src","$image");
            }
        }
        
    }
    
    public function getObjectManager() {
        return $this->objectManager;
    }

    public function setObjectManager(ObjectManager $objectManager) {
        $this->objectManager = $objectManager;
    }
}
