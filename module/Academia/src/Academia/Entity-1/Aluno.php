<?php


namespace Academia\Entity;
use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;

/**
 * Aluno
 *
 * @ORM\Table(name="aluno", indexes={@ORM\Index(name="fk_aluno_endereco1_idx", columns={"endereco_id"})})
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
     * @ORM\Column(name="objetivo", type="string", length=500, nullable=true)
     */
    private $objetivo;

    /**
     * @var \Endereco
     *
     * @ORM\ManyToOne(targetEntity="Endereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="endereco_id", referencedColumnName="id")
     * })
     */
    private $endereco;
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getRg() {
        return $this->rg;
    }

    function getEmail() {
        return $this->email;
    }

    function getObjetivo() {
        return $this->objetivo;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setObjetivo($objetivo) {
        $this->objetivo = $objetivo;
    }

    function setEndereco(\Endereco $endereco) {
        $this->endereco = $endereco;
    }



}
