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
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_exercicio", type="string", length=255, nullable=true)
     */
    private $nomeExercicio;

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


}

