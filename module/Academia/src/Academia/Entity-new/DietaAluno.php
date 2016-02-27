<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DietaAluno
 *
 * @ORM\Table(name="dieta_aluno", indexes={@ORM\Index(name="fk_aluno_idx", columns={"id_aluno"}), @ORM\Index(name="fk_dieta_geral_idx", columns={"id_dieta_geral"})})
 * @ORM\Entity
 */
class DietaAluno extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_dieta_aluno", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDietaAluno;

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
     * @var \Academia\Entity\DietaGeral
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\DietaGeral")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_dieta_geral", referencedColumnName="id_dieta_geral")
     * })
     */
    private $idDietaGeral;

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

