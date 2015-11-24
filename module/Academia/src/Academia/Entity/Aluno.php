<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;

/**
 * Aluno
 *
 * @ORM\Table(name="aluno", indexes={@ORM\Index(name="fk_aluno_endereco1_idx", columns={"endereco_id"}), @ORM\Index(name="fk_aluno_treino1_idx", columns={"treino_id"}), @ORM\Index(name="fk_aluno_objetivo_id", columns={"objetivo_id"}), @ORM\Index(name="fk_aluno_medidas1_idx", columns={"medidas_id"}), @ORM\Index(name="fk_aluno_dieta1_idx", columns={"dieta_id"})})
 * @ORM\Entity
 */
class Aluno extends AbstractEntity
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
     * @ORM\Column(name="cpf", type="string", length=15, nullable=true)
     */
    private $cpf;

    /**
     * @var string
     *
     * @ORM\Column(name="rg", type="string", length=15, nullable=true)
     */
    private $rg;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivo_id", type="bigint", nullable=false)
     */
    private $objetivo;

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
     * @var string
     *
     * @ORM\Column(name="academia_id", type="string", length=45, nullable=true)
     */
    private $academiaId;

    /**
     * @var \Academia\Entity\Dieta
     *
     
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\Dieta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dieta_id", referencedColumnName="id")
     * })
     */
    private $dieta;

    /**
     * @var \Academia\Entity\Endereco
     *
     
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\Endereco",cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="endereco_id", referencedColumnName="id")
     * })
     */
    private $endereco;

    /**
     * @var \Academia\Entity\Medidas
     *
     
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\Medidas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="medidas_id", referencedColumnName="id")
     * })
     */
    private $medidas;

    /**
     * @var \Academia\Entity\Treino
     *
     
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\Treino")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="treino_id", referencedColumnName="id")
     * })
     */
    private $treino;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Academia\Entity\Telefone", inversedBy="aluno")
     * @ORM\JoinTable(name="aluno_has_telefone",
     *   joinColumns={
     *     @ORM\JoinColumn(name="aluno_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="telefone_id", referencedColumnName="id"),
     *     @ORM\JoinColumn(name="telefone_telefone_tipo_id", referencedColumnName="telefone_tipo_id")
     *   }
     * )
     */
    private $telefone;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->telefone = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set id
     *
     * @param integer $id
     * @return Aluno
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
    }

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
     * @return Aluno
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
     * Set cpf
     *
     * @param string $cpf
     * @return Aluno
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    
        return $this;
    }

    /**
     * Get cpf
     *
     * @return string 
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set rg
     *
     * @param string $rg
     * @return Aluno
     */
    public function setRg($rg)
    {
        $this->rg = $rg;
    
        return $this;
    }

    /**
     * Get rg
     *
     * @return string 
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Aluno
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
     * Set objetivo
     *
     * @param string $objetivo
     * @return Aluno
     */
    public function setObjetivo($objetivo)
    {
        $this->objetivo = $objetivo;
    
        return $this;
    }

    /**
     * Get objetivo
     *
     * @return string 
     */
    public function getObjetivo()
    {
        return $this->objetivo;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Aluno
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
     * @return Aluno
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
     * @param string $academiaId
     * @return Aluno
     */
    public function setAcademiaId($academiaId)
    {
        $this->academiaId = $academiaId;
    
        return $this;
    }

    /**
     * Get academiaId
     *
     * @return string 
     */
    public function getAcademiaId()
    {
        return $this->academiaId;
    }

    /**
     * Set dieta
     *
     * @param \Academia\Entity\Dieta $dieta
     * @return Aluno
     */
    public function setDieta(\Academia\Entity\Dieta $dieta)
    {
        $this->dieta = $dieta;
    
        return $this;
    }

    /**
     * Get dieta
     *
     * @return \Academia\Entity\Dieta 
     */
    public function getDieta()
    {
        return $this->dieta;
    }

    /**
     * Set endereco
     *
     * @param \Academia\Entity\Endereco $endereco
     * @return Aluno
     */
    public function setEndereco(\Academia\Entity\Endereco $endereco)
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

    /**
     * Set medidas
     *
     * @param \Academia\Entity\Medidas $medidas
     * @return Aluno
     */
    public function setMedidas(\Academia\Entity\Medidas $medidas)
    {
        $this->medidas = $medidas;
    
        return $this;
    }

    /**
     * Get medidas
     *
     * @return \Academia\Entity\Medidas 
     */
    public function getMedidas()
    {
        return $this->medidas;
    }

    /**
     * Set treino
     *
     * @param \Academia\Entity\Treino $treino
     * @return Aluno
     */
    public function setTreino(\Academia\Entity\Treino $treino)
    {
        $this->treino = $treino;
    
        return $this;
    }

    /**
     * Get treino
     *
     * @return \Academia\Entity\Treino 
     */
    public function getTreino()
    {
        return $this->treino;
    }

    /**
     * Add telefone
     *
     * @param \Academia\Entity\Telefone $telefone
     * @return Aluno
     */
    public function addTelefone(\Academia\Entity\Telefone $telefone)
    {
        $this->telefone[] = $telefone;
    
        return $this;
    }

    /**
     * Remove telefone
     *
     * @param \Academia\Entity\Telefone $telefone
     */
    public function removeTelefone(\Academia\Entity\Telefone $telefone)
    {
        $this->telefone->removeElement($telefone);
    }

    /**
     * Get telefone
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTelefone()
    {
        return $this->telefone;
    }
}
