<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;

/**
 * SugestoesReclamacoes
 *
 * @ORM\Table(name="sugestoes_reclamacoes", indexes={@ORM\Index(name="fk_sugestoes_reclamacoes_aluno1_idx", columns={"aluno_id"}), @ORM\Index(name="fk_sugestoes_reclamacoes_sugestoes_reclamacoes_tipo1_idx", columns={"sugestoes_reclamacoes_tipo_id"}), @ORM\Index(name="fk_sugestoes_reclamacoes_academia1_idx", columns={"academia_id"})})
 * @ORM\Entity
 */
class SugestoesReclamacoes extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
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
     * @ORM\Column(name="aluno_id", type="bigint", nullable=true)
     */
    private $alunoId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sugestoes_reclamacoes_tipo_id", type="bigint", nullable=true)
     */
    private $sugestoesReclamacoesTipoId;

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
     * Set descricao
     *
     * @param string $descricao
     * @return SugestoesReclamacoes
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
     * Set alunoId
     *
     * @param integer $alunoId
     * @return SugestoesReclamacoes
     */
    public function setAlunoId($alunoId)
    {
        $this->alunoId = $alunoId;
    
        return $this;
    }

    /**
     * Get alunoId
     *
     * @return integer 
     */
    public function getAlunoId()
    {
        return $this->alunoId;
    }

    /**
     * Set sugestoesReclamacoesTipoId
     *
     * @param integer $sugestoesReclamacoesTipoId
     * @return SugestoesReclamacoes
     */
    public function setSugestoesReclamacoesTipoId($sugestoesReclamacoesTipoId)
    {
        $this->sugestoesReclamacoesTipoId = $sugestoesReclamacoesTipoId;
    
        return $this;
    }

    /**
     * Get sugestoesReclamacoesTipoId
     *
     * @return integer 
     */
    public function getSugestoesReclamacoesTipoId()
    {
        return $this->sugestoesReclamacoesTipoId;
    }

    /**
     * Set academiaId
     *
     * @param integer $academiaId
     * @return SugestoesReclamacoes
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
