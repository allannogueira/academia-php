<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Finalidade
 *
 * @ORM\Table(name="finalidade")
 * @ORM\Entity
 */
class Finalidade extends \Base\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_finalidade", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFinalidade;

    /**
     * @var string
     *
     * @ORM\Column(name="finalidade", type="string", length=100, nullable=true)
     */
    private $finalidade;



    /**
     * Get idFinalidade
     *
     * @return integer 
     */
    public function getIdFinalidade()
    {
        return $this->idFinalidade;
    }

    /**
     * Set finalidade
     *
     * @param string $finalidade
     * @return Finalidade
     */
    public function setFinalidade($finalidade)
    {
        $this->finalidade = $finalidade;
    
        return $this;
    }

    /**
     * Get finalidade
     *
     * @return string 
     */
    public function getFinalidade()
    {
        return $this->finalidade;
    }
}
