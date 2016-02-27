<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Finalidadeto
 *
 * @ORM\Table(name="FinalidadeTO")
 * @ORM\Entity
 */
class Finalidadeto extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="idFinalidade", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfinalidade;

    /**
     * @var string
     *
     * @ORM\Column(name="dscFinalidade", type="string", length=255, nullable=true)
     */
    private $dscfinalidade;


}

