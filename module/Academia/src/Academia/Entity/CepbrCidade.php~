<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CepbrCidade
 *
 * @ORM\Table(name="cepbr_cidade", indexes={@ORM\Index(name="fk_Cepbr_Cidade_Cepbr_Estado1_idx", columns={"uf"})})
 * @ORM\Entity
 */
class CepbrCidade extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
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
     * @var float
     *
     * @ORM\Column(name="area", type="float", precision=10, scale=0, nullable=false)
     */
    private $area = '0';

    /**
     * @var \Academia\Entity\CepbrEstado
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\CepbrEstado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uf", referencedColumnName="uf")
     * })
     */
    private $uf;


}

