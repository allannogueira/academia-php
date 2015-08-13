<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * AlunoHasAparelhoNaoRecomendado
 *
 * @ORM\Table(name="aluno_has_aparelho_nao_recomendado", indexes={@ORM\Index(name="fk_aluno_has_aparelho_nao_recomendado_aparelho_nao_recomend_idx", columns={"aparelho_nao_recomendado_id"}), @ORM\Index(name="fk_aluno_has_aparelho_nao_recomendado_aluno1_idx", columns={"aluno_id"}), @ORM\Index(name="fk_aluno_has_aparelho_nao_recomendado_academia1_idx", columns={"academia_id"})})
 * @ORM\Entity
 */
class AlunoHasAparelhoNaoRecomendado
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
     * @var \Academia
     *
     * @ORM\ManyToOne(targetEntity="Academia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="academia_id", referencedColumnName="id")
     * })
     */
    private $academia;

    /**
     * @var \Aluno
     *
     * @ORM\ManyToOne(targetEntity="Aluno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="aluno_id", referencedColumnName="id")
     * })
     */
    private $aluno;

    /**
     * @var \AparelhoNaoRecomendado
     *
     * @ORM\ManyToOne(targetEntity="AparelhoNaoRecomendado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="aparelho_nao_recomendado_id", referencedColumnName="id")
     * })
     */
    private $aparelhoNaoRecomendado;


}
