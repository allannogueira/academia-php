<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;

/**
 * Exercicios
 *
 * @ORM\Table(name="exercicios")
 * @ORM\Entity
 */
class Exercicios extends AbstractEntity
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
     * @ORM\Column(name="descricao", type="string", length=100, nullable=true)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="series", type="string", length=45, nullable=true)
     */
    private $series;

    /**
     * @var string
     *
     * @ORM\Column(name="repeticoes", type="string", length=45, nullable=true)
     */
    private $repeticoes;

    /**
     * @var string
     *
     * @ORM\Column(name="intervalo", type="string", length=45, nullable=true)
     */
    private $intervalo;

    /**
     * @var string
     *
     * @ORM\Column(name="segunda", type="string", length=1, nullable=true)
     */
    private $segunda;

    /**
     * @var string
     *
     * @ORM\Column(name="terca", type="string", length=1, nullable=true)
     */
    private $terca;

    /**
     * @var string
     *
     * @ORM\Column(name="quarta", type="string", length=1, nullable=true)
     */
    private $quarta;

    /**
     * @var string
     *
     * @ORM\Column(name="quinta", type="string", length=1, nullable=true)
     */
    private $quinta;

    /**
     * @var string
     *
     * @ORM\Column(name="sexta", type="string", length=1, nullable=true)
     */
    private $sexta;

    /**
     * @var string
     *
     * @ORM\Column(name="sabado", type="string", length=1, nullable=true)
     */
    private $sabado;

    /**
     * @var string
     *
     * @ORM\Column(name="domingo", type="string", length=1, nullable=true)
     */
    private $domingo;

    /**
     * @var string
     *
     * @ORM\Column(name="arlivre", type="string", length=1, nullable=true)
     */
    private $arLivre;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Academia\Entity\Treino", inversedBy="exercicios")
     * @ORM\JoinTable(name="exercicios_has_treino",
     *   joinColumns={
     *     @ORM\JoinColumn(name="exercicios_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="treino_id", referencedColumnName="id")
     *   }
     * )
     */
    private $treino;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->treino = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set descricao
     *
     * @param string $descricao
     * @return Exercicios
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
     * Set series
     *
     * @param string $series
     * @return Exercicios
     */
    public function setSeries($series)
    {
        $this->series = $series;
    
        return $this;
    }

    /**
     * Get series
     *
     * @return string 
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Set repeticoes
     *
     * @param string $repeticoes
     * @return Exercicios
     */
    public function setRepeticoes($repeticoes)
    {
        $this->repeticoes = $repeticoes;
    
        return $this;
    }

    /**
     * Get repeticoes
     *
     * @return string 
     */
    public function getRepeticoes()
    {
        return $this->repeticoes;
    }

    /**
     * Set intervalo
     *
     * @param string $intervalo
     * @return Exercicios
     */
    public function setIntervalo($intervalo)
    {
        $this->intervalo = $intervalo;
    
        return $this;
    }

    /**
     * Get intervalo
     *
     * @return string 
     */
    public function getIntervalo()
    {
        return $this->intervalo;
    }

    /**
     * Set segunda
     *
     * @param string $segunda
     * @return Exercicios
     */
    public function setSegunda($segunda)
    {
        $this->segunda = $segunda;
    
        return $this;
    }

    /**
     * Get segunda
     *
     * @return string 
     */
    public function getSegunda()
    {
        return $this->segunda;
    }

    /**
     * Set terca
     *
     * @param string $terca
     * @return Exercicios
     */
    public function setTerca($terca)
    {
        $this->terca = $terca;
    
        return $this;
    }

    /**
     * Get terca
     *
     * @return string 
     */
    public function getTerca()
    {
        return $this->terca;
    }

    /**
     * Set quarta
     *
     * @param string $quarta
     * @return Exercicios
     */
    public function setQuarta($quarta)
    {
        $this->quarta = $quarta;
    
        return $this;
    }

    /**
     * Get quarta
     *
     * @return string 
     */
    public function getQuarta()
    {
        return $this->quarta;
    }

    /**
     * Set quinta
     *
     * @param string $quinta
     * @return Exercicios
     */
    public function setQuinta($quinta)
    {
        $this->quinta = $quinta;
    
        return $this;
    }

    /**
     * Get quinta
     *
     * @return string 
     */
    public function getQuinta()
    {
        return $this->quinta;
    }

    /**
     * Set sexta
     *
     * @param string $sexta
     * @return Exercicios
     */
    public function setSexta($sexta)
    {
        $this->sexta = $sexta;
    
        return $this;
    }

    /**
     * Get sexta
     *
     * @return string 
     */
    public function getSexta()
    {
        return $this->sexta;
    }

    /**
     * Set sabado
     *
     * @param string $sabado
     * @return Exercicios
     */
    public function setSabado($sabado)
    {
        $this->sabado = $sabado;
    
        return $this;
    }

    /**
     * Get sabado
     *
     * @return string 
     */
    public function getSabado()
    {
        return $this->sabado;
    }

    /**
     * Set domingo
     *
     * @param string $domingo
     * @return Exercicios
     */
    public function setDomingo($domingo)
    {
        $this->domingo = $domingo;
    
        return $this;
    }

    /**
     * Get domingo
     *
     * @return string 
     */
    public function getDomingo()
    {
        return $this->domingo;
    }

    /**
     * Set arLivre
     *
     * @param string $arLivre
     * @return Exercicios
     */
    public function setArLivre($arLivre)
    {
        $this->arLivre = $arLivre;
    
        return $this;
    }

    /**
     * Get arLivre
     *
     * @return string 
     */
    public function getArLivre()
    {
        return $this->arLivre;
    }

    /**
     * Add treino
     *
     * @param \Academia\Entity\Treino $treino
     * @return Exercicios
     */
    public function addTreino(\Academia\Entity\Treino $treino)
    {
        $this->treino[] = $treino;
    
        return $this;
    }

    /**
     * Remove treino
     *
     * @param \Academia\Entity\Treino $treino
     */
    public function removeTreino(\Academia\Entity\Treino $treino)
    {
        $this->treino->removeElement($treino);
    }

    /**
     * Get treino
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTreino()
    {
        return $this->treino;
    }
}
