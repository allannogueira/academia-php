<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Telefone
 *
 * @ORM\Table(name="telefone", indexes={@ORM\Index(name="fk_telefone_telefone_tipo1_idx", columns={"telefone_tipo_id"})})
 * @ORM\Entity
 */
class Telefone
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_telefone", type="string", length=45, nullable=true)
     */
    private $numeroTelefone;

    /**
     * @var \TelefoneTipo
     *
     * @ORM\ManyToOne(targetEntity="TelefoneTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="telefone_tipo_id", referencedColumnName="id")
     * })
     */
    private $telefoneTipo;


}
