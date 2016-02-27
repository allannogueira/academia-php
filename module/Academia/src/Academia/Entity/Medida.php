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
     * @var integer
     *
     * @ORM\Column(name="id_medida", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idMedida;

    /**
     * @var integer
     *
     * @ORM\Column(name="altura", type="integer", nullable=true)
     */
    private $altura;

    /**
     * @var integer
     *
     * @ORM\Column(name="peso", type="integer", nullable=true)
     */
    private $peso;

    /**
     * @var integer
     *
     * @ORM\Column(name="braco_d", type="integer", nullable=true)
     */
    private $bracoD;

    /**
     * @var integer
     *
     * @ORM\Column(name="braco_e", type="integer", nullable=true)
     */
    private $bracoE;

    /**
     * @var integer
     *
     * @ORM\Column(name="anti_braco_d", type="integer", nullable=true)
     */
    private $antiBracoD;

    /**
     * @var integer
     *
     * @ORM\Column(name="anti_braco_e", type="integer", nullable=true)
     */
    private $antiBracoE;

    /**
     * @var integer
     *
     * @ORM\Column(name="coxa_d", type="integer", nullable=true)
     */
    private $coxaD;

    /**
     * @var integer
     *
     * @ORM\Column(name="coxa_e", type="integer", nullable=true)
     */
    private $coxaE;

    /**
     * @var integer
     *
     * @ORM\Column(name="panturrilha_d", type="integer", nullable=true)
     */
    private $panturrilhaD;

    /**
     * @var integer
     *
     * @ORM\Column(name="panturrilha_e", type="integer", nullable=true)
     */
    private $panturrilhaE;

    /**
     * @var integer
     *
     * @ORM\Column(name="peitoral_maior", type="integer", nullable=true)
     */
    private $peitoralMaior;

    /**
     * @var integer
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
     * @var \Academia\Entity\Aluno
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\Aluno", cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aluno", referencedColumnName="id_aluno")
     * })
     */
    private $idAluno;

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
    private $bat_cardiaco;
    
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
     * Set idMedida
     *
     * @param integer $idMedida
     * @return Medida
     */
    public function setIdMedida($idMedida)
    {
        $this->idMedida = $idMedida;
    
        return $this;
    }

    /**
     * Get idMedida
     *
     * @return integer 
     */
    public function getIdMedida()
    {
        return $this->idMedida;
    }

    /**
     * Set altura
     *
     * @param integer $altura
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
     * @return integer 
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * Set peso
     *
     * @param integer $peso
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
     * @return integer 
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set bracoD
     *
     * @param integer $bracoD
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
     * @return integer 
     */
    public function getBracoD()
    {
        return $this->bracoD;
    }

    /**
     * Set bracoE
     *
     * @param integer $bracoE
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
     * @return integer 
     */
    public function getBracoE()
    {
        return $this->bracoE;
    }

    /**
     * Set antiBracoD
     *
     * @param integer $antiBracoD
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
     * @return integer 
     */
    public function getAntiBracoD()
    {
        return $this->antiBracoD;
    }

    /**
     * Set antiBracoE
     *
     * @param integer $antiBracoE
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
     * @return integer 
     */
    public function getAntiBracoE()
    {
        return $this->antiBracoE;
    }

    /**
     * Set coxaD
     *
     * @param integer $coxaD
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
     * @return integer 
     */
    public function getCoxaD()
    {
        return $this->coxaD;
    }

    /**
     * Set coxaE
     *
     * @param integer $coxaE
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
     * @return integer 
     */
    public function getCoxaE()
    {
        return $this->coxaE;
    }

    /**
     * Set panturrilhaD
     *
     * @param integer $panturrilhaD
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
     * @return integer 
     */
    public function getPanturrilhaD()
    {
        return $this->panturrilhaD;
    }

    /**
     * Set panturrilhaE
     *
     * @param integer $panturrilhaE
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
     * @return integer 
     */
    public function getPanturrilhaE()
    {
        return $this->panturrilhaE;
    }

    /**
     * Set peitoralMaior
     *
     * @param integer $peitoralMaior
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
     * @return integer 
     */
    public function getPeitoralMaior()
    {
        return $this->peitoralMaior;
    }

    /**
     * Set peitoralMenor
     *
     * @param integer $peitoralMenor
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
     * @return integer 
     */
    public function getPeitoralMenor()
    {
        return $this->peitoralMenor;
    }

    /**
     * Set imc
     *
     * @param string $imc
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
     * Set idAluno
     *
     * @param \Academia\Entity\Aluno $idAluno
     * @return Medida
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
    
    function getPressao() {
        return $this->pressao;
    }

    function getBat_cardiaco() {
        return $this->bat_cardiaco;
    }

    function getAbdomen() {
        return $this->abdomen;
    }

    function getCostas() {
        return $this->costas;
    }

    function getQuadril() {
        return $this->quadril;
    }

    function setPressao($pressao) {
        $this->pressao = $pressao;
    }

    function setBat_cardiaco($bat_cardiaco) {
        $this->bat_cardiaco = $bat_cardiaco;
    }

    function setAbdomen($abdomen) {
        $this->abdomen = $abdomen;
    }

    function setCostas($costas) {
        $this->costas = $costas;
    }

    function setQuadril($quadril) {
        $this->quadril = $quadril;
    }


    
}
