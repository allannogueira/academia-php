<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Academia
 *
 * @ORM\Table(name="academia", indexes={@ORM\Index(name="fk_Academia_Endereco1_idx", columns={"id_endereco"}), @ORM\Index(name="fk_Academia_Cepbr_endereco1_idx", columns={"Cepbr_endereco_cep"}), @ORM\Index(name="fk_Academia_Tipo_Endereco1_idx", columns={"id_tipo_endereco"}), @ORM\Index(name="fk_Academia_Academia1_idx", columns={"id_matriz"})})
 * @ORM\Entity
 */
class Academia extends \Base\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_academia", type="integer", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAcademia;

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
     * @var string
     *
     * @ORM\Column(name="id_matriz", type="string", length=12, nullable=false)
     */
    private $idMatriz;

    

    /**
     * @var \Academia\Entity\Endereco
     *
     * @ORM\OneToOne(targetEntity="Academia\Entity\Endereco",cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_endereco", referencedColumnName="id_endereco")
     * })
     */
    private $idEndereco;




    /**
     * Set idAcademia
     *
     * @param integer $idAcademia
     * @return Academia
     */
    public function setIdAcademia($idAcademia)
    {
        $this->idAcademia = $idAcademia;
    
        return $this;
    }

    /**
     * Get idAcademia
     *
     * @return integer 
     */
    public function getIdAcademia()
    {
        return $this->idAcademia;
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
     * @param \DateTime $dataCadastro
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
     * @param string $idMatriz
     * @return Academia
     */
    public function setIdMatriz($idMatriz)
    {
        if($idMatriz == ""){
            $this->idMatriz = null;
        }else{
            $this->idMatriz = $idMatriz;
        }
        return $this;
    }

    /**
     * Get idMatriz
     *
     * @return string
     */
    public function getIdMatriz()
    {
        return $this->idMatriz;
    }


 
    /**
     * Set idEndereco
     *
     * @param \Academia\Entity\Endereco $idEndereco
     * @return Academia
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

}
