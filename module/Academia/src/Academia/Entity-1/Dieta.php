<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Dieta
 *
 * @ORM\Table(name="dieta", indexes={@ORM\Index(name="fk_dieta_aluno1_idx", columns={"aluno_id"})})
 * @ORM\Entity
 */
class Dieta
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
     * @ORM\Column(name="finalidade", type="string", length=100, nullable=true)
     */
    private $finalidade;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_inicio", type="date", nullable=true)
     */
    private $dataInicio;

    /**
     * @var string
     *
     * @ORM\Column(name="data_fim", type="string", length=45, nullable=true)
     */
    private $dataFim;

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
