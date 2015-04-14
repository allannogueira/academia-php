<?php

namespace Application\Form;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;

class CadastrarAlunoFilter{
	public function __construct(){
		$nome = new Input('nome');
		$nome->setRequired(true)
			->getFilterChain()
			->attach(new StringTrim())
			->attach(new StripTaps());
			
		$nome->getValidatorChain()->attach(new NotEmpty);
		$this->add($nome);
	}
}

?>