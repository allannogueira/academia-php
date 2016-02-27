<?php

namespace DoctrineORMModule\Proxy\__CG__\Academia\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Aluno extends \Academia\Entity\Aluno implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'idAluno', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'nomeAluno', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'sobrenomeAluno', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'telefoneAluno', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'celularAluno', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'dataNasc', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'cpf', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'rg', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'email', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'idAcademia', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'idEndereco', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'idFinalidade', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'idLogin');
        }

        return array('__isInitialized__', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'idAluno', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'nomeAluno', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'sobrenomeAluno', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'telefoneAluno', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'celularAluno', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'dataNasc', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'cpf', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'rg', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'email', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'idAcademia', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'idEndereco', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'idFinalidade', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'idLogin');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Aluno $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function setIdAluno($idAluno)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdAluno', array($idAluno));

        return parent::setIdAluno($idAluno);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdAluno()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getIdAluno();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdAluno', array());

        return parent::getIdAluno();
    }

    /**
     * {@inheritDoc}
     */
    public function setNomeAluno($nomeAluno)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNomeAluno', array($nomeAluno));

        return parent::setNomeAluno($nomeAluno);
    }

    /**
     * {@inheritDoc}
     */
    public function getNomeAluno()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNomeAluno', array());

        return parent::getNomeAluno();
    }

    /**
     * {@inheritDoc}
     */
    public function setSobrenomeAluno($sobrenomeAluno)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSobrenomeAluno', array($sobrenomeAluno));

        return parent::setSobrenomeAluno($sobrenomeAluno);
    }

    /**
     * {@inheritDoc}
     */
    public function getSobrenomeAluno()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSobrenomeAluno', array());

        return parent::getSobrenomeAluno();
    }

    /**
     * {@inheritDoc}
     */
    public function setTelefoneAluno($telefoneAluno)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTelefoneAluno', array($telefoneAluno));

        return parent::setTelefoneAluno($telefoneAluno);
    }

    /**
     * {@inheritDoc}
     */
    public function getTelefoneAluno()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelefoneAluno', array());

        return parent::getTelefoneAluno();
    }

    /**
     * {@inheritDoc}
     */
    public function setCelularAluno($celularAluno)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCelularAluno', array($celularAluno));

        return parent::setCelularAluno($celularAluno);
    }

    /**
     * {@inheritDoc}
     */
    public function getCelularAluno()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCelularAluno', array());

        return parent::getCelularAluno();
    }

    /**
     * {@inheritDoc}
     */
    public function setDataNasc($dataNasc)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDataNasc', array($dataNasc));

        return parent::setDataNasc($dataNasc);
    }

    /**
     * {@inheritDoc}
     */
    public function getDataNasc()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDataNasc', array());

        return parent::getDataNasc();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdAcademia(\Academia\Entity\Academia $idAcademia)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdAcademia', array($idAcademia));

        return parent::setIdAcademia($idAcademia);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdAcademia()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdAcademia', array());

        return parent::getIdAcademia();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdEndereco(\Academia\Entity\Endereco $idEndereco)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdEndereco', array($idEndereco));

        return parent::setIdEndereco($idEndereco);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdEndereco()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdEndereco', array());

        return parent::getIdEndereco();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdFinalidade(\Academia\Entity\Finalidade $idFinalidade)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdFinalidade', array($idFinalidade));

        return parent::setIdFinalidade($idFinalidade);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdFinalidade()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdFinalidade', array());

        return parent::getIdFinalidade();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdLogin(\Academia\Entity\Login $idLogin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdLogin', array($idLogin));

        return parent::setIdLogin($idLogin);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdLogin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdLogin', array());

        return parent::getIdLogin();
    }

    /**
     * {@inheritDoc}
     */
    public function getCpf()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCpf', array());

        return parent::getCpf();
    }

    /**
     * {@inheritDoc}
     */
    public function setCpf($cpf)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCpf', array($cpf));

        return parent::setCpf($cpf);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', array());

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', array($email));

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getRg()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRg', array());

        return parent::getRg();
    }

    /**
     * {@inheritDoc}
     */
    public function setRg($rg)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRg', array($rg));

        return parent::setRg($rg);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray($em)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'toArray', array($em));

        return parent::toArray($em);
    }

}
