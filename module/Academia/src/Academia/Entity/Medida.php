<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medida
 *
 * @ORM\Table(name="medida", indexes={@ORM\Index(name="fk_Medida_Aluno1_idx", columns={"id_aluno"})})
 * @ORM\Entity
 */
class Medida extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_medida", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMedida;

    /**
     * @var int
     *
     * @ORM\Column(name="altura", type="integer", nullable=true)
     */
    private $altura;

    /**
     * @var int
     *
     * @ORM\Column(name="peso", type="integer", nullable=true)
     */
    private $peso;

    /**
     * @var int
     *
     * @ORM\Column(name="braco_d", type="integer", nullable=true)
     */
    private $bracoD;

    /**
     * @var int
     *
     * @ORM\Column(name="braco_e", type="integer", nullable=true)
     */
    private $bracoE;

    /**
     * @var int
     *
     * @ORM\Column(name="anti_braco_d", type="integer", nullable=true)
     */
    private $antiBracoD;

    /**
     * @var int
     *
     * @ORM\Column(name="anti_braco_e", type="integer", nullable=true)
     */
    private $antiBracoE;

    /**
     * @var int
     *
     * @ORM\Column(name="coxa_d", type="integer", nullable=true)
     */
    private $coxaD;

    /**
     * @var int
     *
     * @ORM\Column(name="coxa_e", type="integer", nullable=true)
     */
    private $coxaE;

    /**
     * @var int
     *
     * @ORM\Column(name="panturrilha_d", type="integer", nullable=true)
     */
    private $panturrilhaD;

    /**
     * @var int
     *
     * @ORM\Column(name="panturrilha_e", type="integer", nullable=true)
     */
    private $panturrilhaE;

    /**
     * @var int
     *
     * @ORM\Column(name="peitoral_maior", type="integer", nullable=true)
     */
    private $peitoralMaior;

    /**
     * @var int
     *
     * @ORM\Column(name="peitoral_menor", type="integer", nullable=true)
     */
    private $peitoralMenor;

    /**
     * @var string
     *
     * @ORM\Column(name="imc", type="string", length=3, nullable=true)
     */
    private $imc;

    /**
     * @var string
     *
     * @ORM\Column(name="mass_gordura", type="string", length=3, nullable=true)
     */
    private $massGordura;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_ini_vig", type="date", nullable=true)
     */
    private $dataIniVig;

    /**
     * @var string
     *
     * @ORM\Column(name="pressao", type="string", length=45, nullable=true)
     */
    private $pressao;

    /**
     * @var string
     *
     * @ORM\Column(name="bat_cardiaco", type="string", length=45, nullable=true)
     */
    private $batCardiaco;

    /**
     * @var string
     *
     * @ORM\Column(name="abdomen", type="string", length=45, nullable=true)
     */
    private $abdomen;

    /**
     * @var string
     *
     * @ORM\Column(name="costas", type="string", length=45, nullable=true)
     */
    private $costas;

    /**
     * @var string
     *
     * @ORM\Column(name="quadril", type="string", length=45, nullable=true)
     */
    private $quadril;

    /**
     * @var \Academia\Entity\Aluno
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Aluno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aluno", referencedColumnName="id_aluno")
     * })
     */
    private $idAluno;



    /**
     * Get idMedida
     *
     * @return int
     */
    public function getIdMedida()
    {
        return $this->idMedida;
    }

    /**
     * Set altura
     *
     * @param int $altura
     *
     * @return Medida
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;
    
        return $this;
    }

    /**
     * Get altura
     *
     * @return int
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * Set peso
     *
     * @param int $peso
     *
     * @return Medida
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;
    
        return $this;
    }

    /**
     * Get peso
     *
     * @return int
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set bracoD
     *
     * @param int $bracoD
     *
     * @return Medida
     */
    public function setBracoD($bracoD)
    {
        $this->bracoD = $bracoD;
    
        return $this;
    }

    /**
     * Get bracoD
     *
     * @return int
     */
    public function getBracoD()
    {
        return $this->bracoD;
    }

    /**
     * Set bracoE
     *
     * @param int $bracoE
     *
     * @return Medida
     */
    public function setBracoE($bracoE)
    {
        $this->bracoE = $bracoE;
    
        return $this;
    }

    /**
     * Get bracoE
     *
     * @return int
     */
    public function getBracoE()
    {
        return $this->bracoE;
    }

    /**
     * Set antiBracoD
     *
     * @param int $antiBracoD
     *
     * @return Medida
     */
    public function setAntiBracoD($antiBracoD)
    {
        $this->antiBracoD = $antiBracoD;
    
        return $this;
    }

    /**
     * Get antiBracoD
     *
     * @return int
     */
    public function getAntiBracoD()
    {
        return $this->antiBracoD;
    }

    /**
     * Set antiBracoE
     *
     * @param int $antiBracoE
     *
     * @return Medida
     */
    public function setAntiBracoE($antiBracoE)
    {
        $this->antiBracoE = $antiBracoE;
    
        return $this;
    }

    /**
     * Get antiBracoE
     *
     * @return int
     */
    public function getAntiBracoE()
    {
        return $this->antiBracoE;
    }

    /**
     * Set coxaD
     *
     * @param int $coxaD
     *
     * @return Medida
     */
    public function setCoxaD($coxaD)
    {
        $this->coxaD = $coxaD;
    
        return $this;
    }

    /**
     * Get coxaD
     *
     * @return int
     */
    public function getCoxaD()
    {
        return $this->coxaD;
    }

    /**
     * Set coxaE
     *
     * @param int $coxaE
     *
     * @return Medida
     */
    public function setCoxaE($coxaE)
    {
        $this->coxaE = $coxaE;
    
        return $this;
    }

    /**
     * Get coxaE
     *
     * @return int
     */
    public function getCoxaE()
    {
        return $this->coxaE;
    }

    /**
     * Set panturrilhaD
     *
     * @param int $panturrilhaD
     *
     * @return Medida
     */
    public function setPanturrilhaD($panturrilhaD)
    {
        $this->panturrilhaD = $panturrilhaD;
    
        return $this;
    }

    /**
     * Get panturrilhaD
     *
     * @return int
     */
    public function getPanturrilhaD()
    {
        return $this->panturrilhaD;
    }

    /**
     * Set panturrilhaE
     *
     * @param int $panturrilhaE
     *
     * @return Medida
     */
    public function setPanturrilhaE($panturrilhaE)
    {
        $this->panturrilhaE = $panturrilhaE;
    
        return $this;
    }

    /**
     * Get panturrilhaE
     *
     * @return int
     */
    public function getPanturrilhaE()
    {
        return $this->panturrilhaE;
    }

    /**
     * Set peitoralMaior
     *
     * @param int $peitoralMaior
     *
     * @return Medida
     */
    public function setPeitoralMaior($peitoralMaior)
    {
        $this->peitoralMaior = $peitoralMaior;
    
        return $this;
    }

    /**
     * Get peitoralMaior
     *
     * @return int
     */
    public function getPeitoralMaior()
    {
        return $this->peitoralMaior;
    }

    /**
     * Set peitoralMenor
     *
     * @param int $peitoralMenor
     *
     * @return Medida
     */
    public function setPeitoralMenor($peitoralMenor)
    {
        $this->peitoralMenor = $peitoralMenor;
    
        return $this;
    }

    /**
     * Get peitoralMenor
     *
     * @return int
     */
    public function getPeitoralMenor()
    {
        return $this->peitoralMenor;
    }

    /**
     * Set imc
     *
     * @param string $imc
     *
     * @return Medida
     */
    public function setImc($imc)
    {
        $this->imc = $imc;
    
        return $this;
    }

    /**
     * Get imc
     *
     * @return string
     */
    public function getImc()
    {
        return $this->imc;
    }

    /**
     * Set massGordura
     *
     * @param string $massGordura
     *
     * @return Medida
     */
    public function setMassGordura($massGordura)
    {
        $this->massGordura = $massGordura;
    
        return $this;
    }

    /**
     * Get massGordura
     *
     * @return string
     */
    public function getMassGordura()
    {
        return $this->massGordura;
    }

    /**
     * Set dataIniVig
     *
     * @param \DateTime $dataIniVig
     *
     * @return Medida
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
     * Set pressao
     *
     * @param string $pressao
     *
     * @return Medida
     */
    public function setPressao($pressao)
    {
        $this->pressao = $pressao;
    
        return $this;
    }

    /**
     * Get pressao
     *
     * @return string
     */
    public function getPressao()
    {
        return $this->pressao;
    }

    /**
     * Set batCardiaco
     *
     * @param string $batCardiaco
     *
     * @return Medida
     */
    public function setBatCardiaco($batCardiaco)
    {
        $this->batCardiaco = $batCardiaco;
    
        return $this;
    }

    /**
     * Get batCardiaco
     *
     * @return string
     */
    public function getBatCardiaco()
    {
        return $this->batCardiaco;
    }

    /**
     * Set abdomen
     *
     * @param string $abdomen
     *
     * @return Medida
     */
    public function setAbdomen($abdomen)
    {
        $this->abdomen = $abdomen;
    
        return $this;
    }

    /**
     * Get abdomen
     *
     * @return string
     */
    public function getAbdomen()
    {
        return $this->abdomen;
    }

    /**
     * Set costas
     *
     * @param string $costas
     *
     * @return Medida
     */
    public function setCostas($costas)
    {
        $this->costas = $costas;
    
        return $this;
    }

    /**
     * Get costas
     *
     * @return string
     */
    public function getCostas()
    {
        return $this->costas;
    }

    /**
     * Set quadril
     *
     * @param string $quadril
     *
     * @return Medida
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
     * Set idAluno
     *
     * @param \Academia\Entity\Aluno $idAluno
     *
     * @return Medida
     */
    public function setIdAluno(\Academia\Entity\Aluno $idAluno = null)
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
