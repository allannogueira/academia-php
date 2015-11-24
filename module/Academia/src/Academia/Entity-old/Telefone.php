<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM; use Base\Entity\AbstractEntity;
use Base\Entity\AbstractEntity;
/**
 * Telefone
 *
 * @ORM\Table(name="telefone", indexes={@ORM\Index(name="fk_telefone_telefone_tipo1_idx", columns={"telefone_tipo_id"})})
 * @ORM\Entity
 */
class Telefone extends AbstractEntity
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
     * @ORM\Column(name="numero_telefone", type="string", length=45, nullable=true)
     */
    private $numeroTelefone;

    /**
     * @var \Academia\Entity\TelefoneTipo
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\TelefoneTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="telefone_tipo_id", referencedColumnName="id")
     * })
     */
    private $telefoneTipo;



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
     * Set numeroTelefone
     *
     * @param string $numeroTelefone
     * @return Telefone
     */
    public function setNumeroTelefone($numeroTelefone)
    {
        $this->numeroTelefone = $numeroTelefone;
    
        return $this;
    }

    /**
     * Get numeroTelefone
     *
     * @return string 
     */
    public function getNumeroTelefone()
    {
        return $this->numeroTelefone;
    }

    /**
     * Set telefoneTipo
     *
     * @param \Academia\Entity\TelefoneTipo $telefoneTipo
     * @return Telefone
     */
    public function setTelefoneTipo(\Academia\Entity\TelefoneTipo $telefoneTipo = null)
    {
        $this->telefoneTipo = $telefoneTipo;
    
        return $this;
    }

    /**
     * Get telefoneTipo
     *
     * @return \Academia\Entity\TelefoneTipo 
     */
    public function getTelefoneTipo()
    {
        return $this->telefoneTipo;
    }
}
