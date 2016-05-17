<?php

namespace ZfcUserDoctrineORM\Entity;

use Academia\Entity\Login as ZfcUserEntity;

class Login //extends ZfcUserEntity
{
  /**
     * @var integer
     *
     * @ORM\Column(name="id_login", type="integer",nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * 
     * @ORM\Column(name="email", type="string", length=100)
     */
    public $email;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=16)
     */
    private $senha;
  
    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->senha;
    }

    function setId($idLogin) {
        $this->id = $idLogin;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        
        $this->senha = $password;
    }


    
}
