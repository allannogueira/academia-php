<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;
/**
 * Endereco
 *
 * @ORM\Table(name="endereco", indexes={@ORM\Index(name="fk_endereco_cepbr_endereco1_idx", columns={"cepbr_endereco_cep"})})
 * @ORM\Entity
 */
class Endereco extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="rua", type="string", length=45, nullable=true)
     */
    private $rua;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=45, nullable=true)
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
     * @ORM\ManyToOne(targetEntity="Academia\Entity\CepbrEndereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cepbr_endereco_cep", referencedColumnName="cep")
     * })
     */
    private $cepbrEnderecoCep;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set rua
     *
     * @param string $rua
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
     * @return Endereco
     */
    public function setCepbrEnderecoCep(\Academia\Entity\CepbrEndereco $cepbrEnderecoCep = null)
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
}
