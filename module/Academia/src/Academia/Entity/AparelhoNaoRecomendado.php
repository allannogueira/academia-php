<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AparelhoNaoRecomendado
 *
 * @ORM\Table(name="aparelho_nao_recomendado", indexes={@ORM\Index(name="id_aparelho_idx", columns={"id_aparelho"}), @ORM\Index(name="id_academia_idx", columns={"id_academia"})})
 * @ORM\Entity
 */
class AparelhoNaoRecomendado extends \Base\Entity\AbstractEntity
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
     * @var \Academia\Entity\Academia
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Academia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_academia", referencedColumnName="id_academia")
     * })
     */
    private $idAcademia;

    /**
     * @var \Academia\Entity\Aparelho
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Aparelho")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aparelho", referencedColumnName="id_aparelho")
     * })
     */
    private $idAparelho;



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
     * Set idAcademia
     *
     * @param \Academia\Entity\Academia $idAcademia
     * @return AparelhoNaoRecomendado
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
     * Set idAparelho
     *
     * @param \Academia\Entity\Aparelho $idAparelho
     * @return AparelhoNaoRecomendado
     */
    public function setIdAparelho(\Academia\Entity\Aparelho $idAparelho = null)
    {
        $this->idAparelho = $idAparelho;
    
        return $this;
    }

    /**
     * Get idAparelho
     *
     * @return \Academia\Entity\Aparelho 
     */
    public function getIdAparelho()
    {
        return $this->idAparelho;
    }
}
