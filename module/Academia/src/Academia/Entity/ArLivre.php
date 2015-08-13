<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;

/**
 * ArLivre
 *
 * @ORM\Table(name="ar_livre", indexes={@ORM\Index(name="fk_ar_livre_aluno1_idx", columns={"aluno_id"})})
 * @ORM\Entity
 */
class ArLivre extends AbstractEntity
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
     * @var \Academia\Entity\Aluno
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Aluno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="aluno_id", referencedColumnName="id")
     * })
     */
    private $aluno;



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
     * Set gorduraQueimada
     *
     * @param string $gorduraQueimada
     * @return ArLivre
     */
    public function setGorduraQueimada($gorduraQueimada)
    {
        $this->gorduraQueimada = $gorduraQueimada;
    
        return $this;
    }

    /**
     * Get gorduraQueimada
     *
     * @return string 
     */
    public function getGorduraQueimada()
    {
        return $this->gorduraQueimada;
    }

    /**
     * Set distanciaPercorrida
     *
     * @param string $distanciaPercorrida
     * @return ArLivre
     */
    public function setDistanciaPercorrida($distanciaPercorrida)
    {
        $this->distanciaPercorrida = $distanciaPercorrida;
    
        return $this;
    }

    /**
     * Get distanciaPercorrida
     *
     * @return string 
     */
    public function getDistanciaPercorrida()
    {
        return $this->distanciaPercorrida;
    }

    /**
     * Set aluno
     *
     * @param \Academia\Entity\Aluno $aluno
     * @return ArLivre
     */
    public function setAluno(\Academia\Entity\Aluno $aluno = null)
    {
        $this->aluno = $aluno;
    
        return $this;
    }

    /**
     * Get aluno
     *
     * @return \Academia\Entity\Aluno 
     */
    public function getAluno()
    {
        return $this->aluno;
    }
}
