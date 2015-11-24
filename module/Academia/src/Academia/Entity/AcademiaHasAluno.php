<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;

/**
 * AcademiaHasAluno
 *
 * @ORM\Table(name="academia_has_aluno", indexes={@ORM\Index(name="fk_academia_has_aluno_aluno1_idx", columns={"aluno_id"}), @ORM\Index(name="fk_academia_has_aluno_academia1_idx", columns={"academia_id"})})
 * @ORM\Entity
 */
class AcademiaHasAluno extends AbstractEntity
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
     * @var \Academia\Entity\Academia
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Academia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="academia_id", referencedColumnName="id")
     * })
     */
    private $academia;

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
     * Set academia
     *
     * @param \Academia\Entity\Academia $academia
     * @return AcademiaHasAluno
     */
    public function setAcademia(\Academia\Entity\Academia $academia = null)
    {
        $this->academia = $academia;
    
        return $this;
    }

    /**
     * Get academia
     *
     * @return \Academia\Entity\Academia 
     */
    public function getAcademia()
    {
        return $this->academia;
    }

    /**
     * Set aluno
     *
     * @param \Academia\Entity\Aluno $aluno
     * @return AcademiaHasAluno
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
