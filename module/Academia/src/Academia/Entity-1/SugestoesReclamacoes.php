<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * SugestoesReclamacoes
 *
 * @ORM\Table(name="sugestoes_reclamacoes", indexes={@ORM\Index(name="fk_sugestoes_reclamacoes_aluno1_idx", columns={"aluno_id"}), @ORM\Index(name="fk_sugestoes_reclamacoes_sugestoes_reclamacoes_tipo1_idx", columns={"sugestoes_reclamacoes_tipo_id"}), @ORM\Index(name="fk_sugestoes_reclamacoes_academia1_idx", columns={"academia_id"})})
 * @ORM\Entity
 */
class SugestoesReclamacoes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=500, nullable=true)
     */
    private $descricao;

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
     * @var \SugestoesReclamacoesTipo
     *
     * @ORM\ManyToOne(targetEntity="SugestoesReclamacoesTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sugestoes_reclamacoes_tipo_id", referencedColumnName="id")
     * })
     */
    private $sugestoesReclamacoesTipo;


}
