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
     * @var \Academia\Entity\TreinoGeral
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\TreinoGeral",cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_treino_geral", referencedColumnName="id_treino_geral")
     * })
     */
    private $idTreinoGeral;

    /**
     * @var \Academia\Entity\Exercicio
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Exercicio",cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_exercicio", referencedColumnName="id_exercicio")
     * })
     */
    private $idExercicio;

    function getIdTreinoExercicio() {
        return $this->idTreinoExercicio;
    }

    function getSerie() {
        return $this->serie;
    }

    function getRepeticao() {
        return $this->repeticao;
    }

    function getIntervalo() {
        return $this->intervalo;
    }

    function getPeso() {
        return $this->peso;
    }

    function getIdTreinoGeral() {
        return $this->idTreinoGeral;
    }

    function getIdExercicio() {
        return $this->idExercicio;
    }

    function setIdTreinoExercicio($idTreinoExercicio) {
        $this->idTreinoExercicio = $idTreinoExercicio;
    }

    function setSerie($serie) {
        $this->serie = $serie;
    }

    function setRepeticao($repeticao) {
        $this->repeticao = $repeticao;
    }

    function setIntervalo($intervalo) {
        $this->intervalo = $intervalo;
    }

    function setPeso($peso) {
        $this->peso = $peso;
    }

    function setIdTreinoGeral(\Academia\Entity\TreinoGeral $idTreinoGeral) {
        $this->idTreinoGeral = $idTreinoGeral;
    }

    function setIdExercicio(\Academia\Entity\Exercicio $idExercicio) {
        $this->idExercicio = $idExercicio;
    }



}

