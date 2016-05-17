<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DietaAlimento
 *
 * @ORM\Table(name="dieta_alimento", indexes={@ORM\Index(name="id_alimento_idx", columns={"id_alimento"}), @ORM\Index(name="id_dieta_geral_idx", columns={"id_dieta_geral"})})
 * @ORM\Entity
 */
class DietaAlimento extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_dieta_alimento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDietaAlimento;

    /**
     * @var \Academia\Entity\Alimento
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Alimento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_alimento", referencedColumnName="id_alimento")
     * })
     */
    private $idAlimento;

    /**
     * @var \Academia\Entity\DietaGeral
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\DietaGeral")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_dieta_geral", referencedColumnName="id_dieta_geral")
     * })
     */
    private $idDietaGeral;



    /**
     * Get idDietaAlimento
     *
     * @return int
     */
    public function getIdDietaAlimento()
    {
        return $this->idDietaAlimento;
    }

    /**
     * Set idAlimento
     *
     * @param \Academia\Entity\Alimento $idAlimento
     *
     * @return DietaAlimento
     */
    public function setIdAlimento(\Academia\Entity\Alimento $idAlimento = null)
    {
        $this->idAlimento = $idAlimento;
    
        return $this;
    }

    /**
     * Get idAlimento
     *
     * @return \Academia\Entity\Alimento
     */
    public function getIdAlimento()
    {
        return $this->idAlimento;
    }

    /**
     * Set idDietaGeral
     *
     * @param \Academia\Entity\DietaGeral $idDietaGeral
     *
     * @return DietaAlimento
     */
    public function setIdDietaGeral(\Academia\Entity\DietaGeral $idDietaGeral = null)
    {
        $this->idDietaGeral = $idDietaGeral;
    
        return $this;
    }

    /**
     * Get idDietaGeral
     *
     * @return \Academia\Entity\DietaGeral
     */
    public function getIdDietaGeral()
    {
        return $this->idDietaGeral;
    }
}
