<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Alimentos
 *
 * @ORM\Table(name="alimentos")
 * @ORM\Entity
 */
class Alimentos
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
     * @ORM\Column(name="nome", type="string", length=100, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="caracteristica", type="string", length=500, nullable=true)
     */
    private $caracteristica;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao_nutricional", type="string", length=500, nullable=true)
     */
    private $descricaoNutricional;


}
