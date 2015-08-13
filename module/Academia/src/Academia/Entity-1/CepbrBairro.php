<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CepbrBairro
 *
 * @ORM\Table(name="cepbr_bairro", indexes={@ORM\Index(name="fk_cepbr_bairro_cepbr_cidade1_idx", columns={"id_cidade"})})
 * @ORM\Entity
 */
class CepbrBairro
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_bairro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBairro;

    /**
     * @var string
     *
     * @ORM\Column(name="bairro", type="string", length=50, nullable=true)
     */
    private $bairro;

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
