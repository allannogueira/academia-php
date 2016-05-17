<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resposta
 *
 * @ORM\Table(name="resposta", indexes={@ORM\Index(name="fk_Resposta_Pergunta1_idx", columns={"id_pergunta"})})
 * @ORM\Entity
 */
class Resposta extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_resposta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idResposta;

    /**
     * @var string
     *
     * @ORM\Column(name="resposta", type="string", length=150, nullable=true)
     */
    private $resposta;

    /**
     * @var \Academia\Entity\Pergunta
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\Pergunta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pergunta", referencedColumnName="id_pergunta")
     * })
     */
    private $idPergunta;


}

