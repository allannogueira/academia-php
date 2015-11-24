<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;

/**
 * AlunoHasAparelhoNaoRecomendado
 *
 * @ORM\Table(name="aluno_has_aparelho_nao_recomendado", indexes={@ORM\Index(name="fk_aluno_has_aparelho_nao_recomendado_aparelho_nao_recomend_idx", columns={"aparelho_nao_recomendado_id"}), @ORM\Index(name="fk_aluno_has_aparelho_nao_recomendado_aluno1_idx", columns={"aluno_id"}), @ORM\Index(name="fk_aluno_has_aparelho_nao_recomendado_academia1_idx", columns={"academia_id"})})
 * @ORM\Entity
 */
class AlunoHasAparelhoNaoRecomendado extends AbstractEntity
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
     * @var \Academia\Entity\AparelhoNaoRecomendado
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\AparelhoNaoRecomendado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="aparelho_nao_recomendado_id", referencedColumnName="id")
     * })
     */
    private $aparelhoNaoRecomendado;



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
     * @return AlunoHasAparelhoNaoRecomendado
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
     * @return AlunoHasAparelhoNaoRecomendado
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
     * Set aparelhoNaoRecomendado
     *
     * @param \Academia\Entity\AparelhoNaoRecomendado $aparelhoNaoRecomendado
     * @return AlunoHasAparelhoNaoRecomendado
     */
    public function setAparelhoNaoRecomendado(\Academia\Entity\AparelhoNaoRecomendado $aparelhoNaoRecomendado = null)
    {
        $this->aparelhoNaoRecomendado = $aparelhoNaoRecomendado;
    
        return $this;
    }

    /**
     * Get aparelhoNaoRecomendado
     *
     * @return \Academia\Entity\AparelhoNaoRecomendado 
     */
    public function getAparelhoNaoRecomendado()
    {
        return $this->aparelhoNaoRecomendado;
    }
}
