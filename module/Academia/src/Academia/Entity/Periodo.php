<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aluno
 *
 * @ORM\Table(name="periodo")
 * @ORM\Entity
 */
class Periodo extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_periodo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPeriodo;

    /**
     * @var string
     *
     * @ORM\Column(name="periodo", type="string", length=150, nullable=true)
     */
    private $periodo;
    
    function getIdPeriodo() {
        return $this->idPeriodo;
    }

    function getPeriodo() {
        return $this->periodo;
    }

    function setIdPeriodo($idPeriodo) {
        $this->idPeriodo = $idPeriodo;
    }

    function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }


}