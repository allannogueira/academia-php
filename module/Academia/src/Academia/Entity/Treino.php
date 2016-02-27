<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Treino
 *
 * @ORM\Table(name="treino", indexes={@ORM\Index(name="fk_Treino_Aluno1_idx", columns={"id_aluno"}), @ORM\Index(name="fk_Treino_Treino_Geral1_idx", columns={"id_treino_geral"})})
 * @ORM\Entity
 */
class Treino extends \Base\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_treino", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idTreino;

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
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\Aluno", cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aluno", referencedColumnName="id_aluno")
     * })
     */
    private $idAluno;

    /**
     * @var \Academia\Entity\TreinoGeral
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\TreinoGeral")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_treino_geral", referencedColumnName="id_treino_geral")
     * })
     */
    private $idTreinoGeral;



    /**
     * Set idTreino
     *
     * @param integer $idTreino
     * @return Treino
     */
    public function setIdTreino($idTreino)
    {
        $this->idTreino = $idTreino;
    
        return $this;
    }

    /**
     * Get idTreino
     *
     * @return integer 
     */
    public function getIdTreino()
    {
        return $this->idTreino;
    }

    /**
     * Set dataIniVig
     *
     * @param \DateTime $dataIniVig
     * @return Treino
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
     * @return Treino
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
     * @return Treino
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

    /**
     * Set idTreinoGeral
     *
     * @param \Academia\Entity\TreinoGeral $idTreinoGeral
     * @return Treino
     */
    public function setIdTreinoGeral(\Academia\Entity\TreinoGeral $idTreinoGeral)
    {
        $this->idTreinoGeral = $idTreinoGeral;
    
        return $this;
    }

    /**
     * Get idTreinoGeral
     *
     * @return \Academia\Entity\TreinoGeral 
     */
    public function getIdTreinoGeral()
    {
        return $this->idTreinoGeral;
    }
}
