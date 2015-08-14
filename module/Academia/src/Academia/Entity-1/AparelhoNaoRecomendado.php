<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * AparelhoNaoRecomendado
 *
 * @ORM\Table(name="aparelho_nao_recomendado")
 * @ORM\Entity
 */
class AparelhoNaoRecomendado
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
     * @ORM\Column(name="nome", type="string", length=45, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="motivo", type="string", length=45, nullable=true)
     */
    private $motivo;


}