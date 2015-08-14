<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * DietaHasAlimentos
 *
 * @ORM\Table(name="dieta_has_alimentos", indexes={@ORM\Index(name="fk_dieta_has_alimentos_alimentos1_idx", columns={"alimentos_id"}), @ORM\Index(name="fk_dieta_has_alimentos_dieta1_idx", columns={"dieta_id"})})
 * @ORM\Entity
 */
class DietaHasAlimentos
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horario", type="time", nullable=true)
     */
    private $horario;

    /**
     * @var \Alimentos
     *
     * @ORM\ManyToOne(targetEntity="Alimentos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="alimentos_id", referencedColumnName="id")
     * })
     */
    private $alimentos;

    /**
     * @var \Dieta
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Dieta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dieta_id", referencedColumnName="id")
     * })
     */
    private $dieta;


}