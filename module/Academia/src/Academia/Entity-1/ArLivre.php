<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ArLivre
 *
 * @ORM\Table(name="ar_livre", indexes={@ORM\Index(name="fk_ar_livre_aluno1_idx", columns={"aluno_id"})})
 * @ORM\Entity
 */
class ArLivre
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
     * @ORM\Column(name="gordura_queimada", type="string", length=45, nullable=true)
     */
    private $gorduraQueimada;

    /**
     * @var string
     *
     * @ORM\Column(name="distancia_percorrida", type="string", length=45, nullable=true)
     */
    private $distanciaPercorrida;

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
