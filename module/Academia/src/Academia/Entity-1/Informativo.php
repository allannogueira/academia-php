<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Informativo
 *
 * @ORM\Table(name="informativo", indexes={@ORM\Index(name="fk_informativo_aluno1_idx", columns={"aluno_id"}), @ORM\Index(name="fk_informativo_academia1_idx", columns={"academia_id"})})
 * @ORM\Entity
 */
class Informativo
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


}
