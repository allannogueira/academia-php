<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;
use Base\Entity\AbstractEntity;

/**
 * AlunoHasTelefone
 *
 * @ORM\Table(name="aluno_has_telefone", indexes={@ORM\Index(name="fk_aluno_has_telefone_telefone1_idx", columns={"telefone_id"}), @ORM\Index(name="fk_aluno_has_telefone_aluno1_idx", columns={"aluno_id"})})
 * @ORM\Entity
 */
class AlunoHasTelefone extends AbstractEntity
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
     * @var \Academia\Entity\Aluno
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Aluno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="aluno_id", referencedColumnName="id")
     * })
     */
    private $aluno;

    /**
     * @var \Academia\Entity\Telefone
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Telefone")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="telefone_id", referencedColumnName="id")
     * })
     */
    private $telefone;



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
     * Set aluno
     *
     * @param \Academia\Entity\Aluno $aluno
     * @return AlunoHasTelefone
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

    /**
     * Set telefone
     *
     * @param \Academia\Entity\Telefone $telefone
     * @return AlunoHasTelefone
     */
    public function setTelefone(\Academia\Entity\Telefone $telefone = null)
    {
        $this->telefone = $telefone;
    
        return $this;
    }

    /**
     * Get telefone
     *
     * @return \Academia\Entity\Telefone 
     */
    public function getTelefone()
    {
        return $this->telefone;
    }
}
