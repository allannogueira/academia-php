<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Frequencia
 *
 * @ORM\Table(name="frequencia", indexes={@ORM\Index(name="fk_frequencia_aluno1_idx", columns={"aluno_id"})})
 * @ORM\Entity
 */
class Frequencia
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
     * @var \DateTime
     *
     * @ORM\Column(name="data_presenca", type="datetime", nullable=true)
     */
    private $dataPresenca;

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
