<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aparelho
 *
 * @ORM\Table(name="aparelho", indexes={@ORM\Index(name="FK_id_academi_idx", columns={"id_academia"})})
 * @ORM\Entity
 */
class Aparelho extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_aparelho", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAparelho;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_aparelho", type="string", length=150, nullable=true)
     */
    private $nomeAparelho;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=100, nullable=true)
     */
    private $modelo;

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
     * Get idAparelho
     *
     * @return int
     */
    public function getIdAparelho()
    {
        return $this->idAparelho;
    }

    /**
     * Set nomeAparelho
     *
     * @param string $nomeAparelho
     *
     * @return Aparelho
     */
    public function setNomeAparelho($nomeAparelho)
    {
        $this->nomeAparelho = $nomeAparelho;
    
        return $this;
    }

    /**
     * Get nomeAparelho
     *
     * @return string
     */
    public function getNomeAparelho()
    {
        return $this->nomeAparelho;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     *
     * @return Aparelho
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    
        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set idAcademia
     *
     * @param \Academia\Entity\Academia $idAcademia
     *
     * @return Aparelho
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
}
