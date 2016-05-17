<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alimento
 *
 * @ORM\Table(name="alimento", indexes={@ORM\Index(name="fk_Alimento_Academia1_idx", columns={"id_academia"})})
 * @ORM\Entity
 */
class Alimento extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_alimento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAlimento;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_alimento", type="string", length=150, nullable=true)
     */
    private $nomeAlimento;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=150, nullable=true)
     */
    private $descricao;

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

