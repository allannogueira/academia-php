<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;
use Base\Entity\AbstractEntity;

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
     * @ORM\Column(name="id_endereco", type="integer", nullable=true)
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
     * @ORM\Column(name="senha", type="string", length=45, nullable=true)
     */
    
    /**
     * @var integer
     *
     * @ORM\Column(name="academia_id", type="string", nullable=true)
     */
    private $academia;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", nullable=true)
     */
    private $senha;
    
        function getId() {
        return $this->id;
        }

         function getNome() {
        return $this->nome;
        }

         function getIdEndereco() {
        return $this->idEndereco;
        }

         function getIdTipoProfissional() {
        return $this->idTipoProfissional;
        }

         function getSenha() {
        return $this->senha;
        }

          function getAcademia() {
        return $this->academia;
        }
        
         function setNome($nome) {
        $this->nome = $nome;
        }

         function setIdEndereco($idEndereco) {
        $this->idEndereco = $idEndereco;
        }

         function setIdTipoProfissional($idTipoProfissional) {
        $this->idTipoProfissional = $idTipoProfissional;
        }

         function setSenha($senha) {
        $this->senha = $senha;
        }
        
        function setAcademia($academia) {
         $this->academia = $academia;
        }
}
