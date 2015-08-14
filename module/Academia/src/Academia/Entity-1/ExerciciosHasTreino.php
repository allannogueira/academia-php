<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ExerciciosHasTreino
 *
 * @ORM\Table(name="exercicios_has_treino", indexes={@ORM\Index(name="fk_exercicios_has_treino_treino1_idx", columns={"treino_id"}), @ORM\Index(name="fk_exercicios_has_treino_exercicios1_idx", columns={"exercicios_id"})})
 * @ORM\Entity
 */
class ExerciciosHasTreino
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
     * @var \Exercicios
     *
     * @ORM\ManyToOne(targetEntity="Exercicios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="exercicios_id", referencedColumnName="id")
     * })
     */
    private $exercicios;

    /**
     * @var \Treino
     *
     * @ORM\ManyToOne(targetEntity="Treino")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="treino_id", referencedColumnName="id")
     * })
     */
    private $treino;


}