<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Treino
 *
 * @ORM\Table(name="treino", indexes={@ORM\Index(name="fk_Treino_Aluno1_idx", columns={"id_aluno"}), @ORM\Index(name="fk_Treino_Treino_Geral1_idx", columns={"id_treino_geral"})})
 * @ORM\Entity
 */
class Treino extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_treino", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idTreino;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_ini_vig", type="date", nullable=true)
     */
    private $dataIniVig;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_fim_vig", type="date", nullable=true)
     */
    private $dataFimVig;

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
     * @var \Academia\Entity\TreinoGeral
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\TreinoGeral")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_treino_geral", referencedColumnName="id_treino_geral")
     * })
     */
    private $idTreinoGeral;


}

