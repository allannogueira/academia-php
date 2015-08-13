<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Profissional
 *
 * @ORM\Table(name="profissional")
 * @ORM\Entity
 */
class Profissional
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
     * @ORM\Column(name="nome", type="string", length=100, nullable=true)
     */
    private $nome;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_endereco", type="integer", nullable=true)
     */
    private $idEndereco;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tipo_profissional", type="integer", nullable=true)
     */
    private $idTipoProfissional;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=45, nullable=true)
     */
    private $senha;


}
