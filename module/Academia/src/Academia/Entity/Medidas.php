<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;

/**
 * Medidas
 *
 * @ORM\Table(name="medidas", indexes={@ORM\Index(name="fk_medidas_aluno1_idx", columns={"aluno_id"})})
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
     * @var string
     *
     * @ORM\Column(name="biceps_esquerdo", type="string", length=45, nullable=true)
     */
    private $bicepsEsquerdo;

    /**
     * @var string
     *
     * @ORM\Column(name="biceps_direito", type="string", length=45, nullable=true)
     */
    private $bicepsDireito;

    /**
     * @var string
     *
     * @ORM\Column(name="triceps_esquerdo", type="string", length=45, nullable=true)
     */
    private $tricepsEsquerdo;

    /**
     * @var string
     *
     * @ORM\Column(name="triceps_direito", type="string", length=45, nullable=true)
     */
    private $tricepsDireito;

    /**
     * @var string
     *
     * @ORM\Column(name="coxas_esquerda", type="string", length=45, nullable=true)
     */
    private $coxasEsquerda;

    /**
     * @var string
     *
     * @ORM\Column(name="coxas_direita", type="string", length=45, nullable=true)
     */
    private $coxasDireita;

    /**
     * @var string
     *
     * @ORM\Column(name="panturrilha_esquerda", type="string", length=45, nullable=true)
     */
    private $panturrilhaEsquerda;

    /**
     * @var string
     *
     * @ORM\Column(name="panturrilha_direita", type="string", length=45, nullable=true)
     */
    private $panturrilhaDireita;

    /**
     * @var string
     *
     * @ORM\Column(name="quadril_esquerdo", type="string", length=45, nullable=true)
     */
    private $quadrilEsquerdo;

    /**
     * @var string
     *
     * @ORM\Column(name="quadril_direito", type="string", length=45, nullable=true)
     */
    private $quadrilDireito;

    /**
     * @var \Academia\Entity\Aluno
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

    /**
     * Set bicepsEsquerdo
     *
     * @param string $bicepsEsquerdo
     * @return Medidas
     */
    public function setBicepsEsquerdo($bicepsEsquerdo)
    {
        $this->bicepsEsquerdo = $bicepsEsquerdo;
    
        return $this;
    }

    /**
     * Get bicepsEsquerdo
     *
     * @return string 
     */
    public function getBicepsEsquerdo()
    {
        return $this->bicepsEsquerdo;
    }

    /**
     * Set bicepsDireito
     *
     * @param string $bicepsDireito
     * @return Medidas
     */
    public function setBicepsDireito($bicepsDireito)
    {
        $this->bicepsDireito = $bicepsDireito;
    
        return $this;
    }

    /**
     * Get bicepsDireito
     *
     * @return string 
     */
    public function getBicepsDireito()
    {
        return $this->bicepsDireito;
    }

    /**
     * Set tricepsEsquerdo
     *
     * @param string $tricepsEsquerdo
     * @return Medidas
     */
    public function setTricepsEsquerdo($tricepsEsquerdo)
    {
        $this->tricepsEsquerdo = $tricepsEsquerdo;
    
        return $this;
    }

    /**
     * Get tricepsEsquerdo
     *
     * @return string 
     */
    public function getTricepsEsquerdo()
    {
        return $this->tricepsEsquerdo;
    }

    /**
     * Set tricepsDireito
     *
     * @param string $tricepsDireito
     * @return Medidas
     */
    public function setTricepsDireito($tricepsDireito)
    {
        $this->tricepsDireito = $tricepsDireito;
    
        return $this;
    }

    /**
     * Get tricepsDireito
     *
     * @return string 
     */
    public function getTricepsDireito()
    {
        return $this->tricepsDireito;
    }

    /**
     * Set coxasEsquerda
     *
     * @param string $coxasEsquerda
     * @return Medidas
     */
    public function setCoxasEsquerda($coxasEsquerda)
    {
        $this->coxasEsquerda = $coxasEsquerda;
    
        return $this;
    }

    /**
     * Get coxasEsquerda
     *
     * @return string 
     */
    public function getCoxasEsquerda()
    {
        return $this->coxasEsquerda;
    }

    /**
     * Set coxasDireita
     *
     * @param string $coxasDireita
     * @return Medidas
     */
    public function setCoxasDireita($coxasDireita)
    {
        $this->coxasDireita = $coxasDireita;
    
        return $this;
    }

    /**
     * Get coxasDireita
     *
     * @return string 
     */
    public function getCoxasDireita()
    {
        return $this->coxasDireita;
    }

    /**
     * Set panturrilhaEsquerda
     *
     * @param string $panturrilhaEsquerda
     * @return Medidas
     */
    public function setPanturrilhaEsquerda($panturrilhaEsquerda)
    {
        $this->panturrilhaEsquerda = $panturrilhaEsquerda;
    
        return $this;
    }

    /**
     * Get panturrilhaEsquerda
     *
     * @return string 
     */
    public function getPanturrilhaEsquerda()
    {
        return $this->panturrilhaEsquerda;
    }

    /**
     * Set panturrilhaDireita
     *
     * @param string $panturrilhaDireita
     * @return Medidas
     */
    public function setPanturrilhaDireita($panturrilhaDireita)
    {
        $this->panturrilhaDireita = $panturrilhaDireita;
    
        return $this;
    }

    /**
     * Get panturrilhaDireita
     *
     * @return string 
     */
    public function getPanturrilhaDireita()
    {
        return $this->panturrilhaDireita;
    }

    /**
     * Set quadrilEsquerdo
     *
     * @param string $quadrilEsquerdo
     * @return Medidas
     */
    public function setQuadrilEsquerdo($quadrilEsquerdo)
    {
        $this->quadrilEsquerdo = $quadrilEsquerdo;
    
        return $this;
    }

    /**
     * Get quadrilEsquerdo
     *
     * @return string 
     */
    public function getQuadrilEsquerdo()
    {
        return $this->quadrilEsquerdo;
    }

    /**
     * Set quadrilDireito
     *
     * @param string $quadrilDireito
     * @return Medidas
     */
    public function setQuadrilDireito($quadrilDireito)
    {
        $this->quadrilDireito = $quadrilDireito;
    
        return $this;
    }

    /**
     * Get quadrilDireito
     *
     * @return string 
     */
    public function getQuadrilDireito()
    {
        return $this->quadrilDireito;
    }

    public function setAluno($aluno)
    {
        $this->aluno = $aluno;
    
        return $this;
    }

    /**
     * Get aluno
     *
     * @return string
     */
    public function getAluno()
    {
        return $this->aluno;
    }
}
