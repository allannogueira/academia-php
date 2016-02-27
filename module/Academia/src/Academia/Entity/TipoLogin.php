<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoLogin
 *
 * @ORM\Table(name="tipo_login")
 * @ORM\Entity
 */
class TipoLogin extends \Base\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cod_tipo_login", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codTipoLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_tipo_login", type="string", length=45, nullable=false)
     */
    private $descTipoLogin;



    /**
     * Get codTipoLogin
     *
     * @return integer 
     */
    public function getCodTipoLogin()
    {
        return $this->codTipoLogin;
    }

    /**
     * Set descTipoLogin
     *
     * @param string $descTipoLogin
     * @return TipoLogin
     */
    public function setDescTipoLogin($descTipoLogin)
    {
        $this->descTipoLogin = $descTipoLogin;
    
        return $this;
    }

    /**
     * Get descTipoLogin
     *
     * @return string 
     */
    public function getDescTipoLogin()
    {
        return $this->descTipoLogin;
    }
}
