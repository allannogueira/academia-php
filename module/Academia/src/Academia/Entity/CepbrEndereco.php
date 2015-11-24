<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;

/**
 * CepbrEndereco
 *
 * @ORM\Table(name="cepbr_endereco", indexes={@ORM\Index(name="fk_cepbr_endereco_cepbr_bairro1_idx", columns={"id_bairro"}), @ORM\Index(name="fk_cepbr_endereco_cepbr_cidade1_idx", columns={"id_cidade"})})
 * @ORM\Entity
 */
class CepbrEndereco extends AbstractEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="cep", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cep;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco", type="string", length=200, nullable=true)
     */
    private $endereco;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_bairro", type="integer", nullable=true)
     */
    private $idBairro;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_cidade", type="integer", nullable=true)
     */
    private $idCidade;



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
     * @param integer $idBairro
     * @return CepbrEndereco
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
     * Set idCidade
     *
     * @param integer $idCidade
     * @return CepbrEndereco
     */
    public function setIdCidade($idCidade)
    {
        $this->idCidade = $idCidade;
    
        return $this;
    }

    /**
     * Get idCidade
     *
     * @return integer 
     */
    public function getIdCidade()
    {
        return $this->idCidade;
    }
}
