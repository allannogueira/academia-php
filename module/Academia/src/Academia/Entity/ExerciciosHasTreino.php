<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;
/**
 * ExerciciosHasTreino
 *
 * @ORM\Table(name="exercicios_has_treino", indexes={@ORM\Index(name="fk_exercicios_has_treino_treino1_idx", columns={"treino_id"}), @ORM\Index(name="fk_exercicios_has_treino_exercicios1_idx", columns={"exercicios_id"})})
 * @ORM\Entity
 */
class ExerciciosHasTreino extends AbstractEntity
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
     * @var \Academia\Entity\Exercicios
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Exercicios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="exercicios_id", referencedColumnName="id")
     * })
     */
    private $exercicios;

    /**
     * @var \Academia\Entity\Treino
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Treino")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="treino_id", referencedColumnName="id")
     * })
     */
    private $treino;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set exercicios
     *
     * @param \Academia\Entity\Exercicios $exercicios
     * @return ExerciciosHasTreino
     */
    public function setExercicios(\Academia\Entity\Exercicios $exercicios = null)
    {
        $this->exercicios = $exercicios;
    
        return $this;
    }

    /**
     * Get exercicios
     *
     * @return \Academia\Entity\Exercicios 
     */
    public function getExercicios()
    {
        return $this->exercicios;
    }

    /**
     * Set treino
     *
     * @param \Academia\Entity\Treino $treino
     * @return ExerciciosHasTreino
     */
    public function setTreino(\Academia\Entity\Treino $treino = null)
    {
        $this->treino = $treino;
    
        return $this;
    }

    /**
     * Get treino
     *
     * @return \Academia\Entity\Treino 
     */
    public function getTreino()
    {
        return $this->treino;
    }
}
