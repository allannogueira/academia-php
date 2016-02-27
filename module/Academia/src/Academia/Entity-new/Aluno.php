<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aluno
 *
 * @ORM\Table(name="aluno", indexes={@ORM\Index(name="fk_Aluno_Login1_idx", columns={"id_login"}), @ORM\Index(name="fk_Aluno_Academia1_idx", columns={"id_academia"}), @ORM\Index(name="fk_Aluno_Finalidade1_idx", columns={"id_finalidade"}), @ORM\Index(name="fk_Aluno_Endereco1_idx", columns={"id_endereco"})})
 * @ORM\Entity
 */
class Aluno extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_aluno", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAluno;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_aluno", type="string", length=150, nullable=true)
     */
    private $nomeAluno;

    /**
     * @var string
     *
     * @ORM\Column(name="sobrenome_aluno", type="string", length=100, nullable=true)
     */
    private $sobrenomeAluno;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone_aluno", type="string", length=11, nullable=true)
     */
    private $telefoneAluno;

    /**
     * @var string
     *
     * @ORM\Column(name="celular_aluno", type="string", length=11, nullable=true)
     */
    private $celularAluno;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_nasc", type="date", nullable=true)
     */
    private $dataNasc;

    /**
     * @var int
     *
     * @ORM\Column(name="id_login", type="integer", nullable=true)
     */
    private $idLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf_aluno", type="string", length=11, nullable=false)
     */
    private $cpfAluno;

    /**
     * @var string
     *
     * @ORM\Column(name="rg_aluno", type="string", length=45, nullable=true)
     */
    private $rgAluno;

    /**
     * @var string
     *
     * @ORM\Column(name="email_aluno", type="string", length=255, nullable=true)
     */
    private $emailAluno;

    /**
     * @var \Academia\Entity\Academia
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Academia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_academia", referencedColumnName="id_academia")
     * })
     */
    private $idAcademia;

    /**
     * @var \Academia\Entity\Endereco
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Endereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_endereco", referencedColumnName="id_endereco")
     * })
     */
    private $idEndereco;

    /**
     * @var \Academia\Entity\Finalidade
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Finalidade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_finalidade", referencedColumnName="id_finalidade")
     * })
     */
    private $idFinalidade;


}

