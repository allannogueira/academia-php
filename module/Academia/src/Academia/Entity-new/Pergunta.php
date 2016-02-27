<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pergunta
 *
 * @ORM\Table(name="pergunta", indexes={@ORM\Index(name="fk_Pergunta_Academia1_idx", columns={"id_academia"})})
 * @ORM\Entity
 */
class Pergunta extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_pergunta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idPergunta;

    /**
     * @var string
     *
     * @ORM\Column(name="pergunta", type="string", length=200, nullable=true)
     */
    private $pergunta;

    /**
     * @var \Academia\Entity\Academia
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\Academia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_academia", referencedColumnName="id_academia")
     * })
     */
    private $idAcademia;


}

