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
     * @var integer
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
     * @ORM\Column(name="mes", type="string", length=2, nullable=true)
     */
    private $mes;

    /**
     * @var \Academia\Entity\Aluno
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\Aluno", cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aluno", referencedColumnName="id_aluno")
     * })
     */
    private $idAluno;



    /**
     * Set idAtividade
     *
     * @param integer $idAtividade
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
     * @return integer 
     */
    public function getIdAtividade()
    {
        return $this->idAtividade;
    }

    /**
     * Set tempo
     *
     * @param string $tempo
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
     * Set mes
     *
     * @param string $mes
     * @return Atividade
     */
    public function setMes($mes)
    {
        $this->mes = $mes;
    
        return $this;
    }

    /**
     * Get mes
     *
     * @return string 
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set idAluno
     *
     * @param \Academia\Entity\Aluno $idAluno
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
}
