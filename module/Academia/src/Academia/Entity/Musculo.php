<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Musculo
 *
 * @ORM\Table(name="musculo")
 * @ORM\Entity
 */
class Musculo extends \Base\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_musculo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMusculo;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_musculo", type="string", length=45, nullable=true)
     */
    private $nomeMusculo;



    /**
     * Get idMusculo
     *
     * @return integer 
     */
    public function getIdMusculo()
    {
        return $this->idMusculo;
    }

    /**
     * Set nomeMusculo
     *
     * @param string $nomeMusculo
     * @return Musculo
     */
    public function setNomeMusculo($nomeMusculo)
    {
        $this->nomeMusculo = $nomeMusculo;
    
        return $this;
    }

    /**
     * Get nomeMusculo
     *
     * @return string 
     */
    public function getNomeMusculo()
    {
        return $this->nomeMusculo;
    }
}
