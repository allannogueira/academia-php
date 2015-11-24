<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;

/**
 * Profissional
 *
 * @ORM\Table(name="profissional")
 * @ORM\Entity
 */
class Profissional extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=100, nullable=true)
     */
    private $nome;

    /**
     * @var integer
     *
     * @ORM\Column(name="endereco_id", type="integer", nullable=true)
     */
    private $idEndereco;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tipo_profissional", type="integer", nullable=true)
     */
    private $idTipoProfissional;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=45, nullable=true)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=45, nullable=true)
     */
    private $senha;

    /**
     * @var integer
     *
     * @ORM\Column(name="academia_id", type="integer", nullable=false)
     */
    private $academiaId;



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
     * @return Profissional
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
     * Set idEndereco
     *
     * @param integer $idEndereco
     * @return Profissional
     */
    public function setIdEndereco($idEndereco)
    {
        $this->idEndereco = $idEndereco;
    
        return $this;
    }

    /**
     * Get idEndereco
     *
     * @return integer 
     */
    public function getIdEndereco()
    {
        return $this->idEndereco;
    }

    /**
     * Set idTipoProfissional
     *
     * @param integer $idTipoProfissional
     * @return Profissional
     */
    public function setIdTipoProfissional($idTipoProfissional)
    {
        $this->idTipoProfissional = $idTipoProfissional;
    
        return $this;
    }

    /**
     * Get idTipoProfissional
     *
     * @return integer 
     */
    public function getIdTipoProfissional()
    {
        return $this->idTipoProfissional;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Profissional
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    
        return $this;
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

    /**
     * Set senha
     *
     * @param string $senha
     * @return Profissional
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    
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
     * Set academiaId
     *
     * @param integer $academiaId
     * @return Profissional
     */
    public function setAcademiaId($academiaId)
    {
        $this->academiaId = $academiaId;
    
        return $this;
    }

    /**
     * Get academiaId
     *
     * @return integer 
     */
    public function getAcademiaId()
    {
        return $this->academiaId;
    }
}
