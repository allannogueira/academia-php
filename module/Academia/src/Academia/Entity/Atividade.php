<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Atividade
 *
 * @ORM\Table(name="atividade", indexes={@ORM\Index(name="fk_Atividade_Aluno1_idx", columns={"id_aluno"})})
 * @ORM\Entity
 */
class Atividade extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_atividade", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idAtividade;

    /**
     * @var string
     *
     * @ORM\Column(name="tempo", type="string", length=45, nullable=true)
     */
    private $tempo;

    /**
     * @var string
     *
     * @ORM\Column(name="distancia", type="string", length=45, nullable=true)
     */
    private $distancia;

    /**
     * @var string
     *
     * @ORM\Column(name="competencia", type="string",  nullable=true)
     */
    private $competencia;
    
    /**
     * @var string
     *
     * @ORM\Column(name="calorias", type="string",  nullable=true)
     */
    private $calorias;

    /**
     * @var \Academia\Entity\Aluno
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\Aluno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aluno", referencedColumnName="id_aluno")
     * })
     */
    private $idAluno;



    /**
     * Set idAtividade
     *
     * @param int $idAtividade
     *
     * @return Atividade
     */
    public function setIdAtividade($idAtividade)
    {
        $this->idAtividade = $idAtividade;
    
        return $this;
    }

    /**
     * Get idAtividade
     *
     * @return int
     */
    public function getIdAtividade()
    {
        return $this->idAtividade;
    }

    /**
     * Set tempo
     *
     * @param string $tempo
     *
     * @return Atividade
     */
    public function setTempo($tempo)
    {
        $this->tempo = $tempo;
    
        return $this;
    }

    /**
     * Get tempo
     *
     * @return string
     */
    public function getTempo()
    {
        return $this->tempo;
    }

    /**
     * Set distancia
     *
     * @param string $distancia
     *
     * @return Atividade
     */
    public function setDistancia($distancia)
    {
        $this->distancia = $distancia;
    
        return $this;
    }

    /**
     * Get distancia
     *
     * @return string
     */
    public function getDistancia()
    {
        return $this->distancia;
    }


    /**
     * Set idAluno
     *
     * @param \Academia\Entity\Aluno $idAluno
     *
     * @return Atividade
     */
    public function setIdAluno(\Academia\Entity\Aluno $idAluno)
    {
        $this->idAluno = $idAluno;
    
        return $this;
    }

    /**
     * Get idAluno
     *
     * @return \Academia\Entity\Aluno
     */
    public function getIdAluno()
    {
        return $this->idAluno;
    }
    
    function getCompetencia() {
        return $this->competencia;
    }

    function getCalorias() {
        return $this->calorias;
    }

    function setCompetencia($competencia) {
        $this->competencia = $competencia;
    }

    function setCalorias($calorias) {
        $this->calorias = $calorias;
    }


}
