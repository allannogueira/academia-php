<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Login
 *
 * @ORM\Table(name="login", indexes={@ORM\Index(name="fk_cod_tipo_login_idx", columns={"cod_tipo_login"}), @ORM\Index(name="fk_id_aluno_idx", columns={"id_aluno"}), @ORM\Index(name="fk_id_profissional_idx", columns={"id_academia"})})
 * @ORM\Entity
 */
class Login extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_login", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=250, nullable=false)
     */
    private $senha;

    /**
     * @var int
     *
     * @ORM\Column(name="id_profissional", type="integer", nullable=true)
     */
    private $idProfissional;

    /**
     * @var int
     *
     * @ORM\Column(name="id_administrador", type="integer", nullable=true)
     */
    private $idAdministrador;

    /**
     * @var \Academia\Entity\Aluno
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Aluno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aluno", referencedColumnName="id_aluno")
     * })
     */
    private $idAluno;

    /**
     * @var \Academia\Entity\TipoLogin
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\TipoLogin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cod_tipo_login", referencedColumnName="cod_tipo_login")
     * })
     */
    private $codTipoLogin;

    /**
     * @var \Academia\Entity\Academia
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Academia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_academia", referencedColumnName="id_academia")
     * })
     */
    private $idAcademia;


}

