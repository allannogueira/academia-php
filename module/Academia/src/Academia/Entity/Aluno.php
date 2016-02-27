<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aluno
 *
 * @ORM\Table(name="aluno", indexes={@ORM\Index(name="fk_Aluno_Login1_idx", columns={"id_login"}), @ORM\Index(name="fk_Aluno_Academia1_idx", columns={"id_academia"}), @ORM\Index(name="fk_Aluno_Finalidade1_idx", columns={"id_finalidade"}), @ORM\Index(name="fk_Aluno_Endereco1_idx", columns={"id_endereco"})})
 * @ORM\Entity
 */
class Aluno extends \Base\Entity\AbstractEntity
{
    /**
     * @var integer
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
     * @var string
     *
     * @ORM\Column(name="cpf_aluno", type="string", nullable=true)
     */
    private $cpf;
    
    /**
     * @var string
     *
     * @ORM\Column(name="rg_aluno", type="string", nullable=true)
     */
    private $rg;
    
    /**
     * @var string
     *
     * @ORM\Column(name="email_aluno", type="string", nullable=true)
     */
    private $email;

    /**
     * @var \Academia\Entity\Academia
     *
     * @ORM\OneToOne(targetEntity="Academia\Entity\Academia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_academia", referencedColumnName="id_academia")
     * })
     */
    private $idAcademia;

    /**
     * @var \Academia\Entity\Endereco
     *
     * 
     * 
     * @ORM\OneToOne(targetEntity="Academia\Entity\Endereco", cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_endereco", referencedColumnName="id_endereco")
     * })
     */
    private $idEndereco;

    /**
     * @var \Academia\Entity\Finalidade
     *
     * @ORM\OneToOne(targetEntity="Academia\Entity\Finalidade", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_finalidade", referencedColumnName="id_finalidade")
     * })
     */
    private $idFinalidade;

    /**
     * @var \Academia\Entity\Login
     *
     * @ORM\OneToOne(targetEntity="Academia\Entity\Login", cascade={"all"},inversedBy="idAluno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_login", referencedColumnName="id_login",nullable=false)
     * })
     */
    private $idLogin;

    



    /**
     * Set idAluno
     *
     * @param integer $idAluno
     * @return Aluno
     */
    public function setIdAluno($idAluno)
    {
        $this->idAluno = $idAluno;
    
        return $this;
    }

    /**
     * Get idAluno
     *
     * @return integer 
     */
    public function getIdAluno()
    {
        return $this->idAluno;
    }

    /**
     * Set nomeAluno
     *
     * @param string $nomeAluno
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
     * Set idAcademia
     *
     * @param \Academia\Entity\Academia $idAcademia
     * @return Aluno
     */
    public function setIdAcademia(\Academia\Entity\Academia $idAcademia)
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
     * @return Aluno
     */
    public function setIdEndereco(\Academia\Entity\Endereco $idEndereco)
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

    /**
     * Set idFinalidade
     *
     * @param \Academia\Entity\Finalidade $idFinalidade
     * @return Aluno
     */
    public function setIdFinalidade(\Academia\Entity\Finalidade $idFinalidade)
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
     * Set idLogin
     *
     * @param \Academia\Entity\Login $idLogin
     * @return Aluno
     */
    public function setIdLogin(\Academia\Entity\Login $idLogin)
    {
        $this->idLogin = $idLogin;
    
        return $this;
    }

    /**
     * Get idLogin
     *
     * @return \Academia\Entity\Login 
     */
    public function getIdLogin()
    {
        return $this->idLogin;
    }
    
    function getCpf() {
        return $this->cpf;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    
    function getRg() {
        return $this->rg;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }



}
