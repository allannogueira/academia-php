<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Login
 *
 * @ORM\Table(name="login", indexes={@ORM\Index(name="fk_cod_tipo_login_idx", columns={"cod_tipo_login"}),@ORM\Index(name="fk_id_profissional", columns={"id_profissional"}), @ORM\Index(name="fk_id_aluno_idx", columns={"id_aluno"}), @ORM\Index(name="fk_id_profissional_idx", columns={"id_academia"})})
 * @ORM\Entity
 */
class Login extends \Base\Entity\AbstractEntity implements  \ZfcRbac\Identity\IdentityInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_login", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=250, nullable=false)
     */
    private $senha;

    /**
     * @var \Academia\Entity\Profissional
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Profissional", fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_profissional", referencedColumnName="id")
     * })
     */
    private $idProfissional;

    /**
     * @var int
     *
     * @ORM\Column(name="id_administrador", type="integer", nullable=true)
     */
    private $idAdministrador;

    /**
     * @var \Academia\Entity\Aluno
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Aluno", fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aluno", referencedColumnName="id_aluno")
     * })
     */
    private $idAluno;

    /**
     * @var \Academia\Entity\Academia
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Academia", fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_academia", referencedColumnName="id_academia")
     * })
     */
    private $idAcademia;

    /**
     * @var \Academia\Entity\TipoLogin
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\TipoLogin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cod_tipo_login", referencedColumnName="cod_tipo_login")
     * })
     */
    private $codTipoLogin;



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
     * Set email
     *
     * @param string $email
     *
     * @return Login
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set senha
     *
     * @param string $senha
     *
     * @return Login
     */
    public function setSenha($senha)
    {
        if(!empty($senha)){
            $this->senha = md5($senha);
        }    
        return $this;
    }
    
    public function setPassword($senha)
    {
        if(!empty($senha)){
         $this->senha = md5($senha);
        }
        return $this;
    }

    /**
     * Get senha
     *
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }
    
    public function getPassword()
    {
        return $this->senha;
    }

    /**
     * Set idProfissional
     *
     * @param \Academia\Entity\Profissional $idProfissional
     *
     * @return Login
     */
    public function setIdProfissional(\Academia\Entity\Profissional $idProfissional = null)
    {
        $this->idProfissional = $idProfissional;
    
        return $this;
    }

    /**
     * Get idProfissional
     *
     * @return int
     */
    public function getIdProfissional()
    {
        return $this->idProfissional;
    }

    /**
     * Set idAdministrador
     *
     * @param int $idAdministrador
     *
     * @return Login
     */
    public function setIdAdministrador($idAdministrador)
    {
        $this->idAdministrador = $idAdministrador;
    
        return $this;
    }

    /**
     * Get idAdministrador
     *
     * @return int
     */
    public function getIdAdministrador()
    {
        return $this->idAdministrador;
    }

    /**
     * Set idAluno
     *
     * @param \Academia\Entity\Aluno $idAluno
     *
     * @return Login
     */
    public function setIdAluno(\Academia\Entity\Aluno $idAluno = null)
    {
        $this->idAluno = $idAluno;
    
        return $this;
    }

    public function getId(){
        return $this->idAluno;
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

    /**
     * Set idAcademia
     *
     * @param \Academia\Entity\Academia $idAcademia
     *
     * @return Login
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
     * Set codTipoLogin
     *
     * @param \Academia\Entity\TipoLogin $codTipoLogin
     *
     * @return Login
     */
    public function setCodTipoLogin(\Academia\Entity\TipoLogin $codTipoLogin = null)
    {
        $this->codTipoLogin = $codTipoLogin;
    
        return $this;
    }

    /**
     * Get codTipoLogin
     *
     * @return \Academia\Entity\TipoLogin
     */
    public function getCodTipoLogin()
    {
        return $this->codTipoLogin;
    }

    public function getRoles() {
        return 'admin';
    }

}
