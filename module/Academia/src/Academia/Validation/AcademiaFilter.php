<?php

namespace Academia\Validation;

use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;

class AcademiaFilter extends InputFilter{
    public function __construct() {
        $nome = new Input("nome");
        $nome->setRequired(true);
        $this->add($nome);
        
        $idMatriz = new Input("idMatriz");
        $idMatriz->setRequired(false);
        $idMatriz->setAllowEmpty(true);
        $this->add($idMatriz);
        
        $cnpj = new Input('cnpj');

        $validadorCnpj = new \JS\Validator\Cnpj(['valid_if_empty' => false]);        
        $cnpj->getFilterChain()
                ->attach($validadorCnpj);//pega classe que foi criada manualmente   
        $cnpj->setErrorMessage("Cnpj inválido!");
        $this->add($cnpj);
    }
}