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
     * @var \CepbrEndereco
     *
     * @ORM\ManyToOne(targetEntity="CepbrEndereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cepbr_endereco_cep", referencedColumnName="cep")
     * })
     */
    private $cepbrEnderecoCep;
    function getId() {
        return $this->id;
    }

    function getRua() {
        return $this->rua;
    }

    function getNumero() {
        return $this->numero;
    }

    function getComplemento() {
        return $this->complemento;
    }

    function getCepbrEnderecoCep() {
        return $this->cepbrEnderecoCep;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setRua($rua) {
        $this->rua = $rua;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    function setCepbrEnderecoCep(\Academia\Entity\CepbrEndereco $cepbrEnderecoCep) {
        $this->cepbrEnderecoCep = $cepbrEnderecoCep;
    }


    

}
