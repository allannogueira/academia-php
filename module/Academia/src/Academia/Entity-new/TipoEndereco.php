<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoEndereco
 *
 * @ORM\Table(name="tipo_endereco")
 * @ORM\Entity
 */
class TipoEndereco extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=150, nullable=true)
     */
    private $descricao;


}

