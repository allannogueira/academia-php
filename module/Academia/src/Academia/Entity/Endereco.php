<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Endereco
 *
 * @ORM\Table(name="endereco", indexes={@ORM\Index(name="fk_Endereco_Tipo_Endereco1_idx", columns={"id_tipo_endereco"}), @ORM\Index(name="fk_Endereco_cepbr_endereco1_idx", columns={"cepbr_endereco_cep"})})
 * @ORM\Entity
 */
class Endereco extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_endereco", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEndereco;

    /**
     * @var string
     *
     * @ORM\Column(name="rua", type="string", length=150, nullable=true)
     */
    private $rua;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=4, nullable=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="complemento", type="string", length=45, nullable=true)
     */
    private $complemento;

    /**
     * @var \Academia\Entity\CepbrEndereco
     *
     * @ORM\OneToOne(targetEntity="Academia\Entity\CepbrEndereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cepbr_endereco_cep", referencedColumnName="cep")
     * })
     */
    private $cepbrEnderecoCep;

    /**
     * @var \Academia\Entity\TipoEndereco
     *
     * @ORM\OneToOne(targetEntity="Academia\Entity\TipoEndereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_endereco", referencedColumnName="id")
     * })
     */
    private $idTipoEndereco;



    /**
     * Set idEndereco
     *
     * @param int $idEndereco
     *
     * @return Endereco
     */
    public function setIdEndereco($idEndereco)
    {
        $this->idEndereco = $idEndereco;
    
        return $this;
    }

    /**
     * Get idEndereco
     *
     * @return int
     */
    public function getIdEndereco()
    {
        return $this->idEndereco;
    }

    /**
     * Set rua
     *
     * @param string $rua
     *
     * @return Endereco
     */
    public function setRua($rua)
    {
        $this->rua = $rua;
    
        return $this;
    }

    /**
     * Get rua
     *
     * @return string
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * Set numero
     *
     * @param string $numero
     *
     * @return Endereco
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    
        return $this;
    }

    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set complemento
     *
     * @param string $complemento
     *
     * @return Endereco
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    
        return $this;
    }

    /**
     * Get complemento
     *
     * @return string
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set cepbrEnderecoCep
     *
     * @param \Academia\Entity\CepbrEndereco $cepbrEnderecoCep
     *
     * @return Endereco
     */
    public function setCepbrEnderecoCep(\Academia\Entity\CepbrEndereco $cepbrEnderecoCep)
    {
        $this->cepbrEnderecoCep = $cepbrEnderecoCep;
    
        return $this;
    }

    /**
     * Get cepbrEnderecoCep
     *
     * @return \Academia\Entity\CepbrEndereco
     */
    public function getCepbrEnderecoCep()
    {
        return $this->cepbrEnderecoCep;
    }

    /**
     * Set idTipoEndereco
     *
     * @param \Academia\Entity\TipoEndereco $idTipoEndereco
     *
     * @return Endereco
     */
    public function setIdTipoEndereco(\Academia\Entity\TipoEndereco $idTipoEndereco)
    {
        $this->idTipoEndereco = $idTipoEndereco;
    
        return $this;
    }

    /**
     * Get idTipoEndereco
     *
     * @return \Academia\Entity\TipoEndereco
     */
    public function getIdTipoEndereco()
    {
        return $this->idTipoEndereco;
    }
}
