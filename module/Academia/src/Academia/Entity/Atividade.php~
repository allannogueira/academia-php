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
     * @ORM\Column(name="mes", type="string", length=2, nullable=true)
     */
    private $mes;

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


}

