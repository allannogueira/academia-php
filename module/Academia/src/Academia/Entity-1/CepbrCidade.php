<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CepbrCidade
 *
 * @ORM\Table(name="cepbr_cidade", indexes={@ORM\Index(name="fk_cepbr_cidade_cepbr_estado1_idx", columns={"uf"})})
 * @ORM\Entity
 */
class CepbrCidade
{
    /**
     * @var integer
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
     * @var \CepbrEstado
     *
     * @ORM\ManyToOne(targetEntity="CepbrEstado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uf", referencedColumnName="uf")
     * })
     */
    private $uf;


}
