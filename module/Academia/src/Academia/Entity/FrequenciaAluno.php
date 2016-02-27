<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FrequenciaAluno
 *
 * @ORM\Table(name="frequencia_aluno", indexes={@ORM\Index(name="fk_Frequencia_aluno_Aluno1_idx", columns={"id_aluno"})})
 * @ORM\Entity
 */
class FrequenciaAluno extends \Base\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_frequencia_aluno", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFrequenciaAluno;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_presenca", type="date", nullable=true)
     */
    private $dataPresenca;

    /**
     * @var \Academia\Entity\Aluno
     *
     * 
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\Aluno", cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aluno", referencedColumnName="id_aluno")
     * })
     */
    private $idAluno;



    /**
     * Set idFrequenciaAluno
     *
     * @param integer $idFrequenciaAluno
     * @return FrequenciaAluno
     */
    public function setIdFrequenciaAluno($idFrequenciaAluno)
    {
        $this->idFrequenciaAluno = $idFrequenciaAluno;
    
        return $this;
    }

    /**
     * Get idFrequenciaAluno
     *
     * @return integer 
     */
    public function getIdFrequenciaAluno()
    {
        return $this->idFrequenciaAluno;
    }

    /**
     * Set dataPresenca
     *
     * @param \DateTime $dataPresenca
     * @return FrequenciaAluno
     */
    public function setDataPresenca($dataPresenca)
    {
        $this->dataPresenca = $dataPresenca;
    
        return $this;
    }

    /**
     * Get dataPresenca
     *
     * @return \DateTime 
     */
    public function getDataPresenca()
    {
        return $this->dataPresenca;
    }

    /**
     * Set idAluno
     *
     * @param \Academia\Entity\Aluno $idAluno
     * @return FrequenciaAluno
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
