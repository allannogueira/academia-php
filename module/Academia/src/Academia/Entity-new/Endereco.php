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
     * @ORM\GeneratedValue(strategy="NONE")
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
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\CepbrEndereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cepbr_endereco_cep", referencedColumnName="cep")
     * })
     */
    private $cepbrEnderecoCep;

    /**
     * @var \Academia\Entity\TipoEndereco
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\TipoEndereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_endereco", referencedColumnName="id")
     * })
     */
    private $idTipoEndereco;


}

