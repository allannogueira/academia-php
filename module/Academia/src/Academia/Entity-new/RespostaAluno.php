<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RespostaAluno
 *
 * @ORM\Table(name="resposta_aluno", indexes={@ORM\Index(name="fk_Resposta_Aluno_Aluno1_idx", columns={"id_aluno"}), @ORM\Index(name="fk_Resposta_Aluno_Pergunta1_idx", columns={"id_pergunta"}), @ORM\Index(name="fk_Resposta_Aluno_Resposta1_idx", columns={"id_resposta"})})
 * @ORM\Entity
 */
class RespostaAluno extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_resposta_aluno", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idRespostaAluno;

    /**
     * @var \Academia\Entity\Aluno
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\Aluno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aluno", referencedColumnName="id_aluno")
     * })
     */
    private $idAluno;

    /**
     * @var \Academia\Entity\Pergunta
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\Pergunta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pergunta", referencedColumnName="id_pergunta")
     * })
     */
    private $idPergunta;

    /**
     * @var \Academia\Entity\Resposta
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Academia\Entity\Resposta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_resposta", referencedColumnName="id_resposta")
     * })
     */
    private $idResposta;


}

