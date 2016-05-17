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



    /**
     * Set idRespostaAluno
     *
     * @param int $idRespostaAluno
     *
     * @return RespostaAluno
     */
    public function setIdRespostaAluno($idRespostaAluno)
    {
        $this->idRespostaAluno = $idRespostaAluno;
    
        return $this;
    }

    /**
     * Get idRespostaAluno
     *
     * @return int
     */
    public function getIdRespostaAluno()
    {
        return $this->idRespostaAluno;
    }

    /**
     * Set idAluno
     *
     * @param \Academia\Entity\Aluno $idAluno
     *
     * @return RespostaAluno
     */
    public function setIdAluno(\Academia\Entity\Aluno $idAluno)
    {
        $this->idAluno = $idAluno;
    
        return $this;
    }

    /**
     * Get idAluno
     *
     * @return \Academia\Entity\Aluno
     */
    public function getIdAluno()
    {
        return $this->idAluno;
    }

    /**
     * Set idPergunta
     *
     * @param \Academia\Entity\Pergunta $idPergunta
     *
     * @return RespostaAluno
     */
    public function setIdPergunta(\Academia\Entity\Pergunta $idPergunta)
    {
        $this->idPergunta = $idPergunta;
    
        return $this;
    }

    /**
     * Get idPergunta
     *
     * @return \Academia\Entity\Pergunta
     */
    public function getIdPergunta()
    {
        return $this->idPergunta;
    }

    /**
     * Set idResposta
     *
     * @param \Academia\Entity\Resposta $idResposta
     *
     * @return RespostaAluno
     */
    public function setIdResposta(\Academia\Entity\Resposta $idResposta)
    {
        $this->idResposta = $idResposta;
    
        return $this;
    }

    /**
     * Get idResposta
     *
     * @return \Academia\Entity\Resposta
     */
    public function getIdResposta()
    {
        return $this->idResposta;
    }
}
