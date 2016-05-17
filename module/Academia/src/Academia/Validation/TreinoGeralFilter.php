<?php

namespace Academia\Validation;

use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;

class TreinoGeralFilter extends InputFilter{
    public function __construct() {
        $nome = new Input("nomeTreino");
        $nome->setRequired(true);
        $this->add($nome);        
    }
}