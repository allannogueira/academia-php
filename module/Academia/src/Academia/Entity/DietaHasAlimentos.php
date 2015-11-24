<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;

/**
 * DietaHasAlimentos
 *
 * @ORM\Table(name="dieta_has_alimentos", indexes={@ORM\Index(name="fk_dieta_has_alimentos_alimentos1_idx", columns={"alimentos_id"}), @ORM\Index(name="fk_dieta_has_alimentos_dieta1_idx", columns={"dieta_id"})})
 * @ORM\Entity
 */
class DietaHasAlimentos extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="alimentos_id", type="bigint", nullable=true)
     */
    private $alimentosId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horario", type="time", nullable=true)
     */
    private $horario;

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
     * Set alimentosId
     *
     * @param integer $alimentosId
     * @return DietaHasAlimentos
     */
    public function setAlimentosId($alimentosId)
    {
        $this->alimentosId = $alimentosId;
    
        return $this;
    }

    /**
     * Get alimentosId
     *
     * @return integer 
     */
    public function getAlimentosId()
    {
        return $this->alimentosId;
    }

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
