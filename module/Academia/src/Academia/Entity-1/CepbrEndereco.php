<?php


namespace Academia\Entity;
use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;

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
     * @var \CepbrBairro
     *
     * @ORM\ManyToOne(targetEntity="CepbrBairro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_bairro", referencedColumnName="id_bairro")
     * })
     */
    private $idBairro;

    /**
     * @var \CepbrCidade
     *
     * @ORM\ManyToOne(targetEntity="CepbrCidade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cidade", referencedColumnName="id_cidade")
     * })
     */
    private $idCidade;


}
