<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CepbrBairro
 *
 * @ORM\Table(name="cepbr_bairro", indexes={@ORM\Index(name="fk_Cepbr_Bairro_Cepbr_Cidade1_idx", columns={"id_cidade"})})
 * @ORM\Entity
 */
class CepbrBairro extends \Base\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_bairro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
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
     * 
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\CepbrCidade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cidade", referencedColumnName="id_cidade")
     * })
     */
    private $idCidade;



    /**
     * Set idBairro
     *
     * @param integer $idBairro
     * @return CepbrBairro
     */
    public function setIdBairro($idBairro)
    {
        $this->idBairro = $idBairro;
    
        return $this;
    }

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
    public function setIdCidade(\Academia\Entity\CepbrCidade $idCidade)
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
