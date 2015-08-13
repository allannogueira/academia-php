<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TelefoneTipo
 *
 * @ORM\Table(name="telefone_tipo")
 * @ORM\Entity
 */
class TelefoneTipo
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
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=true)
     */
    private $nome;


}
