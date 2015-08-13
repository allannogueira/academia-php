<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;
/**
 * Treino
 *
 * @ORM\Table(name="treino", indexes={@ORM\Index(name="fk_treino_aluno1_idx", columns={"aluno_id"})})
 * @ORM\Entity
 */
class Treino extends AbstractEntity
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
     * @ORM\Column(name="nome", type="string", length=100, nullable=true)
     */
    private $nome;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_inicio", type="date", nullable=true)
     */
    private $dataInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_fim", type="date", nullable=true)
     */
    private $dataFim;

    /**
     * @var string
     *
     * @ORM\Column(name="aluno_id", type="string", nullable=true)
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
     * Set nome
     *
     * @param string $nome
     * @return Treino
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    
        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }



    /**
     * Set dataInicio
     *
     * @param \DateTime $dataInicio
     * @return Treino
     */
    public function setDataInicio($dataInicio)
    {
        $this->dataInicio = new \DateTime($dataInicio);
    
        return $this;
    }

    /**
     * Get dataInicio
     *
     * @return \DateTime 
     */
    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    /**
     * Set dataFim
     *
     * @param \DateTime $dataFim
     * @return Treino
     */
    public function setDataFim($dataFim)
    {
        $this->dataFim = new \DateTime($dataFim);
    
        return $this;
    }

    /**
     * Get dataFim
     *
     * @return \DateTime 
     */
    public function getDataFim()
    {
        return $this->dataFim;
    }

    public function setAluno($aluno = null)
    {
        $this->aluno = $aluno;
    
        return $this;
    }

    public function getAluno()
    {
        return $this->aluno;
    }
    
}
