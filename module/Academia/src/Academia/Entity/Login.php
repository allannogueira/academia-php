<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

use ZfcUser\Entity\UserInterface as ZfcUserInterface;
use ZfcRbac\Identity\IdentityInterface;
/**
 * Login
 
 * @ORM\Table(name="login", indexes={@ORM\Index(name="fk_cod_tipo_login_idx", columns={"cod_tipo_login"}), @ORM\Index(name="fk_id_aluno_idx", columns={"id_aluno"}), @ORM\Index(name="fk_id_profissional_idx", columns={"id_academia"})})
 * @ORM\Entity
 */
class Login extends \Base\Entity\AbstractEntity implements ZfcUserInterface, IdentityInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_login", type="integer",nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLogin;

    /**
     * @var string
     * 
     * @ORM\Column(name="email", type="string", length=100)
     */
    public $email;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=16)
     */
    private $senha;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_profissional", type="integer",nullable=false)
     */
    private $idProfissional;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_administrador", type="integer",nullable=false)
     */
    private $idAdministrador;

    /**
     * @var \Academia\Entity\Academia
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Academia",cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_academia", referencedColumnName="id_academia",nullable=false)
     * })
     */
    private $idAcademia;

    /**
     * @var \Academia\Entity\TipoLogin
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\TipoLogin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cod_tipo_login", referencedColumnName="cod_tipo_login",nullable=false)
     * })
     */
    private $codTipoLogin;

    /**
     * @var \Academia\Entity\Aluno
     *
     * @ORM\OneToOne(targetEntity="Academia\Entity\Aluno", mappedBy="idLogin",cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aluno", referencedColumnName="id_aluno",nullable=false)
     * })
     */
    private $idAluno;


        /**
     * Get idLogin
     *
     * @return integer 
     */
    public function getIdLogin()
    {
     //   echo "getIdLogin";exit;
        return $this->idLogin;
    }
    
    function setIdLogin($idLogin) {
        $this->idLogin = $idLogin;
    }

        /**
     * Set email
     *
     * @param string $email
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
        //echo "getEmail";exit;
        return $this->email;
    }

    /**
     * Set senha
     *
     * @param string $senha
     * @return Login
     */
    public function setSenha($senha)
    {
         $bcrypt = new \Zend\Crypt\Password\Bcrypt();
        $this->senha = $bcrypt->create($senha);
    
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
    
    

    /**
     * Set idProfissional
     *
     * @param integer $idProfissional
     * @return Login
     */
    public function setIdProfissional($idProfissional)
    {
        $this->idProfissional = $idProfissional;
    
        return $this;
    }

    /**
     * Get idProfissional
     *
     * @return integer 
     */
    public function getIdProfissional()
    {
        return $this->idProfissional;
    }

    /**
     * Set idAdministrador
     *
     * @param integer $idAdministrador
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
     * @return integer 
     */
    public function getIdAdministrador()
    {
        return $this->idAdministrador;
    }

    /**
     * Set idAcademia
     *
     * @param \Academia\Entity\Academia $idAcademia
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
     * @return Login
     */
    public function setCodTipoLogin($codTipoLogin = null)
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

    /**
     * Set idAluno
     *
     * @param \Academia\Entity\Aluno $idAluno
     * @return Login
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
    
    public function getPassword(){
        //echo "getPassword:".$this->senha;exit;
        return $this->senha;
    }

    public function getDisplayName() {
        return ;
    }

    public function getId() {
       // echo "getId";exit;
        return $this->getIdLogin();
    }

    public function getState() {
        return;
    }

    public function getUsername() {       
        return;
    }

    public function setDisplayName($displayName) {
        return;
    }

    public function setId($id) {
        $this->idLogin = $id;
    }

    public function setPassword($password) {
        $this->setSenha($password);
        return $this;
    }

    public function setState($state) {
        return;
    }

    public function setUsername($username) {
        return;
    }

    public function getRoles() {
        $role = "visitante";
        if($this->getIdAcademia() != null){
            $role = "academia";
        }else if($this->getIdAdministrador() != null){
            $role = "admin";
        }else if($this->getIdAluno() != null){
            $role = "aluno";
        }else if($this->getIdProfissional() != null){
            $role = "profissional";
        }
        return array($role);
    }

}
