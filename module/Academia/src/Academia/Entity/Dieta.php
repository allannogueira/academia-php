<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;

/**
 * Dieta
 *
 * @ORM\Table(name="dieta")
 * @ORM\Entity
 */
class Dieta extends AbstractEntity
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
     * @ORM\Column(name="finalidade", type="string", length=100, nullable=true)
     */
    private $finalidade;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_inicio", type="date", nullable=true)
     */
    private $dataInicio;

    /**
     * @var string
     *
     * @ORM\Column(name="data_fim", type="string", length=45, nullable=true)
     */
    private $dataFim;



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
     * @return Dieta
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
     * Set finalidade
     *
     * @param string $finalidade
     * @return Dieta
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
     * Set dataInicio
     *
     * @param \DateTime $dataInicio
     * @return Dieta
     */
    public function setDataInicio($dataInicio)
    {
        $this->dataInicio = $dataInicio;
    
        return $this;
    }

    /**
     * Get dataInicio
     *
     * @return \DateTime 
     */
    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    /**
     * Set dataFim
     *
     * @param string $dataFim
     * @return Dieta
     */
    public function setDataFim($dataFim)
    {
        $this->dataFim = $dataFim;
    
        return $this;
    }

    /**
     * Get dataFim
     *
     * @return string 
     */
    public function getDataFim()
    {
        return $this->dataFim;
    }
}
