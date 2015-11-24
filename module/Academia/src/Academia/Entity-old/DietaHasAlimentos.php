<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;
use Base\Entity\AbstractEntity;
/**
 * DietaHasAlimentos
 *
 * @ORM\Table(name="dieta_has_alimentos", indexes={@ORM\Index(name="fk_dieta_has_alimentos_alimentos1_idx", columns={"alimentos_id"}), @ORM\Index(name="fk_dieta_has_alimentos_dieta1_idx", columns={"dieta_id"})})
 * @ORM\Entity
 */
class DietaHasAlimentos extends AbstractEntity
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horario", type="time", nullable=true)
     */
    private $horario;

    /**
     * @var \Academia\Entity\Alimentos
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Alimentos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="alimentos_id", referencedColumnName="id")
     * })
     */
    private $alimentos;

    /**
     * @var \Academia\Entity\Dieta
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\Dieta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dieta_id", referencedColumnName="id")
     * })
     */
    private $dieta;



    /**
     * Set horario
     *
     * @param \DateTime $horario
     * @return DietaHasAlimentos
     */
    public function setHorario($horario)
    {
        $this->horario = $horario;
    
        return $this;
    }

    /**
     * Get horario
     *
     * @return \DateTime 
     */
    public function getHorario()
    {
        return $this->horario;
    }

    /**
     * Set alimentos
     *
     * @param \Academia\Entity\Alimentos $alimentos
     * @return DietaHasAlimentos
     */
    public function setAlimentos(\Academia\Entity\Alimentos $alimentos = null)
    {
        $this->alimentos = $alimentos;
    
        return $this;
    }

    /**
     * Get alimentos
     *
     * @return \Academia\Entity\Alimentos 
     */
    public function getAlimentos()
    {
        return $this->alimentos;
    }

    /**
     * Set dieta
     *
     * @param \Academia\Entity\Dieta $dieta
     * @return DietaHasAlimentos
     */
    public function setDieta(\Academia\Entity\Dieta $dieta)
    {
        $this->dieta = $dieta;
    
        return $this;
    }

    /**
     * Get dieta
     *
     * @return \Academia\Entity\Dieta 
     */
    public function getDieta()
    {
        return $this->dieta;
    }
}
