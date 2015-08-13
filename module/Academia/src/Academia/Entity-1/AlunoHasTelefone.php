<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * AlunoHasTelefone
 *
 * @ORM\Table(name="aluno_has_telefone", indexes={@ORM\Index(name="fk_aluno_has_telefone_telefone1_idx", columns={"telefone_id"}), @ORM\Index(name="fk_aluno_has_telefone_aluno1_idx", columns={"aluno_id"})})
 * @ORM\Entity
 */
class AlunoHasTelefone
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
     * @var \Aluno
     *
     * @ORM\ManyToOne(targetEntity="Aluno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="aluno_id", referencedColumnName="id")
     * })
     */
    private $aluno;

    /**
     * @var \Telefone
     *
     * @ORM\ManyToOne(targetEntity="Telefone")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="telefone_id", referencedColumnName="id")
     * })
     */
    private $telefone;


}
