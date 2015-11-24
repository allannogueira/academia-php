<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;
use Base\Entity\AbstractEntity;

/**
 * Academia
 *
 * @ORM\Table(name="academia", indexes={@ORM\Index(name="fk_academia_academia1_idx", columns={"matriz_id"}), @ORM\Index(name="fk_academia_endereco1_idx", columns={"endereco_id"})})
 * @ORM\Entity
 */
class Academia extends AbstractEntity
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
     * @ORM\Column(name="nome", type="string", length=45, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="data_cadastro", type="string", length=45, nullable=true)
     */
    private $dataCadastro;

    /**
     * @var \Academia\Entity\Academia
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Academia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="matriz_id", referencedColumnName="id")
     * })
     */
    private $matriz;

    /**
     * @var \Academia\Entity\Endereco
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Endereco",cascade={"persist","merge"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="endereco_id", referencedColumnName="id")
     * })
     */
    private $endereco;
/**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=45)
     */
    private $senha;
    /**
    * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=45)
     */
    private $usuario;


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
     * @param string $dataCadastro
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
     * @return string 
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * Set matriz
     *
     * @param \Academia\Entity\Academia $matriz
     * @return Academia
     */
    public function setMatriz(\Academia\Entity\Academia $matriz = null)
    {
        $this->matriz = $matriz;
    
        return $this;
    }

    /**
     * Get matriz
     *
     * @return \Academia\Entity\Academia 
     */
    public function getMatriz()
    {
        return $this->matriz;
    }

    /**
     * Set endereco
     *
     * @param \Academia\Entity\Endereco $endereco
     * @return Academia
     */
    public function setEndereco(\Academia\Entity\Endereco $endereco = null)
    {
        $this->endereco = $endereco;
    
        return $this;
    }

    /**
     * Get endereco
     *
     * @return \Academia\Entity\Endereco 
     */
    public function getEndereco()
    {
        return $this->endereco;
    }
    
     public function setSenha($senha)
    {
        $this->senha = $senha;
    
        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getSenha()
    {
        
        return $this->senha;
    }
    
     /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
    
     public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    
        return $this;
    }
}
