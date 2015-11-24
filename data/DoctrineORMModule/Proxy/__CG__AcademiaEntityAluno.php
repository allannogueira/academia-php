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
            return array('__isInitialized__', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'id', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'nome', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'cpf', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'rg', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'email', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'objetivo', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'usuario', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'senha', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'academiaId', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'dieta', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'endereco', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'medidas', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'treino', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'telefone');
        }

        return array('__isInitialized__', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'id', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'nome', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'cpf', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'rg', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'email', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'objetivo', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'usuario', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'senha', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'academiaId', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'dieta', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'endereco', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'medidas', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'treino', '' . "\0" . 'Academia\\Entity\\Aluno' . "\0" . 'telefone');
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
    public function setId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', array($id));

        return parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setNome($nome)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNome', array($nome));

        return parent::setNome($nome);
    }

    /**
     * {@inheritDoc}
     */
    public function getNome()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNome', array());

        return parent::getNome();
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
    public function getCpf()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCpf', array());

        return parent::getCpf();
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
    public function getRg()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRg', array());

        return parent::getRg();
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
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', array());

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setObjetivo($objetivo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setObjetivo', array($objetivo));

        return parent::setObjetivo($objetivo);
    }

    /**
     * {@inheritDoc}
     */
    public function getObjetivo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getObjetivo', array());

        return parent::getObjetivo();
    }

    /**
     * {@inheritDoc}
     */
    public function setUsuario($usuario)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUsuario', array($usuario));

        return parent::setUsuario($usuario);
    }

    /**
     * {@inheritDoc}
     */
    public function getUsuario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsuario', array());

        return parent::getUsuario();
    }

    /**
     * {@inheritDoc}
     */
    public function setSenha($senha)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSenha', array($senha));

        return parent::setSenha($senha);
    }

    /**
     * {@inheritDoc}
     */
    public function getSenha()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSenha', array());

        return parent::getSenha();
    }

    /**
     * {@inheritDoc}
     */
    public function setAcademiaId($academiaId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAcademiaId', array($academiaId));

        return parent::setAcademiaId($academiaId);
    }

    /**
     * {@inheritDoc}
     */
    public function getAcademiaId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAcademiaId', array());

        return parent::getAcademiaId();
    }

    /**
     * {@inheritDoc}
     */
    public function setDieta(\Academia\Entity\Dieta $dieta)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDieta', array($dieta));

        return parent::setDieta($dieta);
    }

    /**
     * {@inheritDoc}
     */
    public function getDieta()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDieta', array());

        return parent::getDieta();
    }

    /**
     * {@inheritDoc}
     */
    public function setEndereco(\Academia\Entity\Endereco $endereco)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEndereco', array($endereco));

        return parent::setEndereco($endereco);
    }

    /**
     * {@inheritDoc}
     */
    public function getEndereco()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEndereco', array());

        return parent::getEndereco();
    }

    /**
     * {@inheritDoc}
     */
    public function setMedidas(\Academia\Entity\Medidas $medidas)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMedidas', array($medidas));

        return parent::setMedidas($medidas);
    }

    /**
     * {@inheritDoc}
     */
    public function getMedidas()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMedidas', array());

        return parent::getMedidas();
    }

    /**
     * {@inheritDoc}
     */
    public function setTreino(\Academia\Entity\Treino $treino)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTreino', array($treino));

        return parent::setTreino($treino);
    }

    /**
     * {@inheritDoc}
     */
    public function getTreino()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTreino', array());

        return parent::getTreino();
    }

    /**
     * {@inheritDoc}
     */
    public function addTelefone(\Academia\Entity\Telefone $telefone)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addTelefone', array($telefone));

        return parent::addTelefone($telefone);
    }

    /**
     * {@inheritDoc}
     */
    public function removeTelefone(\Academia\Entity\Telefone $telefone)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeTelefone', array($telefone));

        return parent::removeTelefone($telefone);
    }

    /**
     * {@inheritDoc}
     */
    public function getTelefone()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelefone', array());

        return parent::getTelefone();
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'toArray', array());

        return parent::toArray();
    }

}
