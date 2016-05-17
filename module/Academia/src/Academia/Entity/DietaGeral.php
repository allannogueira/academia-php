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
     * @var int
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
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Academia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_academia", referencedColumnName="id_academia")
     * })
     */
    private $idAcademia;

    /**
     * @var \Academia\Entity\Finalidade
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Finalidade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_finalidade", referencedColumnName="id_finalidade")
     * })
     */
    private $idFinalidade;



    /**
     * Get idDietaGeral
     *
     * @return int
     */
    public function getIdDietaGeral()
    {
        return $this->idDietaGeral;
    }

    /**
     * Set nomeDieta
     *
     * @param string $nomeDieta
     *
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
     *
     * @return DietaGeral
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
     * Set idFinalidade
     *
     * @param \Academia\Entity\Finalidade $idFinalidade
     *
     * @return DietaGeral
     */
    public function setIdFinalidade(\Academia\Entity\Finalidade $idFinalidade = null)
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
}
