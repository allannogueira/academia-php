<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CepbrEndereco
 *
 * @ORM\Table(name="cepbr_endereco", indexes={@ORM\Index(name="fk_Cepbr_endereco_Cepbr_Cidade1_idx", columns={"id_cidade"}), @ORM\Index(name="fk_Cepbr_endereco_Cepbr_Bairro1_idx", columns={"id_bairro"})})
 * @ORM\Entity
 */
class CepbrEndereco extends \Base\Entity\AbstractEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="cep", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cep;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco", type="string", length=200, nullable=true)
     */
    private $endereco;

    /**
     * @var \Academia\Entity\CepbrBairro
     *
     * 
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\CepbrBairro", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_bairro", referencedColumnName="id_bairro")
     * })
     */
    private $idBairro;

    /**
     * @var \Academia\Entity\CepbrCidade
     *
     * 
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\CepbrCidade", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cidade", referencedColumnName="id_cidade")
     * })
     */
    private $idCidade;



    /**
     * Set cep
     *
     * @param string $cep
     * @return CepbrEndereco
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    
        return $this;
    }

    /**
     * Get cep
     *
     * @return string 
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set endereco
     *
     * @param string $endereco
     * @return CepbrEndereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    
        return $this;
    }

    /**
     * Get endereco
     *
     * @return string 
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set idBairro
     *
     * @param \Academia\Entity\CepbrBairro $idBairro
     * @return CepbrEndereco
     */
    public function setIdBairro(\Academia\Entity\CepbrBairro $idBairro)
    {
        $this->idBairro = $idBairro;
    
        return $this;
    }

    /**
     * Get idBairro
     *
     * @return \Academia\Entity\CepbrBairro 
     */
    public function getIdBairro()
    {
        return $this->idBairro;
    }

    /**
     * Set idCidade
     *
     * @param \Academia\Entity\CepbrCidade $idCidade
     * @return CepbrEndereco
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
