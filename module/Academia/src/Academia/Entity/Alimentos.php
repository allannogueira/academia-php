<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;

/**
 * Alimentos
 *
 * @ORM\Table(name="alimentos")
 * @ORM\Entity
 */
class Alimentos extends AbstractEntity
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
     * @var string
     *
     * @ORM\Column(name="caracteristica", type="string", length=500, nullable=true)
     */
    private $caracteristica;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao_nutricional", type="string", length=500, nullable=true)
     */
    private $descricaoNutricional;



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
     * @return Alimentos
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
     * Set caracteristica
     *
     * @param string $caracteristica
     * @return Alimentos
     */
    public function setCaracteristica($caracteristica)
    {
        $this->caracteristica = $caracteristica;
    
        return $this;
    }

    /**
     * Get caracteristica
     *
     * @return string 
     */
    public function getCaracteristica()
    {
        return $this->caracteristica;
    }

    /**
     * Set descricaoNutricional
     *
     * @param string $descricaoNutricional
     * @return Alimentos
     */
    public function setDescricaoNutricional($descricaoNutricional)
    {
        $this->descricaoNutricional = $descricaoNutricional;
    
        return $this;
    }

    /**
     * Get descricaoNutricional
     *
     * @return string 
     */
    public function getDescricaoNutricional()
    {
        return $this->descricaoNutricional;
    }
}
