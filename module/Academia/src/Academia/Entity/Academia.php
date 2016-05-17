<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Academia
 *
 * @ORM\Table(name="academia", indexes={@ORM\Index(name="fk_Academia_Login", columns={"id_login"}),@ORM\Index(name="fk_Academia_Endereco1_idx", columns={"id_endereco"}), @ORM\Index(name="fk_Academia_Academia1_idx", columns={"id_matriz"})})
 * @ORM\Entity
 */
class Academia extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_academia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAcademia;

     /**
     * @var string
     *
     * @ORM\Column(name="cnpj", type="integer", length=15, nullable=true)
     */
    private $cnpj;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=150, nullable=true)
     */
    private $nome;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_cadastro", type="date", nullable=true)
     */
    private $dataCadastro;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone_comercial1", type="string", length=12, nullable=true)
     */
    private $telefoneComercial1;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone_comercial2", type="string", length=12, nullable=true)
     */
    private $telefoneComercial2;

    /**
     * @var \Academia\Entity\Academia
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Academia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_matriz", referencedColumnName="id_academia")
     * })
     */
    private $idMatriz;

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
     * @var \Academia\Entity\Login
     *
     * @ORM\OneToOne(targetEntity="Academia\Entity\Login", cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_login", referencedColumnName="id_login")
     * })
     */
    private $idLogin;

    /**
     * Get idAcademia
     *
     * @return int
     */
    public function getIdAcademia()
    {
        return $this->idAcademia;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Academia
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
     *
     * @return Academia
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
     * Set telefoneComercial1
     *
     * @param string $telefoneComercial1
     *
     * @return Academia
     */
    public function setTelefoneComercial1($telefoneComercial1)
    {
        $this->telefoneComercial1 = $telefoneComercial1;
    
        return $this;
    }

    /**
     * Get telefoneComercial1
     *
     * @return string
     */
    public function getTelefoneComercial1()
    {
        return $this->telefoneComercial1;
    }

    /**
     * Set telefoneComercial2
     *
     * @param string $telefoneComercial2
     *
     * @return Academia
     */
    public function setTelefoneComercial2($telefoneComercial2)
    {
        $this->telefoneComercial2 = $telefoneComercial2;
    
        return $this;
    }

    /**
     * Get telefoneComercial2
     *
     * @return string
     */
    public function getTelefoneComercial2()
    {
        return $this->telefoneComercial2;
    }

    /**
     * Set idMatriz
     *
     * @param \Academia\Entity\Academia $idMatriz
     *
     * @return Academia
     */
    public function setIdMatriz(\Academia\Entity\Academia $idMatriz = null)
    {
        $this->idMatriz = $idMatriz;
    
        return $this;
    }

    /**
     * Get idMatriz
     *
     * @return \Academia\Entity\Academia
     */
    public function getIdMatriz()
    {
        return $this->idMatriz;
    }

    /**
     * Set idEndereco
     *
     * @param \Academia\Entity\Endereco $idEndereco
     *
     * @return Academia
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
    
    function getCnpj() {
        return $this->cnpj;
    }

    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }


}
