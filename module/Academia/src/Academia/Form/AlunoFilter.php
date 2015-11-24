<?php
namespace Academia\Form;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator;
use JS\Validator\Cpf;
/**
 * Description of AlunoFilter
 *
 * @author Allan
 */
class AlunoFilter extends InputFilter{
    public function __construct(){
        $nome = new Input('nome');
        $nome->setRequired(true);/*
             ->getFilterChain()->attach(new StringTrim())
             ->attach(new StripTags());
        $nome->getValidatorChain()->attach(new NotEmpty());*/
        $this->add($nome);
        
        $email = new Input('email');
        $email->getValidatorChain()
                ->attach(new Validator\EmailAddress());
        // $email->setRequired(true);
       /*      ->getFilterChain()->attach(new StringTrim())
             ->attach(new StripTags());
        $email->getValidatorChain()->attach(new NotEmpty());*/
        $this->add($email);
        
        $cpf = new Input('cpf');
      //  echo var_dump($this->getRequest());
        $validadorCpf = new Cpf(['valid_if_empty' => true]);
        $cpf->getFilterChain()->attach($validadorCpf);//pega classe que foi criada manualmente
        $cpf->setErrorMessage("Cpf inválido!");
        
        //echo var_dump($cpf);
        $this->add($cpf);
    }
}
