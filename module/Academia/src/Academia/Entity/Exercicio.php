<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exercicio
 *
 * @ORM\Table(name="exercicio", indexes={@ORM\Index(name="fk_Exercicio_Musculo1_idx", columns={"id_musculo"})})
 * @ORM\Entity
 */
class Exercicio extends \Base\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_exercicio", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idExercicio;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_exercicio", type="string", length=150, nullable=true)
     */
    private $nomeExercicio;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=400, nullable=true)
     */
    private $descricao;

    /**
     * @var \Academia\Entity\Musculo
     *
     * @ORM\OneToOne(targetEntity="Academia\Entity\Musculo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_musculo", referencedColumnName="id_musculo")
     * })
     */
    private $idMusculo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Academia\Entity\TreinoGeral", mappedBy="idExercicio")
     */
    private $idTreinoGeral;



    /**
     * Set idExercicio
     *
     * @param integer $idExercicio
     * @return Exercicio
     */
    public function setIdExercicio($idExercicio)
    {
        $this->idExercicio = $idExercicio;
    
        return $this;
    }

    /**
     * Get idExercicio
     *
     * @return integer 
     */
    public function getIdExercicio()
    {
        return $this->idExercicio;
    }

    /**
     * Set nomeExercicio
     *
     * @param string $nomeExercicio
     * @return Exercicio
     */
    public function setNomeExercicio($nomeExercicio)
    {
        $this->nomeExercicio = $nomeExercicio;
    
        return $this;
    }

    /**
     * Get nomeExercicio
     *
     * @return string 
     */
    public function getNomeExercicio()
    {
        return $this->nomeExercicio;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return Exercicio
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    
        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set idMusculo
     *
     * @param \Academia\Entity\Musculo $idMusculo
     * @return Exercicio
     */
    public function setIdMusculo(\Academia\Entity\Musculo $idMusculo)
    {
        $this->idMusculo = $idMusculo;
    
        return $this;
    }

    /**
     * Get idMusculo
     *
     * @return \Academia\Entity\Musculo 
     */
    public function getIdMusculo()
    {
        return $this->idMusculo;
    }

    /**
     * Add idTreinoGeral
     *
     * @param \Academia\Entity\TreinoGeral $idTreinoGeral
     * @return Exercicio
     */
    public function addIdTreinoGeral(\Academia\Entity\TreinoGeral $idTreinoGeral)
    {
        $this->idTreinoGeral[] = $idTreinoGeral;
    
        return $this;
    }

    /**
     * Remove idTreinoGeral
     *
     * @param \Academia\Entity\TreinoGeral $idTreinoGeral
     */
    public function removeIdTreinoGeral(\Academia\Entity\TreinoGeral $idTreinoGeral)
    {
        $this->idTreinoGeral->removeElement($idTreinoGeral);
    }

    /**
     * Get idTreinoGeral
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdTreinoGeral()
    {
        return $this->idTreinoGeral;
    }
}
