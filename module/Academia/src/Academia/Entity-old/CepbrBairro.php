<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;
use Base\Entity\AbstractEntity;
/**
 * CepbrBairro
 *
 * @ORM\Table(name="cepbr_bairro", indexes={@ORM\Index(name="fk_cepbr_bairro_cepbr_cidade1_idx", columns={"id_cidade"})})
 * @ORM\Entity
 */
class CepbrBairro extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_bairro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBairro;

    /**
     * @var string
     *
     * @ORM\Column(name="bairro", type="string", length=50, nullable=true)
     */
    private $bairro;

    /**
     * @var \Academia\Entity\CepbrCidade
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\CepbrCidade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cidade", referencedColumnName="id_cidade")
     * })
     */
    private $idCidade;



    /**
     * Get idBairro
     *
     * @return integer 
     */
    public function getIdBairro()
    {
        return $this->idBairro;
    }

    /**
     * Set bairro
     *
     * @param string $bairro
     * @return CepbrBairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    
        return $this;
    }

    /**
     * Get bairro
     *
     * @return string 
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set idCidade
     *
     * @param \Academia\Entity\CepbrCidade $idCidade
     * @return CepbrBairro
     */
    public function setIdCidade(\Academia\Entity\CepbrCidade $idCidade = null)
    {
        $this->idCidade = $idCidade;
    
        return $this;
    }

    /**
     * Get idCidade
     *
     * @return \Academia\Entity\CepbrCidade 
     */
    public function getIdCidade()
    {
        return $this->idCidade;
    }
}
