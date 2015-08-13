<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Medidas
 *
 * @ORM\Table(name="medidas", indexes={@ORM\Index(name="fk_medidas_aluno1_idx", columns={"aluno_id"})})
 * @ORM\Entity
 */
class Medidas
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
     * @ORM\Column(name="peso", type="string", length=45, nullable=true)
     */
    private $peso;

    /**
     * @var string
     *
     * @ORM\Column(name="altura", type="string", length=45, nullable=true)
     */
    private $altura;

    /**
     * @var string
     *
     * @ORM\Column(name="peitoral_maior", type="string", length=45, nullable=true)
     */
    private $peitoralMaior;

    /**
     * @var string
     *
     * @ORM\Column(name="peitoral_menor", type="string", length=45, nullable=true)
     */
    private $peitoralMenor;

    /**
     * @var string
     *
     * @ORM\Column(name="quadril", type="string", length=45, nullable=true)
     */
    private $quadril;

    /**
     * @var string
     *
     * @ORM\Column(name="biceps_esquerdo", type="string", length=45, nullable=true)
     */
    private $bicepsEsquerdo;

    /**
     * @var string
     *
     * @ORM\Column(name="biceps_direito", type="string", length=45, nullable=true)
     */
    private $bicepsDireito;

    /**
     * @var string
     *
     * @ORM\Column(name="triceps_esquerdo", type="string", length=45, nullable=true)
     */
    private $tricepsEsquerdo;

    /**
     * @var string
     *
     * @ORM\Column(name="triceps_direito", type="string", length=45, nullable=true)
     */
    private $tricepsDireito;

    /**
     * @var string
     *
     * @ORM\Column(name="coxas_esquerda", type="string", length=45, nullable=true)
     */
    private $coxasEsquerda;

    /**
     * @var string
     *
     * @ORM\Column(name="coxas_direita", type="string", length=45, nullable=true)
     */
    private $coxasDireita;

    /**
     * @var string
     *
     * @ORM\Column(name="panturrilha_esquerda", type="string", length=45, nullable=true)
     */
    private $panturrilhaEsquerda;

    /**
     * @var string
     *
     * @ORM\Column(name="panturrilha_direita", type="string", length=45, nullable=true)
     */
    private $panturrilhaDireita;

    /**
     * @var string
     *
     * @ORM\Column(name="quadril_esquerdo", type="string", length=45, nullable=true)
     */
    private $quadrilEsquerdo;

    /**
     * @var string
     *
     * @ORM\Column(name="quadril_direito", type="string", length=45, nullable=true)
     */
    private $quadrilDireito;

    /**
     * @var \Aluno
     *
     * @ORM\ManyToOne(targetEntity="Aluno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="aluno_id", referencedColumnName="id")
     * })
     */
    private $aluno;


}
