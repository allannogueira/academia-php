<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exercicio
 *
 * @ORM\Table(name="exercicio", indexes={@ORM\Index(name="fk_Exercicio_Musculo1_idx", columns={"id_musculo"}),@ORM\Index(name="fk_Exercicio_Academia_idx", columns={"id_academia"})})
 * @ORM\Entity
 */
class Exercicio extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_exercicio", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idExercicio;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_exercicio", type="string", length=150, nullable=true)
     */
    private $nomeExercicio;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=400, nullable=true)
     */
    private $descricao;

    /**
     * @var \Academia\Entity\Musculo
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Musculo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_musculo", referencedColumnName="id_musculo")
     * })
     */
    private $idMusculo;

    /**
     * @var \Academia\Entity\Academia
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Academia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_academia", referencedColumnName="id_academia")
     * })
     */
    private $idAcademia;

    /**
     * Get idExercicio
     *
     * @return int
     */
    public function getIdExercicio()
    {
        return $this->idExercicio;
    }

    /**
     * Set nomeExercicio
     *
     * @param string $nomeExercicio
     *
     * @return Exercicio
     */
    public function setNomeExercicio($nomeExercicio)
    {
        $this->nomeExercicio = $nomeExercicio;
    
        return $this;
    }

    /**
     * Get nomeExercicio
     *
     * @return string
     */
    public function getNomeExercicio()
    {
        return $this->nomeExercicio;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Exercicio
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
     * Set idMusculo
     *
     * @param \Academia\Entity\Musculo $idMusculo
     *
     * @return Exercicio
     */
    public function setIdMusculo(\Academia\Entity\Musculo $idMusculo = null)
    {
        $this->idMusculo = $idMusculo;
    
        return $this;
    }

    /**
     * Get idMusculo
     *
     * @return \Academia\Entity\Musculo
     */
    public function getIdMusculo()
    {
        return $this->idMusculo;
    }
    
    /**
     * Get idAcademia
     *
     * @return \Academia\Entity\Academia
     */
    public function getIdAcademia()
    {
        return $this->idAcademia;
    }
    
    /**
     * Set idAcademia
     *
     * @param \Academia\Entity\Academia $idAcademia
     *
     * @return Aluno
     */
    public function setIdAcademia(\Academia\Entity\Academia $idAcademia = null)
    {
        $this->idAcademia = $idAcademia;
    
        return $this;
    }
}
