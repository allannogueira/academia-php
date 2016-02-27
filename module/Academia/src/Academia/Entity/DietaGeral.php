<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DietaGeral
 *
 * @ORM\Table(name="dieta_geral", indexes={@ORM\Index(name="fk_Dieta_Geral_Finalidade1_idx", columns={"id_finalidade"}), @ORM\Index(name="fk_Dieta_Geral_Academia1_idx", columns={"id_academia"})})
 * @ORM\Entity
 */
class DietaGeral extends \Base\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_dieta_geral", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDietaGeral;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_dieta", type="string", length=150, nullable=true)
     */
    private $nomeDieta;

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
     * @var \Academia\Entity\Finalidade
     *
     * @ORM\OneToOne(targetEntity="Academia\Entity\Finalidade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_finalidade", referencedColumnName="id_finalidade")
     * })
     */
    private $idFinalidade;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Academia\Entity\Alimento", inversedBy="idDietaGeral")
     * @ORM\JoinTable(name="dieta_alimento",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_dieta_geral", referencedColumnName="id_dieta_geral")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_alimento", referencedColumnName="id_alimento")
     *   }
     * )
     */
    private $idAlimento;



    /**
     * Set idDietaGeral
     *
     * @param integer $idDietaGeral
     * @return DietaGeral
     */
    public function setIdDietaGeral($idDietaGeral)
    {
        $this->idDietaGeral = $idDietaGeral;
    
        return $this;
    }

    /**
     * Get idDietaGeral
     *
     * @return integer 
     */
    public function getIdDietaGeral()
    {
        return $this->idDietaGeral;
    }

    /**
     * Set nomeDieta
     *
     * @param string $nomeDieta
     * @return DietaGeral
     */
    public function setNomeDieta($nomeDieta)
    {
        $this->nomeDieta = $nomeDieta;
    
        return $this;
    }

    /**
     * Get nomeDieta
     *
     * @return string 
     */
    public function getNomeDieta()
    {
        return $this->nomeDieta;
    }

    /**
     * Set idAcademia
     *
     * @param \Academia\Entity\Academia $idAcademia
     * @return DietaGeral
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
     * Set idFinalidade
     *
     * @param \Academia\Entity\Finalidade $idFinalidade
     * @return DietaGeral
     */
    public function setIdFinalidade(\Academia\Entity\Finalidade $idFinalidade)
    {
        $this->idFinalidade = $idFinalidade;
    
        return $this;
    }

    /**
     * Get idFinalidade
     *
     * @return \Academia\Entity\Finalidade 
     */
    public function getIdFinalidade()
    {
        return $this->idFinalidade;
    }

    /**
     * Add idAlimento
     *
     * @param \Academia\Entity\Alimento $idAlimento
     * @return DietaGeral
     */
    public function addIdAlimento(\Academia\Entity\Alimento $idAlimento)
    {
        $this->idAlimento[] = $idAlimento;
    
        return $this;
    }

    /**
     * Remove idAlimento
     *
     * @param \Academia\Entity\Alimento $idAlimento
     */
    public function removeIdAlimento(\Academia\Entity\Alimento $idAlimento)
    {
        $this->idAlimento->removeElement($idAlimento);
    }

    /**
     * Get idAlimento
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdAlimento()
    {
        return $this->idAlimento;
    }
}
