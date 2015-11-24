<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;

/**
 * CepbrEstado
 *
 * @ORM\Table(name="cepbr_estado")
 * @ORM\Entity
 */
class CepbrEstado extends AbstractEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="uf", type="string", length=2, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $uf;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=100, nullable=true)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_ibge", type="string", length=10, nullable=true)
     */
    private $codIbge;



    /**
     * Get uf
     *
     * @return string 
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return CepbrEstado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set codIbge
     *
     * @param string $codIbge
     * @return CepbrEstado
     */
    public function setCodIbge($codIbge)
    {
        $this->codIbge = $codIbge;
    
        return $this;
    }

    /**
     * Get codIbge
     *
     * @return string 
     */
    public function getCodIbge()
    {
        return $this->codIbge;
    }
}
