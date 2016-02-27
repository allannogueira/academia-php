<?php

namespace DoctrineORMModule\Proxy\__CG__\Academia\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Alimento extends \Academia\Entity\Alimento implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Academia\\Entity\\Alimento' . "\0" . 'idAlimento', '' . "\0" . 'Academia\\Entity\\Alimento' . "\0" . 'nomeAlimento', '' . "\0" . 'Academia\\Entity\\Alimento' . "\0" . 'descricao', '' . "\0" . 'Academia\\Entity\\Alimento' . "\0" . 'idAcademia', '' . "\0" . 'Academia\\Entity\\Alimento' . "\0" . 'idDietaGeral');
        }

        return array('__isInitialized__', '' . "\0" . 'Academia\\Entity\\Alimento' . "\0" . 'idAlimento', '' . "\0" . 'Academia\\Entity\\Alimento' . "\0" . 'nomeAlimento', '' . "\0" . 'Academia\\Entity\\Alimento' . "\0" . 'descricao', '' . "\0" . 'Academia\\Entity\\Alimento' . "\0" . 'idAcademia', '' . "\0" . 'Academia\\Entity\\Alimento' . "\0" . 'idDietaGeral');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Alimento $proxy) {
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
    public function setIdAlimento($idAlimento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdAlimento', array($idAlimento));

        return parent::setIdAlimento($idAlimento);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdAlimento()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getIdAlimento();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdAlimento', array());

        return parent::getIdAlimento();
    }

    /**
     * {@inheritDoc}
     */
    public function setNomeAlimento($nomeAlimento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNomeAlimento', array($nomeAlimento));

        return parent::setNomeAlimento($nomeAlimento);
    }

    /**
     * {@inheritDoc}
     */
    public function getNomeAlimento()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNomeAlimento', array());

        return parent::getNomeAlimento();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescricao($descricao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescricao', array($descricao));

        return parent::setDescricao($descricao);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescricao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescricao', array());

        return parent::getDescricao();
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
    public function addIdDietaGeral(\Academia\Entity\DietaGeral $idDietaGeral)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addIdDietaGeral', array($idDietaGeral));

        return parent::addIdDietaGeral($idDietaGeral);
    }

    /**
     * {@inheritDoc}
     */
    public function removeIdDietaGeral(\Academia\Entity\DietaGeral $idDietaGeral)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeIdDietaGeral', array($idDietaGeral));

        return parent::removeIdDietaGeral($idDietaGeral);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdDietaGeral()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdDietaGeral', array());

        return parent::getIdDietaGeral();
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