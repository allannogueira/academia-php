<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Aparelho
 *
 * @ORM\Table(name="aparelho", indexes={@ORM\Index(name="fk_aparelho_academia1_idx", columns={"academia_id"})})
 * @ORM\Entity
 */
class Aparelho
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
     * @ORM\Column(name="nome", type="string", length=100, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=100, nullable=true)
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="finalidade", type="string", length=500, nullable=true)
     */
    private $finalidade;

    /**
     * @var \Academia
     *
     * @ORM\ManyToOne(targetEntity="Academia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="academia_id", referencedColumnName="id")
     * })
     */
    private $academia;


}
