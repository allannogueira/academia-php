<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;
use Base\Entity\AbstractEntity;
/**
 * Exercicios
 *
 * @ORM\Table(name="exercicios")
 * @ORM\Entity
 */
class Exercicios extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=100, nullable=true)
     */
    private $nome;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ar_livre", type="boolean", nullable=true)
     */
    private $arLivre;

    /**
     * @var string
     *
     * @ORM\Column(name="finalidade", type="string", length=500, nullable=true)
     */
    private $finalidade;

    /**
     * @var string
     *
     * @ORM\Column(name="como_fazer", type="string", length=500, nullable=true)
     */
    private $comoFazer;

    /**
     * @var string
     *
     * @ORM\Column(name="peso", type="string", length=45, nullable=true)
     */
    private $peso;

    /**
     * @var string
     *
     * @ORM\Column(name="serie", type="string", length=45, nullable=true)
     */
    private $serie;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Exercicios
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    
        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set arLivre
     *
     * @param boolean $arLivre
     * @return Exercicios
     */
    public function setArLivre($arLivre)
    {
        $this->arLivre = $arLivre;
    
        return $this;
    }

    /**
     * Get arLivre
     *
     * @return boolean 
     */
    public function getArLivre()
    {
        return $this->arLivre;
    }

    /**
     * Set finalidade
     *
     * @param string $finalidade
     * @return Exercicios
     */
    public function setFinalidade($finalidade)
    {
        $this->finalidade = $finalidade;
    
        return $this;
    }

    /**
     * Get finalidade
     *
     * @return string 
     */
    public function getFinalidade()
    {
        return $this->finalidade;
    }

    /**
     * Set comoFazer
     *
     * @param string $comoFazer
     * @return Exercicios
     */
    public function setComoFazer($comoFazer)
    {
        $this->comoFazer = $comoFazer;
    
        return $this;
    }

    /**
     * Get comoFazer
     *
     * @return string 
     */
    public function getComoFazer()
    {
        return $this->comoFazer;
    }

    /**
     * Set peso
     *
     * @param string $peso
     * @return Exercicios
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;
    
        return $this;
    }

    /**
     * Get peso
     *
     * @return string 
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set serie
     *
     * @param string $serie
     * @return Exercicios
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    
        return $this;
    }

    /**
     * Get serie
     *
     * @return string 
     */
    public function getSerie()
    {
        return $this->serie;
    }
}
