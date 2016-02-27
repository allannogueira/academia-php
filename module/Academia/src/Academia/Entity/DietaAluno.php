<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DietaAluno
 *
 * @ORM\Table(name="dieta_aluno", indexes={@ORM\Index(name="fk_dieta_geral_idx", columns={"id_dieta_geral"}), @ORM\Index(name="fk_aluno_idx", columns={"id_aluno"})})
 * @ORM\Entity
 */
class DietaAluno extends \Base\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_dieta_aluno", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDietaAluno;

    /**
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Academia\Entity\DietaGeral")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_dieta_geral", referencedColumnName="id_dieta_geral")
     * })
     */
    private $idDietaGeral;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_ini_vig", type="date", nullable=true)
     */
    private $dataIniVig;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_fim_vig", type="date", nullable=true)
     */
    private $dataFimVig;

    /**
     * @var \Academia\Entity\Aluno
     *
     * @ORM\OneToOne(targetEntity="Academia\Entity\Aluno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aluno", referencedColumnName="id_aluno")
     * })
     */
    private $idAluno;



    /**
     * Set idDietaAluno
     *
     * @param integer $idDietaAluno
     * @return DietaAluno
     */
    public function setIdDietaAluno($idDietaAluno)
    {
        $this->idDietaAluno = $idDietaAluno;
    
        return $this;
    }

    /**
     * Get idDietaAluno
     *
     * @return integer 
     */
    public function getIdDietaAluno()
    {
        return $this->idDietaAluno;
    }

    /**
     * Set idDietaGeral
     *
     * @param integer $idDietaGeral
     * @return DietaAluno
     */
    public function setIdDietaGeral($idDietaGeral)
    {
        $this->idDietaGeral = $idDietaGeral;
    
        return $this;
    }

    /**
     * Get idDietaGeral
     *
     * @return integer 
     */
    public function getIdDietaGeral()
    {
        return $this->idDietaGeral;
    }

    /**
     * Set dataIniVig
     *
     * @param \DateTime $dataIniVig
     * @return DietaAluno
     */
    public function setDataIniVig($dataIniVig)
    {
        $this->dataIniVig = $dataIniVig;
    
        return $this;
    }

    /**
     * Get dataIniVig
     *
     * @return \DateTime 
     */
    public function getDataIniVig()
    {
        return $this->dataIniVig;
    }

    /**
     * Set dataFimVig
     *
     * @param \DateTime $dataFimVig
     * @return DietaAluno
     */
    public function setDataFimVig($dataFimVig)
    {
        $this->dataFimVig = $dataFimVig;
    
        return $this;
    }

    /**
     * Get dataFimVig
     *
     * @return \DateTime 
     */
    public function getDataFimVig()
    {
        return $this->dataFimVig;
    }

    /**
     * Set idAluno
     *
     * @param \Academia\Entity\Aluno $idAluno
     * @return DietaAluno
     */
    public function setIdAluno(\Academia\Entity\Aluno $idAluno)
    {
        $this->idAluno = $idAluno;
    
        return $this;
    }

    /**
     * Get idAluno
     *
     * @return \Academia\Entity\Aluno 
     */
    public function getIdAluno()
    {
        return $this->idAluno;
    }
}
