<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medida
 *
 * @ORM\Table(name="medida", indexes={@ORM\Index(name="fk_Medida_Aluno1_idx", columns={"id_aluno"})})
 * @ORM\Entity
 */
class Medida extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_medida", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMedida;

    /**
     * @var int
     *
     * @ORM\Column(name="altura", type="integer", nullable=true)
     */
    private $altura;

    /**
     * @var int
     *
     * @ORM\Column(name="peso", type="integer", nullable=true)
     */
    private $peso;

    /**
     * @var int
     *
     * @ORM\Column(name="braco_d", type="integer", nullable=true)
     */
    private $bracoD;

    /**
     * @var int
     *
     * @ORM\Column(name="braco_e", type="integer", nullable=true)
     */
    private $bracoE;

    /**
     * @var int
     *
     * @ORM\Column(name="anti_braco_d", type="integer", nullable=true)
     */
    private $antiBracoD;

    /**
     * @var int
     *
     * @ORM\Column(name="anti_braco_e", type="integer", nullable=true)
     */
    private $antiBracoE;

    /**
     * @var int
     *
     * @ORM\Column(name="coxa_d", type="integer", nullable=true)
     */
    private $coxaD;

    /**
     * @var int
     *
     * @ORM\Column(name="coxa_e", type="integer", nullable=true)
     */
    private $coxaE;

    /**
     * @var int
     *
     * @ORM\Column(name="panturrilha_d", type="integer", nullable=true)
     */
    private $panturrilhaD;

    /**
     * @var int
     *
     * @ORM\Column(name="panturrilha_e", type="integer", nullable=true)
     */
    private $panturrilhaE;

    /**
     * @var int
     *
     * @ORM\Column(name="peitoral_maior", type="integer", nullable=true)
     */
    private $peitoralMaior;

    /**
     * @var int
     *
     * @ORM\Column(name="peitoral_menor", type="integer", nullable=true)
     */
    private $peitoralMenor;

    /**
     * @var string
     *
     * @ORM\Column(name="imc", type="string", length=3, nullable=true)
     */
    private $imc;

    /**
     * @var string
     *
     * @ORM\Column(name="mass_gordura", type="string", length=3, nullable=true)
     */
    private $massGordura;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_ini_vig", type="date", nullable=true)
     */
    private $dataIniVig;

    /**
     * @var string
     *
     * @ORM\Column(name="pressao", type="string", length=45, nullable=true)
     */
    private $pressao;

    /**
     * @var string
     *
     * @ORM\Column(name="bat_cardiaco", type="string", length=45, nullable=true)
     */
    private $batCardiaco;

    /**
     * @var string
     *
     * @ORM\Column(name="abdomen", type="string", length=45, nullable=true)
     */
    private $abdomen;

    /**
     * @var string
     *
     * @ORM\Column(name="costas", type="string", length=45, nullable=true)
     */
    private $costas;

    /**
     * @var string
     *
     * @ORM\Column(name="quadril", type="string", length=45, nullable=true)
     */
    private $quadril;

    /**
     * @var \Academia\Entity\Aluno
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Aluno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aluno", referencedColumnName="id_aluno")
     * })
     */
    private $idAluno;


}

