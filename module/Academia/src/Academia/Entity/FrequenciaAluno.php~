<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FrequenciaAluno
 *
 * @ORM\Table(name="frequencia_aluno", indexes={@ORM\Index(name="fk_Frequencia_aluno_Aluno1_idx", columns={"id_aluno"})})
 * @ORM\Entity
 */
class FrequenciaAluno extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_frequencia_aluno", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idFrequenciaAluno;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_presenca", type="date", nullable=true)
     */
    private $dataPresenca;

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

