<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;
/**
 * CepbrCidade
 *
 * @ORM\Table(name="cepbr_cidade", indexes={@ORM\Index(name="fk_cepbr_cidade_cepbr_estado1_idx", columns={"uf"})})
 * @ORM\Entity
 */
class CepbrCidade extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cidade", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCidade;

    /**
     * @var string
     *
     * @ORM\Column(name="cidade", type="string", length=100, nullable=true)
     */
    private $cidade;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_ibge", type="string", length=10, nullable=true)
     */
    private $codIbge;

    /**
     * @var \Academia\Entity\CepbrEstado
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\CepbrEstado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uf", referencedColumnName="uf")
     * })
     */
    private $uf;



    /**
     * Get idCidade
     *
     * @return integer 
     */
    public function getIdCidade()
    {
        return $this->idCidade;
    }

    /**
     * Set cidade
     *
     * @param string $cidade
     * @return CepbrCidade
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    
        return $this;
    }

    /**
     * Get cidade
     *
     * @return string 
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set codIbge
     *
     * @param string $codIbge
     * @return CepbrCidade
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

    /**
     * Set uf
     *
     * @param \Academia\Entity\CepbrEstado $uf
     * @return CepbrCidade
     */
    public function setUf(\Academia\Entity\CepbrEstado $uf = null)
    {
        $this->uf = $uf;
    
        return $this;
    }

    /**
     * Get uf
     *
     * @return \Academia\Entity\CepbrEstado 
     */
    public function getUf()
    {
        return $this->uf;
    }
}
