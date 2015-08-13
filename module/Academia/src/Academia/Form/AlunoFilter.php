<?php
namespace Academia\Form;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;
/**
 * Description of AlunoFilter
 *
 * @author Allan
 */
class AlunoFilter extends InputFilter{
    public function __construct(){
        $nome = new Input('nome');
        $nome->setRequired(true)
             ->getFilterChain()->attach(new StringTrim())
             ->attach(new StripTags());
        $nome->getValidatorChain()->attach(new NotEmpty());
        $this->add($nome);
        
        $email = new Input('email');
        $email->setRequired(true)
             ->getFilterChain()->attach(new StringTrim())
             ->attach(new StripTags());
        $email->getValidatorChain()->attach(new NotEmpty());
        $this->add($email);
    }
}
