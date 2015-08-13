<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;
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
     * @var \Academia\Entity\SugestoesReclamacoesTipo
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\SugestoesReclamacoesTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sugestoes_reclamacoes_tipo_id", referencedColumnName="id")
     * })
     */
    private $sugestoesReclamacoesTipo;



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
     * Set academia
     *
     * @param \Academia\Entity\Academia $academia
     * @return SugestoesReclamacoes
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
     * @return SugestoesReclamacoes
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
     * Set sugestoesReclamacoesTipo
     *
     * @param \Academia\Entity\SugestoesReclamacoesTipo $sugestoesReclamacoesTipo
     * @return SugestoesReclamacoes
     */
    public function setSugestoesReclamacoesTipo(\Academia\Entity\SugestoesReclamacoesTipo $sugestoesReclamacoesTipo = null)
    {
        $this->sugestoesReclamacoesTipo = $sugestoesReclamacoesTipo;
    
        return $this;
    }

    /**
     * Get sugestoesReclamacoesTipo
     *
     * @return \Academia\Entity\SugestoesReclamacoesTipo 
     */
    public function getSugestoesReclamacoesTipo()
    {
        return $this->sugestoesReclamacoesTipo;
    }
}
