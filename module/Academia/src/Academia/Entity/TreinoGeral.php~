<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TreinoGeral
 *
 * @ORM\Table(name="treino_geral", indexes={@ORM\Index(name="fk_Treino_Geral_Finalidade1_idx", columns={"id_finalidade"}), @ORM\Index(name="fk_Treino_Geral_Academia1_idx", columns={"id_academia"})})
 * @ORM\Entity
 */
class TreinoGeral extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_treino_geral", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTreinoGeral;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_treino", type="string", length=150, nullable=true)
     */
    private $nomeTreino;

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
     * @var \Academia\Entity\Finalidade
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Finalidade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_finalidade", referencedColumnName="id_finalidade")
     * })
     */
    private $idFinalidade;


}

