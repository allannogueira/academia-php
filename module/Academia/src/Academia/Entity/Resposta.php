<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resposta
 *
 * @ORM\Table(name="resposta", indexes={@ORM\Index(name="fk_Resposta_Pergunta1_idx", columns={"id_pergunta"})})
 * @ORM\Entity
 */
class Resposta extends \Base\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_resposta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idResposta;

    /**
     * @var string
     *
     * @ORM\Column(name="resposta", type="string", length=150, nullable=true)
     */
    private $resposta;

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
     * Set idResposta
     *
     * @param integer $idResposta
     * @return Resposta
     */
    public function setIdResposta($idResposta)
    {
        $this->idResposta = $idResposta;
    
        return $this;
    }

    /**
     * Get idResposta
     *
     * @return integer 
     */
    public function getIdResposta()
    {
        return $this->idResposta;
    }

    /**
     * Set resposta
     *
     * @param string $resposta
     * @return Resposta
     */
    public function setResposta($resposta)
    {
        $this->resposta = $resposta;
    
        return $this;
    }

    /**
     * Get resposta
     *
     * @return string 
     */
    public function getResposta()
    {
        return $this->resposta;
    }

    /**
     * Set idPergunta
     *
     * @param \Academia\Entity\Pergunta $idPergunta
     * @return Resposta
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
}
