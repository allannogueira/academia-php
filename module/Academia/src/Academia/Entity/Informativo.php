<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;

/**
 * Informativo
 *
 * @ORM\Table(name="informativo", indexes={@ORM\Index(name="fk_informativo_aluno1_idx", columns={"aluno_id"}), @ORM\Index(name="fk_informativo_academia1_idx", columns={"academia_id"})})
 * @ORM\Entity
 */
class Informativo extends AbstractEntity
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
     * @ORM\Column(name="descricao", type="string", length=500, nullable=true)
     */
    private $descricao;

    /**
     * @var integer
     *
     * @ORM\Column(name="academia_id", type="bigint", nullable=true)
     */
    private $academiaId;

    /**
     * @var \Academia\Entity\Aluno
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Aluno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="aluno_id", referencedColumnName="id")
     * })
     */
    private $aluno;



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
     * Set descricao
     *
     * @param string $descricao
     * @return Informativo
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    
        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set academiaId
     *
     * @param integer $academiaId
     * @return Informativo
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

    /**
     * Set aluno
     *
     * @param \Academia\Entity\Aluno $aluno
     * @return Informativo
     */
    public function setAluno(\Academia\Entity\Aluno $aluno = null)
    {
        $this->aluno = $aluno;
    
        return $this;
    }

    /**
     * Get aluno
     *
     * @return \Academia\Entity\Aluno 
     */
    public function getAluno()
    {
        return $this->aluno;
    }
}
