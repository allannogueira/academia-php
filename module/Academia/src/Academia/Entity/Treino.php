<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;

/**
 * Treino
 *
 * @ORM\Table(name="treino")
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
     * @ORM\Column(name="data_cadastro", type="date", nullable=true)
     */
    private $dataCadastro;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Academia\Entity\Exercicios", inversedBy="treino",  cascade={"persist", "remove"})
     * @ORM\JoinTable(name="exercicios_has_treino",
     *   joinColumns={
     *     @ORM\JoinColumn(name="exercicios_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="treino_id", referencedColumnName="id")
     *   }
     * )
     */
    private $exercicios;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->exercicios = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set dataCadastro
     *
     * @param \DateTime $dataCadastro
     * @return Treino
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
    
        return $this;
    }

    /**
     * Get dataCadastro
     *
     * @return \DateTime 
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * Set dataInicio
     *
     * @param \DateTime $dataInicio
     * @return Treino
     */
    public function setDataInicio($dataInicio)
    {
        $this->dataInicio = $dataInicio;
    
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
        $this->dataFim = $dataFim;
    
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

    /**
     * Add exercicios
     *
     * @param \Academia\Entity\Exercicios $exercicios
     * @return Treino
     */
    public function addExercicio(\Academia\Entity\Exercicios $exercicios)
    {
        $this->exercicios[] = $exercicios;
        return $this;
    }

    /**
     * Remove exercicios
     *
     * @param \Academia\Entity\Exercicios $exercicios
     */
    public function removeExercicio(\Academia\Entity\Exercicios $exercicios)
    {
        $this->exercicios->removeElement($exercicios);
    }

    /**
     * Get exercicios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getExercicios()
    {
        return $this->exercicios;
    }
}
