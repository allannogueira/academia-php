<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TreinoExercicio
 *
 * @ORM\Table(name="treino_exercicio", indexes={@ORM\Index(name="id_exercicio_idx", columns={"id_exercicio"}), @ORM\Index(name="FK_id_treinoGeral_idx", columns={"id_treino_geral"})})
 * @ORM\Entity
 */
class TreinoExercicio extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_treino_exercicio", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTreinoExercicio;

    /**
     * @var int
     *
     * @ORM\Column(name="serie", type="integer", nullable=true)
     */
    private $serie;

    /**
     * @var int
     *
     * @ORM\Column(name="repeticao", type="integer", nullable=true)
     */
    private $repeticao;

    /**
     * @var int
     *
     * @ORM\Column(name="intervalo", type="integer", nullable=true)
     */
    private $intervalo;

    /**
     * @var int
     *
     * @ORM\Column(name="peso", type="integer", nullable=true)
     */
    private $peso;

    /**
     * @var \Academia\Entity\Exercicio
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Exercicio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_exercicio", referencedColumnName="id_exercicio")
     * })
     */
    private $idExercicio;

    /**
     * @var \Academia\Entity\TreinoGeral
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\TreinoGeral")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_treino_geral", referencedColumnName="id_treino_geral")
     * })
     */
    private $idTreinoGeral;



    /**
     * Get idTreinoExercicio
     *
     * @return int
     */
    public function getIdTreinoExercicio()
    {
        return $this->idTreinoExercicio;
    }

    /**
     * Set serie
     *
     * @param int $serie
     *
     * @return TreinoExercicio
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    
        return $this;
    }

    /**
     * Get serie
     *
     * @return int
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * Set repeticao
     *
     * @param int $repeticao
     *
     * @return TreinoExercicio
     */
    public function setRepeticao($repeticao)
    {
        $this->repeticao = $repeticao;
    
        return $this;
    }

    /**
     * Get repeticao
     *
     * @return int
     */
    public function getRepeticao()
    {
        return $this->repeticao;
    }

    /**
     * Set intervalo
     *
     * @param int $intervalo
     *
     * @return TreinoExercicio
     */
    public function setIntervalo($intervalo)
    {
        $this->intervalo = $intervalo;
    
        return $this;
    }

    /**
     * Get intervalo
     *
     * @return int
     */
    public function getIntervalo()
    {
        return $this->intervalo;
    }

    /**
     * Set peso
     *
     * @param int $peso
     *
     * @return TreinoExercicio
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;
    
        return $this;
    }

    /**
     * Get peso
     *
     * @return int
     */
    public function getPeso()
    {
        return $this->peso;
    }



    /**
     * Set idExercicio
     *
     * @param \Academia\Entity\Exercicio $idExercicio
     *
     * @return TreinoExercicio
     */
    public function setIdExercicio(\Academia\Entity\Exercicio $idExercicio = null)
    {
        $this->idExercicio = $idExercicio;
    
        return $this;
    }

    /**
     * Get idExercicio
     *
     * @return \Academia\Entity\Exercicio
     */
    public function getIdExercicio()
    {
        return $this->idExercicio;
    }

    /**
     * Set idTreinoGeral
     *
     * @param \Academia\Entity\TreinoGeral $idTreinoGeral
     *
     * @return TreinoExercicio
     */
    public function setIdTreinoGeral(\Academia\Entity\TreinoGeral $idTreinoGeral = null)
    {
        $this->idTreinoGeral = $idTreinoGeral;
    
        return $this;
    }

    /**
     * Get idTreinoGeral
     *
     * @return \Academia\Entity\TreinoGeral
     */
    public function getIdTreinoGeral()
    {
        return $this->idTreinoGeral;
    }
}
