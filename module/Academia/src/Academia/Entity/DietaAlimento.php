<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DietaAlimento
 *
 * @ORM\Table(name="dieta_alimento", indexes={@ORM\Index(name="id_alimento_idx", columns={"id_alimento"}), @ORM\Index(name="id_dieta_geral_idx", columns={"id_dieta_geral"})})
 * @ORM\Entity
 */
class DietaAlimento extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_dieta_alimento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDietaAlimento;

    /**
     * @var \Academia\Entity\Alimento
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\Alimento",cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_alimento", referencedColumnName="id_alimento")
     * })
     */
    private $idAlimento;

    /**
     * @var \Academia\Entity\DietaGeral
     *
     * @ORM\ManyToOne(targetEntity="Academia\Entity\DietaGeral",cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_dieta_geral", referencedColumnName="id_dieta_geral")
     * })
     */
    private $idDietaGeral;

    function getIdDietaAlimento() {
        return $this->idDietaAlimento;
    }

    function getIdAlimento() {
        return $this->idAlimento;
    }

    function getIdDietaGeral() {
        return $this->idDietaGeral;
    }

    function setIdDietaAlimento($idDietaAlimento) {
        $this->idDietaAlimento = $idDietaAlimento;
    }

    function setIdAlimento(\Academia\Entity\Alimento $idAlimento) {
        $this->idAlimento = $idAlimento;
    }

    function setIdDietaGeral(\Academia\Entity\DietaGeral $idDietaGeral) {
        $this->idDietaGeral = $idDietaGeral;
    }


}

