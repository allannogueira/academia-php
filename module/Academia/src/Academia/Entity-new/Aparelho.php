<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aparelho
 *
 * @ORM\Table(name="aparelho", indexes={@ORM\Index(name="FK_id_academi_idx", columns={"id_academia"})})
 * @ORM\Entity
 */
class Aparelho extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_aparelho", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAparelho;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_aparelho", type="string", length=150, nullable=true)
     */
    private $nomeAparelho;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=100, nullable=true)
     */
    private $modelo;

    /**
     * @var \Academia\Entity\Academia
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Academia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_academia", referencedColumnName="id_academia")
     * })
     */
    private $idAcademia;


}

