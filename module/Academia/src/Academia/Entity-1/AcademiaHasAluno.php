<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * AcademiaHasAluno
 *
 * @ORM\Table(name="academia_has_aluno", indexes={@ORM\Index(name="fk_academia_has_aluno_aluno1_idx", columns={"aluno_id"}), @ORM\Index(name="fk_academia_has_aluno_academia1_idx", columns={"academia_id"})})
 * @ORM\Entity
 */
class AcademiaHasAluno
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


}
