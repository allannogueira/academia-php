<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Academia
 *
 * @ORM\Table(name="academia", indexes={@ORM\Index(name="fk_academia_academia1_idx", columns={"matriz_id"}), @ORM\Index(name="fk_academia_endereco1_idx", columns={"endereco_id"})})
 * @ORM\Entity
 */
class Academia
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
     * @ORM\Column(name="nome", type="string", length=45, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="data_cadastro", type="string", length=45, nullable=true)
     */
    private $dataCadastro;

    /**
     * @var \Academia
     *
     * @ORM\ManyToOne(targetEntity="Academia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="matriz_id", referencedColumnName="id")
     * })
     */
    private $matriz;

    /**
     * @var \Endereco
     *
     * @ORM\ManyToOne(targetEntity="Endereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="endereco_id", referencedColumnName="id")
     * })
     */
    private $endereco;


}
