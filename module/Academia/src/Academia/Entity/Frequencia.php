<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;
/**
 * Frequencia
 *
 * @ORM\Table(name="frequencia", indexes={@ORM\Index(name="fk_frequencia_aluno1_idx", columns={"aluno_id"})})
 * @ORM\Entity
 */
class Frequencia extends AbstractEntity
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
     * @var \DateTime
     *
     * @ORM\Column(name="data_presenca", type="datetime", nullable=true)
     */
    private $dataPresenca;

    /**
     * @var \Academia\Entity\Aluno
     *@ORM\Column(name="aluno_id", type="string", nullable=true)
    
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
     * Set dataPresenca
     *
     * @param \DateTime $dataPresenca
     * @return Frequencia
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
     * Set aluno
     *
     * @param \Academia\Entity\Aluno $aluno
     * @return Frequencia
     */
    public function setAluno( $aluno = null)
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
