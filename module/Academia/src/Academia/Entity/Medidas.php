<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;

/**
 * Medidas
 *
 * @ORM\Table(name="medidas")
 * @ORM\Entity
 */
class Medidas extends AbstractEntity
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
     * @ORM\Column(name="peso", type="string", length=45, nullable=true)
     */
    private $peso;

    /**
     * @var string
     *
     * @ORM\Column(name="altura", type="string", length=45, nullable=true)
     */
    private $altura;

    /**
     * @var string
     *
     * @ORM\Column(name="biceps", type="string", length=45, nullable=true)
     */
    private $biceps;

    /**
     * @var string
     *
     * @ORM\Column(name="triceps", type="string", length=45, nullable=true)
     */
    private $triceps;

    /**
     * @var string
     *
     * @ORM\Column(name="peitoral_maior", type="string", length=45, nullable=true)
     */
    private $peitoralMaior;

    /**
     * @var string
     *
     * @ORM\Column(name="peitoral_menor", type="string", length=45, nullable=true)
     */
    private $peitoralMenor;

    /**
     * @var string
     *
     * @ORM\Column(name="quadril", type="string", length=45, nullable=true)
     */
    private $quadril;



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
     * Set peso
     *
     * @param string $peso
     * @return Medidas
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;
    
        return $this;
    }

    /**
     * Get peso
     *
     * @return string 
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set altura
     *
     * @param string $altura
     * @return Medidas
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;
    
        return $this;
    }

    /**
     * Get altura
     *
     * @return string 
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * Set biceps
     *
     * @param string $biceps
     * @return Medidas
     */
    public function setBiceps($biceps)
    {
        $this->biceps = $biceps;
    
        return $this;
    }

    /**
     * Get biceps
     *
     * @return string 
     */
    public function getBiceps()
    {
        return $this->biceps;
    }

    /**
     * Set triceps
     *
     * @param string $triceps
     * @return Medidas
     */
    public function setTriceps($triceps)
    {
        $this->triceps = $triceps;
    
        return $this;
    }

    /**
     * Get triceps
     *
     * @return string 
     */
    public function getTriceps()
    {
        return $this->triceps;
    }

    /**
     * Set peitoralMaior
     *
     * @param string $peitoralMaior
     * @return Medidas
     */
    public function setPeitoralMaior($peitoralMaior)
    {
        $this->peitoralMaior = $peitoralMaior;
    
        return $this;
    }

    /**
     * Get peitoralMaior
     *
     * @return string 
     */
    public function getPeitoralMaior()
    {
        return $this->peitoralMaior;
    }

    /**
     * Set peitoralMenor
     *
     * @param string $peitoralMenor
     * @return Medidas
     */
    public function setPeitoralMenor($peitoralMenor)
    {
        $this->peitoralMenor = $peitoralMenor;
    
        return $this;
    }

    /**
     * Get peitoralMenor
     *
     * @return string 
     */
    public function getPeitoralMenor()
    {
        return $this->peitoralMenor;
    }

    /**
     * Set quadril
     *
     * @param string $quadril
     * @return Medidas
     */
    public function setQuadril($quadril)
    {
        $this->quadril = $quadril;
    
        return $this;
    }

    /**
     * Get quadril
     *
     * @return string 
     */
    public function getQuadril()
    {
        return $this->quadril;
    }
}
