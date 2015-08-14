<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * SugestoesReclamacoesTipo
 *
 * @ORM\Table(name="sugestoes_reclamacoes_tipo")
 * @ORM\Entity
 */
class SugestoesReclamacoesTipo
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
     * @ORM\Column(name="descricao", type="string", length=100, nullable=true)
     */
    private $descricao;


}