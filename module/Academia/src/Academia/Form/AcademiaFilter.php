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
class AcademiaFilter extends InputFilter{
    public function __construct(){
        $nome = new Input('idMatriz');
        $nome->setRequired(false);/*
             ->getFilterChain()->attach(new StringTrim())
             ->attach(new StripTags());
        $nome->getValidatorChain()->attach(new NotEmpty());*/
        $this->add($nome);
    }
}
