<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;

/**
 * Aparelho
 *
 * @ORM\Table(name="aparelho", indexes={@ORM\Index(name="fk_aparelho_academia1_idx", columns={"academia_id"})})
 * @ORM\Entity
 */
class Aparelho extends AbstractEntity
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
     * @ORM\Column(name="modelo", type="string", length=100, nullable=true)
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="finalidade", type="string", length=500, nullable=true)
     */
    private $finalidade;

    /**
     * @var integer
     *
     * @ORM\Column(name="academia_id", type="bigint", nullable=true)
     */
    private $academiaId;



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
     * @return Aparelho
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
     * Set modelo
     *
     * @param string $modelo
     * @return Aparelho
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    
        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set finalidade
     *
     * @param string $finalidade
     * @return Aparelho
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
     * Set academiaId
     *
     * @param integer $academiaId
     * @return Aparelho
     */
    public function setAcademiaId($academiaId)
    {
        $this->academiaId = $academiaId;
    
        return $this;
    }

    /**
     * Get academiaId
     *
     * @return integer 
     */
    public function getAcademiaId()
    {
        return $this->academiaId;
    }
}
