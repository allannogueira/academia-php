<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aluno
 *
 * @ORM\Table(name="aluno", indexes={@ORM\Index(name="fk_Aluno_Login", columns={"id_login"}), @ORM\Index(name="fk_Aluno_Academia1_idx", columns={"id_academia"}), @ORM\Index(name="fk_Aluno_Finalidade1_idx", columns={"id_finalidade"}), @ORM\Index(name="fk_Aluno_Endereco1_idx", columns={"id_endereco"})})
 * @ORM\Entity
 */
class Aluno extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_aluno", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAluno;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_aluno", type="string", length=150, nullable=true)
     */
    private $nomeAluno;

    /**
     * @var string
     *
     * @ORM\Column(name="sobrenome_aluno", type="string", length=100, nullable=true)
     */
    private $sobrenomeAluno;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone_aluno", type="string", length=11, nullable=true)
     */
    private $telefoneAluno;

    /**
     * @var string
     *
     * @ORM\Column(name="celular_aluno", type="string", length=11, nullable=true)
     */
    private $celularAluno;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_nasc", type="date", nullable=true)
     */
    private $dataNasc;

     /**
     * @var \Academia\Entity\Login
     *
     * @ORM\OneToOne(targetEntity="Academia\Entity\Login", cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_login", referencedColumnName="id_login")
     * })
     */
    private $idLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf_aluno", type="string", length=11, nullable=false, unique=true)
     */
    private $cpfAluno;

    /**
     * @var string
     *
     * @ORM\Column(name="rg_aluno", type="string", length=45, nullable=true)
     */
    private $rgAluno;


    /**
     * @var \Academia\Entity\Finalidade
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Finalidade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_finalidade", referencedColumnName="id_finalidade")
     * })
     */
    private $idFinalidade;

    /**
     * @var \Academia\Entity\Academia
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Academia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_academia", referencedColumnName="id_academia")
     * })
     */
    private $idAcademia;

    /**
     * @var \Academia\Entity\Endereco
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Endereco",cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_endereco", referencedColumnName="id_endereco")
     * })
     */
    private $idEndereco;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="blob", nullable=true)
     */
    private $arquivo;
    
      /**
     * @var \Academia\Entity\Periodo
     *
     * @ORM\OneToOne(targetEntity="Academia\Entity\Periodo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_periodo", referencedColumnName="id_periodo")
     * })
     */
    private $idPeriodo;


    /**
     * Get idAluno
     *
     * @return int
     */
    public function getIdAluno()
    {
        return $this->idAluno;
    }

    /**
     * Set nomeAluno
     *
     * @param string $nomeAluno
     *
     * @return Aluno
     */
    public function setNomeAluno($nomeAluno)
    {
        $this->nomeAluno = $nomeAluno;
    
        return $this;
    }

    /**
     * Get nomeAluno
     *
     * @return string
     */
    public function getNomeAluno()
    {
        return $this->nomeAluno;
    }

    /**
     * Set sobrenomeAluno
     *
     * @param string $sobrenomeAluno
     *
     * @return Aluno
     */
    public function setSobrenomeAluno($sobrenomeAluno)
    {
        $this->sobrenomeAluno = $sobrenomeAluno;
    
        return $this;
    }

    /**
     * Get sobrenomeAluno
     *
     * @return string
     */
    public function getSobrenomeAluno()
    {
        return $this->sobrenomeAluno;
    }

    /**
     * Set telefoneAluno
     *
     * @param string $telefoneAluno
     *
     * @return Aluno
     */
    public function setTelefoneAluno($telefoneAluno)
    {
        $this->telefoneAluno = $telefoneAluno;
    
        return $this;
    }

    /**
     * Get telefoneAluno
     *
     * @return string
     */
    public function getTelefoneAluno()
    {
        return $this->telefoneAluno;
    }

    /**
     * Set celularAluno
     *
     * @param string $celularAluno
     *
     * @return Aluno
     */
    public function setCelularAluno($celularAluno)
    {
        $this->celularAluno = $celularAluno;
    
        return $this;
    }

    /**
     * Get celularAluno
     *
     * @return string
     */
    public function getCelularAluno()
    {
        return $this->celularAluno;
    }

    /**
     * Set dataNasc
     *
     * @param \DateTime $dataNasc
     *
     * @return Aluno
     */
    public function setDataNasc($dataNasc)
    {
        $this->dataNasc = $dataNasc;
    
        return $this;
    }

    /**
     * Get dataNasc
     *
     * @return \DateTime
     */
    public function getDataNasc()
    {
        return $this->dataNasc;
    }

    /**
     * Set idLogin
     *
     * @param int $idLogin
     *
     * @return Aluno
     */
    public function setIdLogin($idLogin)
    {
        $this->idLogin = $idLogin;
    
        return $this;
    }

    /**
     * Get idLogin
     *
     * @return int
     */
    public function getIdLogin()
    {
        return $this->idLogin;
    }

    /**
     * Set cpfAluno
     *
     * @param string $cpfAluno
     *
     * @return Aluno
     */
    public function setCpfAluno($cpfAluno)
    {
        $this->cpfAluno = $cpfAluno;
    
        return $this;
    }

    /**
     * Get cpfAluno
     *
     * @return string
     */
    public function getCpfAluno()
    {
        return $this->cpfAluno;
    }

    /**
     * Set rgAluno
     *
     * @param string $rgAluno
     *
     * @return Aluno
     */
    public function setRgAluno($rgAluno)
    {
        $this->rgAluno = $rgAluno;
    
        return $this;
    }

    /**
     * Get rgAluno
     *
     * @return string
     */
    public function getRgAluno()
    {
        return $this->rgAluno;
    }

 
    /**
     * Set idFinalidade
     *
     * @param \Academia\Entity\Finalidade $idFinalidade
     *
     * @return Aluno
     */
    public function setIdFinalidade(\Academia\Entity\Finalidade $idFinalidade = null)
    {
        $this->idFinalidade = $idFinalidade;
    
        return $this;
    }

    /**
     * Get idFinalidade
     *
     * @return \Academia\Entity\Finalidade
     */
    public function getIdFinalidade()
    {
        return $this->idFinalidade;
    }

    /**
     * Set idAcademia
     *
     * @param \Academia\Entity\Academia $idAcademia
     *
     * @return Aluno
     */
    public function setIdAcademia(\Academia\Entity\Academia $idAcademia = null)
    {
        $this->idAcademia = $idAcademia;
    
        return $this;
    }

    /**
     * Get idAcademia
     *
     * @return \Academia\Entity\Academia
     */
    public function getIdAcademia()
    {
        return $this->idAcademia;
    }

    /**
     * Set idEndereco
     *
     * @param \Academia\Entity\Endereco $idEndereco
     *
     * @return Aluno
     */
    public function setIdEndereco(\Academia\Entity\Endereco $idEndereco = null)
    {
        $this->idEndereco = $idEndereco;
    
        return $this;
    }

    /**
     * Get idEndereco
     *
     * @return \Academia\Entity\Endereco
     */
    public function getIdEndereco()
    {
        return $this->idEndereco;
    }
    
    function getArquivo() {
        return $this->arquivo;
    }

    function setArquivo($arquivo) {
        $this->arquivo = $arquivo;
    }
    
    function getIdPeriodo() {
        return $this->idPeriodo;
    }

    /**
     * Set idPeriodo
     *
     * @param \Academia\Entity\Periodo $idPeriodo
     *
     * @return Periodo
     */
    function setIdPeriodo(\Academia\Entity\Periodo $periodo = null) {
       // echo var_dump($periodo);
        $this->idPeriodo = $periodo;
    }


    
}
