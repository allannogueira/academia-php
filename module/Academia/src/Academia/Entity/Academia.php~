<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Academia
 *
 * @ORM\Table(name="academia", indexes={@ORM\Index(name="fk_Academia_Endereco1_idx", columns={"id_endereco"}), @ORM\Index(name="fk_Academia_Academia1_idx", columns={"id_matriz"})})
 * @ORM\Entity
 */
class Academia extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_academia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAcademia;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=150, nullable=true)
     */
    private $nome;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_cadastro", type="date", nullable=true)
     */
    private $dataCadastro;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone_comercial1", type="string", length=12, nullable=true)
     */
    private $telefoneComercial1;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone_comercial2", type="string", length=12, nullable=true)
     */
    private $telefoneComercial2;

    /**
     * @var \Academia\Entity\Academia
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Academia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_matriz", referencedColumnName="id_academia")
     * })
     */
    private $idMatriz;

    /**
     * @var \Academia\Entity\Endereco
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Endereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_endereco", referencedColumnName="id_endereco")
     * })
     */
    private $idEndereco;


}

