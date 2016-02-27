<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exercicio
 *
 * @ORM\Table(name="exercicio", indexes={@ORM\Index(name="fk_Exercicio_Musculo1_idx", columns={"id_musculo"})})
 * @ORM\Entity
 */
class Exercicio extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_exercicio", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idExercicio;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_exercicio", type="string", length=150, nullable=true)
     */
    private $nomeExercicio;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=400, nullable=true)
     */
    private $descricao;

    /**
     * @var \Academia\Entity\Musculo
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Musculo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_musculo", referencedColumnName="id_musculo")
     * })
     */
    private $idMusculo;


}

