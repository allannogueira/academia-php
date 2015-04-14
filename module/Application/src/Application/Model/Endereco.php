<?php

namespace Application\Model;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
*/
class Aluno {
    /**  
     * @ORM\Id 
    * @ORM\GeneratedValue("AUTO") 
    * @ORM\Column(type="integer")      
    */
    private $id; 
    /** 
     * @ORM\Column(type="string", length=45) 
     */ 
    private $nome;
    /** 
     * @ORM\Column(type="string", length=15) 
     */ 
    private $cpf; 
    /** 
     * @ORM\Column(type="string", length=15) 
     */ 
    private $rg; 
    /** 
     * @ORM\Column(type="string", length=100) 
     */ 
    private $email; 
    /** 
     * @ORM\Column(type="string", length=500) 
     */ 
    private $objetivo;        
    
    
    public function getId() {
        return $this->id; 
    } 
    
    public function setId($id) { 
        $this->id = $id; 
    } 
    
    public function getNome() { 
        return $this->nome; 
    } 
    
    public function setNome($nome) { 
        $this->nome = $nome;
    }
    
    function getCpf() {
        return $this->cpf;
    }

    function getRg() {
        return $this->rg;
    }

    function getEmail() {
        return $this->email;
    }

    function getObjetivo() {
        return $this->objetivo;
    }


    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setObjetivo($objetivo) {
        $this->objetivo = $objetivo;
    }
    
}
