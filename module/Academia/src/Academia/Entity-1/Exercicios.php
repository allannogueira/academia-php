<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Exercicios
 *
 * @ORM\Table(name="exercicios")
 * @ORM\Entity
 */
class Exercicios
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
     * @var boolean
     *
     * @ORM\Column(name="ar_livre", type="boolean", nullable=true)
     */
    private $arLivre;

    /**
     * @var string
     *
     * @ORM\Column(name="finalidade", type="string", length=500, nullable=true)
     */
    private $finalidade;

    /**
     * @var string
     *
     * @ORM\Column(name="como_fazer", type="string", length=500, nullable=true)
     */
    private $comoFazer;

    /**
     * @var string
     *
     * @ORM\Column(name="peso", type="string", length=45, nullable=true)
     */
    private $peso;

    /**
     * @var string
     *
     * @ORM\Column(name="serie", type="string", length=45, nullable=true)
     */
    private $serie;


}
