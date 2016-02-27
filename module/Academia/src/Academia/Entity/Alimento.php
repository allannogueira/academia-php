<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alimento
 *
 * @ORM\Table(name="alimento", indexes={@ORM\Index(name="fk_Alimento_Academia1_idx", columns={"id_academia"})})
 * @ORM\Entity
 */
class Alimento extends \Base\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_alimento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAlimento;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_alimento", type="string", length=150, nullable=true)
     */
    private $nomeAlimento;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=150, nullable=true)
     */
    private $descricao;

    /**
     * @var \Academia\Entity\Academia
     *
     * @ORM\OneToOne(targetEntity="Academia\Entity\Academia",cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_academia", referencedColumnName="id_academia")
     * })
     */
    private $idAcademia;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Academia\Entity\DietaGeral", mappedBy="idAlimento")
     */
    private $idDietaGeral;



    /**
     * Set idAlimento
     *
     * @param integer $idAlimento
     * @return Alimento
     */
    public function setIdAlimento($idAlimento)
    {
        $this->idAlimento = $idAlimento;
    
        return $this;
    }

    /**
     * Get idAlimento
     *
     * @return integer 
     */
    public function getIdAlimento()
    {
        return $this->idAlimento;
    }

    /**
     * Set nomeAlimento
     *
     * @param string $nomeAlimento
     * @return Alimento
     */
    public function setNomeAlimento($nomeAlimento)
    {
        $this->nomeAlimento = $nomeAlimento;
    
        return $this;
    }

    /**
     * Get nomeAlimento
     *
     * @return string 
     */
    public function getNomeAlimento()
    {
        return $this->nomeAlimento;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return Alimento
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    
        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set idAcademia
     *
     * @param \Academia\Entity\Academia $idAcademia
     * @return Alimento
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
     * Add idDietaGeral
     *
     * @param \Academia\Entity\DietaGeral $idDietaGeral
     * @return Alimento
     */
    public function addIdDietaGeral(\Academia\Entity\DietaGeral $idDietaGeral)
    {
        $this->idDietaGeral[] = $idDietaGeral;
    
        return $this;
    }

    /**
     * Remove idDietaGeral
     *
     * @param \Academia\Entity\DietaGeral $idDietaGeral
     */
    public function removeIdDietaGeral(\Academia\Entity\DietaGeral $idDietaGeral)
    {
        $this->idDietaGeral->removeElement($idDietaGeral);
    }

    /**
     * Get idDietaGeral
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdDietaGeral()
    {
        return $this->idDietaGeral;
    }
}
