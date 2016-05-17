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



    /**
     * Get idfinalidade
     *
     * @return int
     */
    public function getIdfinalidade()
    {
        return $this->idfinalidade;
    }

    /**
     * Set dscfinalidade
     *
     * @param string $dscfinalidade
     *
     * @return Finalidadeto
     */
    public function setDscfinalidade($dscfinalidade)
    {
        $this->dscfinalidade = $dscfinalidade;
    
        return $this;
    }

    /**
     * Get dscfinalidade
     *
     * @return string
     */
    public function getDscfinalidade()
    {
        return $this->dscfinalidade;
    }
}
